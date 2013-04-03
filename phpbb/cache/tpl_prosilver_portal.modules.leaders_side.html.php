<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<strong<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?> style="float: right;"<?php } ?>><?php echo ((isset($this->_rootref['L_ADMINISTRATORS'])) ? $this->_rootref['L_ADMINISTRATORS'] : ((isset($user->lang['ADMINISTRATORS'])) ? $user->lang['ADMINISTRATORS'] : '{ ADMINISTRATORS }')); ?></strong><br />
	<?php $_admin_count = (isset($this->_tpldata['admin'])) ? sizeof($this->_tpldata['admin']) : 0;if ($_admin_count) {for ($_admin_i = 0; $_admin_i < $_admin_count; ++$_admin_i){$_admin_val = &$this->_tpldata['admin'][$_admin_i]; ?>

		<span style="float:<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>right<?php } else { ?>left<?php } ?>;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/portal/portal_user.png" width="16" height="16" alt="" /></span><span style="<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>float:right; padding-right:5px;<?php } else { ?>float:left; padding-left:5px;<?php } ?> padding-top:2px;"><strong><?php echo $_admin_val['USERNAME_FULL']; ?></strong></span><br style="clear:both" />
	<?php }} else { ?>

		<?php echo ((isset($this->_rootref['L_NO_ADMINISTRATORS_P'])) ? $this->_rootref['L_NO_ADMINISTRATORS_P'] : ((isset($user->lang['NO_ADMINISTRATORS_P'])) ? $user->lang['NO_ADMINISTRATORS_P'] : '{ NO_ADMINISTRATORS_P }')); ?><br /><br />
	<?php } ?>

	<br style="clear:both" />
	<strong<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?> style="float: right;"<?php } ?>><?php echo ((isset($this->_rootref['L_MODERATORS'])) ? $this->_rootref['L_MODERATORS'] : ((isset($user->lang['MODERATORS'])) ? $user->lang['MODERATORS'] : '{ MODERATORS }')); ?></strong><br />
	<?php $_mod_count = (isset($this->_tpldata['mod'])) ? sizeof($this->_tpldata['mod']) : 0;if ($_mod_count) {for ($_mod_i = 0; $_mod_i < $_mod_count; ++$_mod_i){$_mod_val = &$this->_tpldata['mod'][$_mod_i]; ?>

		<span style="float:<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>right<?php } else { ?>left<?php } ?>;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/portal/portal_user.png" width="16" height="16" alt="" /></span><span style="<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>float:right; padding-right:5px;<?php } else { ?>float:left; padding-left:5px;<?php } ?> padding-top:2px;"><strong><?php echo $_mod_val['USERNAME_FULL']; ?></strong></span><br style="clear:both" />
	<?php }} else { ?>

		<?php echo ((isset($this->_rootref['L_NO_MODERATORS_P'])) ? $this->_rootref['L_NO_MODERATORS_P'] : ((isset($user->lang['NO_MODERATORS_P'])) ? $user->lang['NO_MODERATORS_P'] : '{ NO_MODERATORS_P }')); ?>

	<?php } ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>