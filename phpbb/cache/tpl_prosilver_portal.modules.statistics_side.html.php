<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<strong><?php echo ((isset($this->_rootref['L_ST_TOP'])) ? $this->_rootref['L_ST_TOP'] : ((isset($user->lang['ST_TOP'])) ? $user->lang['ST_TOP'] : '{ ST_TOP }')); ?></strong><br />
	<?php echo (isset($this->_rootref['B3_TOTAL_POSTS'])) ? $this->_rootref['B3_TOTAL_POSTS'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_TOTAL_TOPICS'])) ? $this->_rootref['B3_TOTAL_TOPICS'] : ''; ?><br />
	<?php echo ((isset($this->_rootref['L_ST_TOP_ANNS'])) ? $this->_rootref['L_ST_TOP_ANNS'] : ((isset($user->lang['ST_TOP_ANNS'])) ? $user->lang['ST_TOP_ANNS'] : '{ ST_TOP_ANNS }')); ?> <strong><?php echo (isset($this->_rootref['B3_ANNOUNCE_COUNT'])) ? $this->_rootref['B3_ANNOUNCE_COUNT'] : ''; ?></strong><br />
	<?php echo ((isset($this->_rootref['L_ST_TOP_STICKYS'])) ? $this->_rootref['L_ST_TOP_STICKYS'] : ((isset($user->lang['ST_TOP_STICKYS'])) ? $user->lang['ST_TOP_STICKYS'] : '{ ST_TOP_STICKYS }')); ?> <strong><?php echo (isset($this->_rootref['B3_STICKY_COUNT'])) ? $this->_rootref['B3_STICKY_COUNT'] : ''; ?></strong><br />
	<?php echo ((isset($this->_rootref['L_ST_TOT_ATTACH'])) ? $this->_rootref['L_ST_TOT_ATTACH'] : ((isset($user->lang['ST_TOT_ATTACH'])) ? $user->lang['ST_TOT_ATTACH'] : '{ ST_TOT_ATTACH }')); ?> <strong><?php echo (isset($this->_rootref['B3_TOTAL_ATTACH'])) ? $this->_rootref['B3_TOTAL_ATTACH'] : ''; ?></strong><br />
		
	<hr class="dashed" />
	<?php echo (isset($this->_rootref['B3_TOPICS_PER_DAY'])) ? $this->_rootref['B3_TOPICS_PER_DAY'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_POSTS_PER_DAY'])) ? $this->_rootref['B3_POSTS_PER_DAY'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_USERS_PER_DAY'])) ? $this->_rootref['B3_USERS_PER_DAY'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_TOPICS_PER_USER'])) ? $this->_rootref['B3_TOPICS_PER_USER'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_POSTS_PER_USER'])) ? $this->_rootref['B3_POSTS_PER_USER'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_POSTS_PER_TOPIC'])) ? $this->_rootref['B3_POSTS_PER_TOPIC'] : ''; ?><br />
	<hr class="dashed" />
	
	<?php echo (isset($this->_rootref['B3_TOTAL_USERS'])) ? $this->_rootref['B3_TOTAL_USERS'] : ''; ?><br />
	<?php echo (isset($this->_rootref['B3_NEWEST_USER'])) ? $this->_rootref['B3_NEWEST_USER'] : ''; ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>