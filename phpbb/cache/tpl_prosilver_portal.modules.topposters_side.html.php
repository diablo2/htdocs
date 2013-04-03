<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>

	<span style="float:right;padding-right:10px;"><strong><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></strong></span>
	<span style="float:left;"><strong><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></strong></span><br style="clear:both" />
	<?php } else { ?>

	<span style="float:left;"><strong><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?></strong></span>
	<span style="float:right;padding-right:10px;"><strong><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></strong></span><br style="clear:both" />
	<?php } $_topposters_count = (isset($this->_tpldata['topposters'])) ? sizeof($this->_tpldata['topposters']) : 0;if ($_topposters_count) {for ($_topposters_i = 0; $_topposters_i < $_topposters_count; ++$_topposters_i){$_topposters_val = &$this->_tpldata['topposters'][$_topposters_i]; if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>

		<span style="float:right; padding-right:10px; padding-top:2px;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/portal/portal_user.png" width="16" height="16" alt="" /></span><span style="float:right; padding-right:5px; padding-top:2px;"><?php echo $_topposters_val['USERNAME_FULL']; ?></span>
		<span style="float:left;"><a href="<?php echo $_topposters_val['S_SEARCH_ACTION']; ?>"><?php echo $_topposters_val['POSTER_POSTS']; ?></a></span><br style="clear:both" />
		<?php } else { ?>

		<span style="float:left;"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/portal/portal_user.png" width="16" height="16" alt="" /></span><span style="float:left; padding-left:5px; padding-top:2px;"><?php echo $_topposters_val['USERNAME_FULL']; ?></span>
		<span style="float:right; padding-right:10px; padding-top:2px;"><a href="<?php echo $_topposters_val['S_SEARCH_ACTION']; ?>"><?php echo $_topposters_val['POSTER_POSTS']; ?></a></span><br style="clear:both" />
		<?php } }} ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>