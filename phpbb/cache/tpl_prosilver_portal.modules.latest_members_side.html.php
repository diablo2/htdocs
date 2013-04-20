<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>

	<span style="float:left;"><strong><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?></strong></span>
	<span style="float:right;padding-right:10px;"><strong><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></strong></span><br style="clear:both" />
	<?php } else { ?>

	<span style="float:left;"><strong><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></strong></span>
	<span style="float:right;padding-right:10px;"><strong><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?></strong></span><br style="clear:both" />
	<?php } $_latest_members_count = (isset($this->_tpldata['latest_members'])) ? sizeof($this->_tpldata['latest_members']) : 0;if ($_latest_members_count) {for ($_latest_members_i = 0; $_latest_members_i < $_latest_members_count; ++$_latest_members_i){$_latest_members_val = &$this->_tpldata['latest_members'][$_latest_members_i]; if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>

		<span style="float:left;"><?php echo $_latest_members_val['JOINED']; ?></span>
		<span style="float:right;padding-right:10px; padding-top:2px;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/portal/portal_user.png" width="16" height="16" alt="" /></span><span style="float:right; padding-right:5px; padding-top:2px;"><?php echo $_latest_members_val['USERNAME_FULL']; ?></span><br style="clear:both" />
		<?php } else { ?>

		<span style="float:left;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/portal/portal_user.png" width="16" height="16" alt="" /></span><span style="float:left; padding-left:5px; padding-top:2px;"><?php echo $_latest_members_val['USERNAME_FULL']; ?></span>
		<span style="float:right;padding-right:10px; padding-top:2px;"><?php echo $_latest_members_val['JOINED']; ?></span><br style="clear:both" />
		<?php } }} ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>