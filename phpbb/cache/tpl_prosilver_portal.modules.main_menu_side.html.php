<?php if (!defined('IN_PHPBB')) exit; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<div class="portal-navigation">
	<?php $_portalmenu_count = (isset($this->_tpldata['portalmenu'])) ? sizeof($this->_tpldata['portalmenu']) : 0;if ($_portalmenu_count) {for ($_portalmenu_i = 0; $_portalmenu_i < $_portalmenu_count; ++$_portalmenu_i){$_portalmenu_val = &$this->_tpldata['portalmenu'][$_portalmenu_i]; if ($this->_tpldata['DEFINE']['.']['MODULE_ID'] == $_portalmenu_val['MODULE_ID']) {  ?>

		<div class="menutitle"><?php echo $_portalmenu_val['CAT_TITLE']; ?></div>
			<ul>
			<?php $_links_count = (isset($_portalmenu_val['links'])) ? sizeof($_portalmenu_val['links']) : 0;if ($_links_count) {for ($_links_i = 0; $_links_i < $_links_count; ++$_links_i){$_links_val = &$_portalmenu_val['links'][$_links_i]; ?>

				<li><a href="<?php echo $_links_val['LINK_URL']; ?>" <?php if ($_links_val['NEW_WINDOW']) {  ?>onclick="window.open('<?php echo $_links_val['LINK_URL']; ?>'); return false;"<?php } ?>><?php echo $_links_val['LINK_TITLE']; ?></a></li>
			<?php }} ?>

			</ul>
		<hr class="dashed" />
		<?php } }} else { ?>

		<ul>
			<span style="float:left;" class="gensmall"><strong><?php echo ((isset($this->_rootref['L_MENU_NO_LINKS'])) ? $this->_rootref['L_MENU_NO_LINKS'] : ((isset($user->lang['MENU_NO_LINKS'])) ? $user->lang['MENU_NO_LINKS'] : '{ MENU_NO_LINKS }')); ?></strong></span><br />
		</ul>
	<?php } ?>

	</div>
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>