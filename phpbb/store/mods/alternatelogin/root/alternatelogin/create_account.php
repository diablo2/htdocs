<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);

$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');
$user->add_lang('mods/alternatelogin');
$user->add_lang('mods/info_ucp_alternatelogin');

$submit = request_var('submit', false);

if($submit)
{
    // Try to manually determine the timezone and adjust the dst if the server date/time complies with the default setting +/- 1
    $timezone = date('Z') / 3600;
    $is_dst = date('I');

    if ($config['board_timezone'] == $timezone || $config['board_timezone'] == ($timezone - 1))
    {
            $timezone = ($is_dst) ? $timezone - 1 : $timezone;

            if (!isset($user->lang['tz_zones'][(string) $timezone]))
            {
                    $timezone = $config['board_timezone'];
            }
    }
    else
    {
            $is_dst = $config['board_dst'];
            $timezone = $config['board_timezone'];
    }
    $al_login_type = request_var('al_login_type', 0);
    $al_login = true;
    $al_id = request_var('id', '');
    $oi_password = request_var('id', '');

    $oi_password = request_var('email', '');

    $oi_password = substr($oi_password, 0, $config['max_pass_chars']);

    $data = array(
            'username'			=> utf8_normalize_nfc(request_var('username', '', true)),
            'new_password'                  => $al_id,
            'password_confirm'              => $al_id,
            'email'				=> strtolower(request_var('email', '')),
            'email_confirm'                 => strtolower(request_var('email_confirm', '')),
            'lang'				=> basename(request_var('lang', $user->lang_name)),
            'tz'				=> request_var('tz', (float) $timezone),
    );

    // Check and initialize some variables if needed
    if ($submit)
    {

        if($al_login)
        {
            switch($al_login_type)
            {
                case AL_WINDOWSLIVE_LOGIN:
                    include_once($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/lib/windowslivelogin.php');
                    if(!$al_wll)
                    {
                            $al_wll = WindowsLiveLogin::initFromXml($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/Application-Key.xml');
                            $al_wll->setDebug(true);
                    }

                    if(!$wl_user)
                    {
                        $wl_user = $al_wll->processToken($wl_cookie);
                        //trigger_error($_COOKIE[WL_COOKIE]);
                        if ($wl_user)
                        {

                                $data['new_password'] = substr($wl_user->getId(), 0, $config['max_pass_chars']);
                                $data['password_confirm'] = substr($wl_user->getId(), 0, $config['max_pass_chars']);
                        }
                        else
                        {
                            trigger_error('Could not get user');
                        }

                    }


                break;

                case AL_FACEBOOK_LOGIN:

                    $data['new_password'] = substr($fb_user, 0, $config['max_pass_chars']);
                    $data['password_confirm'] = substr($fb_user, 0, $config['max_pass_chars']);

                break;

                case AL_MYSPACE_LOGIN:

                    $data['new_password'] = substr($ms_user . $data['email'], 0, $config['max_pass_chars']);
                    $data['password_confirm'] = substr($ms_user . $data['email'], 0, $config['max_pass_chars']);

                break;

                case AL_OPENID_LOGIN:

                    $data['new_password'] = substr($al_id . $data['email'], 0, $config['max_pass_chars']);
                    $data['password_confirm'] = substr($al_id . $data['email'], 0, $config['max_pass_chars']);

                break;
            }

        }

        $error = validate_data($data, array(
                'username'			=> array(
                        array('string', false, $config['min_name_chars'], $config['max_name_chars']),
                        array('username', '')),
                'new_password'		=> array(
                        array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
                        array('password')),
                'password_confirm'	=> array('string', false, $config['min_pass_chars'], $config['max_pass_chars']),
                'email'				=> array(
                        array('string', false, 6, 60),
                        array('email')),
                'email_confirm'		=> array('string', false, 6, 60),
                'tz'				=> array('num', false, -14, 14),
                'lang'				=> array('match', false, '#^[a-z_\-]{2,}$#i'),
        ));

			
        // Replace "error" strings with their real, localised form
        $error = preg_replace('#^([A-Z_]+)$#e', "(!empty(\$user->lang['\\1'])) ? \$user->lang['\\1'] : '\\1'", $error);

        // DNSBL check
        if ($config['check_dnsbl'])
        {
                if (($dnsbl = $user->check_dnsbl('register')) !== false)
                {
                        $error[] = sprintf($user->lang['IP_BLACKLISTED'], $user->ip, $dnsbl[1]);
                }
        }
        
        $coppa = request_var('coppa', true);

        if (!sizeof($error))
        {
            
                $server_url = generate_board_url();

                // Which group by default?
                $group_name = ($coppa) ? 'REGISTERED_COPPA' : 'REGISTERED';

                $sql = 'SELECT group_id
                        FROM ' . GROUPS_TABLE . "
                        WHERE group_name = '" . $db->sql_escape($group_name) . "'
                                AND group_type = " . GROUP_SPECIAL;
                $result = $db->sql_query($sql);
                $row = $db->sql_fetchrow($result);
                $db->sql_freeresult($result);

                if (!$row)
                {
                        trigger_error('NO_GROUP');
                }

                $group_id = $row['group_id'];

                if (($coppa ||
                        $config['require_activation'] == USER_ACTIVATION_SELF ||
                        $config['require_activation'] == USER_ACTIVATION_ADMIN) && $config['email_enable'])
                {
                        $user_actkey = gen_rand_string(10);
                        $key_len = 54 - (strlen($server_url));
                        $key_len = ($key_len < 6) ? 6 : $key_len;
                        $user_actkey = substr($user_actkey, 0, $key_len);

                        $user_type = USER_INACTIVE;
                        $user_inactive_reason = INACTIVE_REGISTER;
                        $user_inactive_time = time();
                }
                else
                {
                        $user_type = USER_NORMAL;
                        $user_actkey = '';
                        $user_inactive_reason = 0;
                        $user_inactive_time = 0;
                }

                $user_row = array(
                        'username'				=> $data['username'],
                        'user_password'                         => phpbb_hash($data['new_password']),
                        'user_email'                            => $data['email'],
                        'group_id'				=> (int) $group_id,
                        'user_timezone'                         => (float) $data['tz'],
                        'user_dst'				=> $is_dst,
                        'user_lang'				=> $data['lang'],
                        'user_type'				=> $user_type,
                        'user_actkey'                           => $user_actkey,
                        'user_ip'				=> $user->ip,
                        'user_regdate'                          => time(),
                        'user_inactive_reason'                  => $user_inactive_reason,
                        'user_inactive_time'                    => $user_inactive_time,
                );

                if ($config['new_member_post_limit'])
                {
                        $user_row['user_new'] = 1;
                }

                // Register user...
                $user_id = user_add($user_row, $cp_data);

                // This should not happen, because the required variables are listed above...
                if ($user_id === false)
                {
                        trigger_error('NO_USER', E_USER_ERROR);
                }
                if($al_login)
                {
                    $al_user_settings = array_fill(0, 10, 0);




                    switch($al_login_type)
                    {
                            case AL_WINDOWSLIVE_LOGIN:

                                    $al_user_settings[AL_WINDOWSLIVE_LOGIN] = 1;

                                    $al_user_settings = set_al_settings($al_user_settings);

                                    $sql = 'INSERT INTO ' . AL_USER_DATA . '(user_id, al_user_settings, al_wl_id)'
                                                    . "  VALUES('$user_id', '$al_user_settings', '{$wl_user->getId()}')";

                                    $result = $db->sql_query($sql);

                                    // DB Error
                                    if(!$result)
                                    {
                                            trigger_error('Unable to connect with phpBB database.');
                                    }
                                    $al_email_lang = $user->lang['WINDOWSLIVE'];
                                    setcookie($wl_cookie);
                            break;

                            case AL_FACEBOOK_LOGIN:

                                    $al_user_settings[AL_FACEBOOK_LOGIN] = 1;

                                    $al_user_settings = set_al_settings($al_user_settings);

                                    $sql = 'INSERT INTO ' . AL_USER_DATA . '(user_id, al_user_settings, al_fb_id)'
                                                    . "  VALUES('$user_id', '$al_user_settings', '$fb_user')";

                                    $result = $db->sql_query($sql);

                                    // DB Error
                                    if(!$result)
                                    {
                                            trigger_error('Unable to connect with phpBB database.');
                                    }

                                    $al_email_lang = $user->lang['FACEBOOK'];
                            break;

                            case AL_MYSPACE_LOGIN:

                                    $al_user_settings[AL_MYSPACE_LOGIN] = 1;

                                    $al_user_settings = set_al_settings($al_user_settings);

                                    $sql = 'INSERT INTO ' . AL_USER_DATA . '(user_id, al_user_settings, al_ms_id)'
                                                    . "  VALUES('$user_id', '$al_user_settings', '$ms_user')";

                                    $result = $db->sql_query($sql);

                                    // DB Error
                                    if(!$result)
                                    {
                                            trigger_error('Unable to connect with phpBB database.');
                                    }

                                    $al_email_lang = $user->lang['MYSPACE'];
                            break;

                            case AL_OPENID_LOGIN:

                                    $al_user_settings[AL_LIVEJOURNAL_LOGIN] = 1;

                                    $al_user_settings = set_al_settings($al_user_settings);

                                    $sql = 'INSERT INTO ' . AL_USER_DATA . '(user_id, al_user_settings, al_oi_id)'
                                                    . "  VALUES('$user_id', '$al_user_settings', '$al_id')";

                                    $result = $db->sql_query($sql);

                                    // DB Error
                                    if(!$result)
                                    {
                                            trigger_error('Unable to connect with phpBB database.');
                                    }

                                    $al_email_lang = $user->lang['OPENID'];
                            break;
                    }
                }


                // Okay, captcha, your job is done.
                if ($config['enable_confirm'] && isset($captcha))
                {
                        $captcha->reset();
                }

                if ($coppa && $config['email_enable'])
                {
                        $message = $user->lang['ACCOUNT_COPPA'];
                        if($al_login)
                        {
                                $email_template = 'coppa_welcome_inactive_alternatelogin';
                        }
                        else
                        {
                                $email_template = 'coppa_welcome_inactive';
                        }
                }
                else if ($config['require_activation'] == USER_ACTIVATION_SELF && $config['email_enable'])
                {
                        $message = $user->lang['ACCOUNT_INACTIVE'];
                        if($al_login)
                        {
                                $email_template = 'user_welcome_inactive_alternatelogin';
                        }
                        else
                        {
                                $email_template = 'user_welcome_inactive';
                        }
                }
                else if ($config['require_activation'] == USER_ACTIVATION_ADMIN && $config['email_enable'])
                {
                        $message = $user->lang['ACCOUNT_INACTIVE_ADMIN'];
                        if($al_login)
                        {
                                $email_template = 'admin_welcome_inactive_alternatelogin';
                        }
                        else
                        {
                                $email_template = 'admin_welcome_inactive';
                        }
                }
                else
                {
                        $message = $user->lang['ACCOUNT_ADDED'];
                        if($al_login)
                        {
                                $email_template = 'user_welcome_alternatelogin';
                        }
                        else
                        {
                                $email_template = 'user_welcome';
                        }
                }

                if ($config['email_enable'])
                {
                        include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);

                        $messenger = new messenger(false);

                        $messenger->template($email_template, $data['lang']);

                        $messenger->to($data['email'], $data['username']);

                        $messenger->headers('X-AntiAbuse: Board servername - ' . $config['server_name']);
                        $messenger->headers('X-AntiAbuse: User_id - ' . $user->data['user_id']);
                        $messenger->headers('X-AntiAbuse: Username - ' . $user->data['username']);
                        $messenger->headers('X-AntiAbuse: User IP - ' . $user->ip);

                        $messenger->assign_vars(array(
                                'WELCOME_MSG'	=> htmlspecialchars_decode(sprintf($user->lang['WELCOME_SUBJECT'], $config['sitename'])),
                                'USERNAME'		=> htmlspecialchars_decode($data['username']),
                                'PASSWORD'		=> htmlspecialchars_decode($data['new_password']),
                                'AL_LOGIN_TYPE'		=> $al_email_lang,
                                'U_ACTIVATE'	=> "$server_url/ucp.$phpEx?mode=activate&u=$user_id&k=$user_actkey")
                        );

                        if ($coppa)
                        {
                                $messenger->assign_vars(array(
                                        'FAX_INFO'		=> $config['coppa_fax'],
                                        'MAIL_INFO'		=> $config['coppa_mail'],
                                        'EMAIL_ADDRESS'	=> $data['email'])
                                );
                        }

                        $messenger->send(NOTIFY_EMAIL);

                        if ($config['require_activation'] == USER_ACTIVATION_ADMIN)
                        {
                                // Grab an array of user_id's with a_user permissions ... these users can activate a user
                                $admin_ary = $auth->acl_get_list(false, 'a_user', false);
                                $admin_ary = (!empty($admin_ary[0]['a_user'])) ? $admin_ary[0]['a_user'] : array();

                                // Also include founders
                                $where_sql = ' WHERE user_type = ' . USER_FOUNDER;

                                if (sizeof($admin_ary))
                                {
                                        $where_sql .= ' OR ' . $db->sql_in_set('user_id', $admin_ary);
                                }

                                $sql = 'SELECT user_id, username, user_email, user_lang, user_jabber, user_notify_type
                                        FROM ' . USERS_TABLE . ' ' .
                                        $where_sql;
                                $result = $db->sql_query($sql);

                                while ($row = $db->sql_fetchrow($result))
                                {
                                        $messenger->template('admin_activate', $row['user_lang']);
                                        $messenger->to($row['user_email'], $row['username']);
                                        $messenger->im($row['user_jabber'], $row['username']);

                                        $messenger->assign_vars(array(
                                                'USERNAME'			=> htmlspecialchars_decode($data['username']),
                                                'U_USER_DETAILS'	=> "$server_url/memberlist.$phpEx?mode=viewprofile&u=$user_id",
                                                'U_ACTIVATE'		=> "$server_url/ucp.$phpEx?mode=activate&u=$user_id&k=$user_actkey")
                                        );

                                        $messenger->send($row['user_notify_type']);
                                }
                                $db->sql_freeresult($result);
                        }
                }

            if($al_login_type == AL_WINDOWSLIVE_LOGIN)
            {
                $_SESSION['al_wl_logout'] = 'registration_success';
                $_SESSION['al_wl_message'] = $message;
                header('Location:' . $al_wll->getLogoutUrl());
            }
            else
            {
                $message = $message . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
                trigger_error($message);
            }
        }
}

}


?>
