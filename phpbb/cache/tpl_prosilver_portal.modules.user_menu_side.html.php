<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<div style="text-align: center;">
        <a href="<?php echo (isset($this->_rootref['U_VIEW_PROFILE'])) ? $this->_rootref['U_VIEW_PROFILE'] : ''; ?>"><span><?php echo (isset($this->_rootref['USERNAME_FULL'])) ? $this->_rootref['USERNAME_FULL'] : ''; ?></span></a><br />
        <?php if ($this->_rootref['B3P_AVATAR_IMG']) {  ?>

            <a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><?php echo (isset($this->_rootref['B3P_AVATAR_IMG'])) ? $this->_rootref['B3P_AVATAR_IMG'] : ''; ?></a>
        <?php } else if ($this->_tpldata['DEFINE']['.']['NO_AVATAR_IMG']) {  ?>

            <a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['NO_AVATAR_IMG'])) ? $this->_tpldata['DEFINE']['.']['NO_AVATAR_IMG'] : ''; ?>" alt="" /></a>
        <?php } if ($this->_rootref['B3P_RANK_TITLE']) {  ?><br /><span class="gensmall"><?php echo (isset($this->_rootref['B3P_RANK_TITLE'])) ? $this->_rootref['B3P_RANK_TITLE'] : ''; ?></span><?php } if ($this->_rootref['B3P_RANK_IMG']) {  ?><br /><?php echo (isset($this->_rootref['B3P_RANK_IMG'])) ? $this->_rootref['B3P_RANK_IMG'] : ''; } ?>

    </div> 
	<hr class="dashed" />
	<div class="portal-navigation">
		<div class="menutitle"><?php echo ((isset($this->_rootref['L_M_MENU'])) ? $this->_rootref['L_M_MENU'] : ((isset($user->lang['M_MENU'])) ? $user->lang['M_MENU'] : '{ M_MENU }')); ?></div>
			<ul>
				<?php if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?>

					<li><a href="<?php echo (isset($this->_rootref['U_NEW_POSTS'])) ? $this->_rootref['U_NEW_POSTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEW_POSTS'])) ? $this->_rootref['L_NEW_POSTS'] : ((isset($user->lang['NEW_POSTS'])) ? $user->lang['NEW_POSTS'] : '{ NEW_POSTS }')); ?></a></li>
					<li><a href="<?php echo (isset($this->_rootref['U_UNREAD_POSTS'])) ? $this->_rootref['U_UNREAD_POSTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_UNREAD_POSTS'])) ? $this->_rootref['L_UNREAD_POSTS'] : ((isset($user->lang['UNREAD_POSTS'])) ? $user->lang['UNREAD_POSTS'] : '{ UNREAD_POSTS }')); ?></a></li>
					<li><a href="<?php echo (isset($this->_rootref['U_SELF_POSTS'])) ? $this->_rootref['U_SELF_POSTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SELF_POSTS'])) ? $this->_rootref['L_SELF_POSTS'] : ((isset($user->lang['SELF_POSTS'])) ? $user->lang['SELF_POSTS'] : '{ SELF_POSTS }')); ?></a></li>
				<?php } if ($this->_rootref['U_UM_BOOKMARKS']) {  ?>

					<li><a href="<?php echo (isset($this->_rootref['U_UM_BOOKMARKS'])) ? $this->_rootref['U_UM_BOOKMARKS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_UM_BOOKMARKS'])) ? $this->_rootref['L_UM_BOOKMARKS'] : ((isset($user->lang['UM_BOOKMARKS'])) ? $user->lang['UM_BOOKMARKS'] : '{ UM_BOOKMARKS }')); ?></a></li>
				<?php } if ($this->_rootref['S_DISPLAY_SUBSCRIPTIONS']) {  ?>

					<li><a href="<?php echo (isset($this->_rootref['U_UM_MAIN_SUBSCRIBED'])) ? $this->_rootref['U_UM_MAIN_SUBSCRIBED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_UM_MAIN_SUBSCRIBED'])) ? $this->_rootref['L_UM_MAIN_SUBSCRIBED'] : ((isset($user->lang['UM_MAIN_SUBSCRIBED'])) ? $user->lang['UM_MAIN_SUBSCRIBED'] : '{ UM_MAIN_SUBSCRIBED }')); ?></a></li>
				<?php } if ($this->_rootref['S_DISPLAY_PM']) {  ?>

					<li><a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; ?></a></li>
				<?php } ?>

				<li><a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PROFILE'])) ? $this->_rootref['L_PROFILE'] : ((isset($user->lang['PROFILE'])) ? $user->lang['PROFILE'] : '{ PROFILE }')); ?></a></li>
				<?php if ($this->_rootref['U_UM_MCP']) {  ?>

					<li><a href="<?php echo (isset($this->_rootref['U_UM_MCP'])) ? $this->_rootref['U_UM_MCP'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?></a></li>
				<?php } if ($this->_rootref['U_ACP']) {  ?>

					<li><a href="<?php echo (isset($this->_rootref['U_ACP'])) ? $this->_rootref['U_ACP'] : ''; ?>"><?php echo ((isset($this->_rootref['L_M_ACP'])) ? $this->_rootref['L_M_ACP'] : ((isset($user->lang['M_ACP'])) ? $user->lang['M_ACP'] : '{ M_ACP }')); ?></a></li>
				<?php } ?>

				<li><a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a></li>
			</ul>
	</div>
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>