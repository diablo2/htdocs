<?php if (!defined('IN_PHPBB')) exit; ?><form action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>" method="post">
<div>
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; ?><a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; ?></a><?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<span class="genmed"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</span><br />
	<input type="text" tabindex="1" name="username" id="username" value="" class="inputbox autowidth" /><br /><br /> 
	<span class="genmed"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</span><br />
	<input type="password" tabindex="2" id="password" name="password" class="inputbox autowidth" /> 
	<?php if ($this->_rootref['S_DISPLAY_FULL_LOGIN']) {  ?>			
		<br /><br />
		<?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?>

			<input type="checkbox" class="radio" name="autologin" tabindex="3" /> <span class="gensmall"><?php echo ((isset($this->_rootref['L_UM_LOG_ME_IN'])) ? $this->_rootref['L_UM_LOG_ME_IN'] : ((isset($user->lang['UM_LOG_ME_IN'])) ? $user->lang['UM_LOG_ME_IN'] : '{ UM_LOG_ME_IN }')); ?></span><br />
		<?php } } if ($this->_rootref['S_SHOW_REGISTER'] && $this->_rootref['S_REGISTER_ENABLED']) {  ?>

		<br /><a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_UM_REGISTER_NOW'])) ? $this->_rootref['L_UM_REGISTER_NOW'] : ((isset($user->lang['UM_REGISTER_NOW'])) ? $user->lang['UM_REGISTER_NOW'] : '{ UM_REGISTER_NOW }')); ?></a><br />
	<?php } ?>

	<br />
	<input type="hidden" name="redirect" value="<?php echo (isset($this->_rootref['U_PORTAL'])) ? $this->_rootref['U_PORTAL'] : ''; ?>" />
	<input type="submit" name="login" tabindex="5" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" class="button1" />
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>

</div>
</form>