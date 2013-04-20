<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

			<?php if ($this->_rootref['BIRTHDAY_LIST']) {  ?>

			<strong><?php echo ((isset($this->_rootref['L_CONGRATULATIONS'])) ? $this->_rootref['L_CONGRATULATIONS'] : ((isset($user->lang['CONGRATULATIONS'])) ? $user->lang['CONGRATULATIONS'] : '{ CONGRATULATIONS }')); ?>:</strong><br /> <?php echo (isset($this->_rootref['BIRTHDAY_LIST'])) ? $this->_rootref['BIRTHDAY_LIST'] : ''; ?>

			<?php } else { ?>

			<?php echo ((isset($this->_rootref['L_NO_BIRTHDAYS'])) ? $this->_rootref['L_NO_BIRTHDAYS'] : ((isset($user->lang['NO_BIRTHDAYS'])) ? $user->lang['NO_BIRTHDAYS'] : '{ NO_BIRTHDAYS }')); ?>

			<?php } if ($this->_rootref['S_DISPLAY_BIRTHDAY_AHEAD_LIST']) {  ?>

				<hr class="dashed" />
				<strong><?php echo ((isset($this->_rootref['L_BIRTHDAYS_AHEAD'])) ? $this->_rootref['L_BIRTHDAYS_AHEAD'] : ((isset($user->lang['BIRTHDAYS_AHEAD'])) ? $user->lang['BIRTHDAYS_AHEAD'] : '{ BIRTHDAYS_AHEAD }')); ?></strong>
				<br />
				<?php if ($this->_rootref['BIRTHDAYS_AHEAD_LIST']) {  ?>

				<?php echo (isset($this->_rootref['BIRTHDAYS_AHEAD_LIST'])) ? $this->_rootref['BIRTHDAYS_AHEAD_LIST'] : ''; ?>

				<?php } else { ?>

				<?php echo ((isset($this->_rootref['L_NO_BIRTHDAYS_AHEAD'])) ? $this->_rootref['L_NO_BIRTHDAYS_AHEAD'] : ((isset($user->lang['NO_BIRTHDAYS_AHEAD'])) ? $user->lang['NO_BIRTHDAYS_AHEAD'] : '{ NO_BIRTHDAYS_AHEAD }')); ?>

				<?php } } ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>