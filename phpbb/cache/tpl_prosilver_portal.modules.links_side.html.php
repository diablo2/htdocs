<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<div class="portal-navigation">
			<ul>
			<?php $_portallinks_count = (isset($this->_tpldata['portallinks'])) ? sizeof($this->_tpldata['portallinks']) : 0;if ($_portallinks_count) {for ($_portallinks_i = 0; $_portallinks_i < $_portallinks_count; ++$_portallinks_i){$_portallinks_val = &$this->_tpldata['portallinks'][$_portallinks_i]; if ($this->_tpldata['DEFINE']['.']['MODULE_ID'] == $_portallinks_val['MODULE_ID']) {  ?><li><a href="<?php echo $_portallinks_val['LINK_URL']; ?>" title="<?php echo $_portallinks_val['LINK_TITLE']; ?>" <?php if ($_portallinks_val['NEW_WINDOW']) {  ?>onclick="window.open('<?php echo $_portallinks_val['LINK_URL']; ?>'); return false;"<?php } ?>><?php echo $_portallinks_val['LINK_TITLE']; ?></a></li><?php } }} else { ?>

				<span style="float:left;" class="gensmall"><strong><?php echo ((isset($this->_rootref['L_LINKS_NO_LINKS'])) ? $this->_rootref['L_LINKS_NO_LINKS'] : ((isset($user->lang['LINKS_NO_LINKS'])) ? $user->lang['LINKS_NO_LINKS'] : '{ LINKS_NO_LINKS }')); ?></strong></span><br />
			<?php } ?>

			</ul>
	</div>
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>