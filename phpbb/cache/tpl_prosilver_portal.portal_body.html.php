<?php if (!defined('IN_PHPBB')) exit; $this->_tpldata['DEFINE']['.']['S_IN_PORTAL'] = 1; $this->_tpl_include('overall_header.html'); $this->_tpl_include('portal/_block_config.html'); if ($this->_rootref['PORTAL_VERSION_CHECK'] && $this->_rootref['U_ACP']) {  ?> 
	<div id="portal_version_check" class="rules">
		<div class="inner"><span class="corners-top"><span></span></span>
		<strong><?php echo ((isset($this->_rootref['L_INFORMATION'])) ? $this->_rootref['L_INFORMATION'] : ((isset($user->lang['INFORMATION'])) ? $user->lang['INFORMATION'] : '{ INFORMATION }')); ?>:</strong> <?php echo (isset($this->_rootref['PORTAL_VERSION_CHECK'])) ? $this->_rootref['PORTAL_VERSION_CHECK'] : ''; ?>

		<span class="corners-bottom"><span></span></span></div>
	</div>
<?php } ?>


<table id="portal-body" cellpadding="0" cellspacing="0" border="0" width="100%">
	<?php if ($this->_rootref['S_TOP_COLUMN']) {  ?>	
	<tr>
	<!-- [+] top module area -->
		<td colspan="3">
			<?php $_modules_top_count = (isset($this->_tpldata['modules_top'])) ? sizeof($this->_tpldata['modules_top']) : 0;if ($_modules_top_count) {for ($_modules_top_i = 0; $_modules_top_i < $_modules_top_count; ++$_modules_top_i){$_modules_top_val = &$this->_tpldata['modules_top'][$_modules_top_i]; $this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'] = '' . $_modules_top_val['TEMPLATE_FILE'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] = '' . $_modules_top_val['IMAGE_SRC'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] = '' . $_modules_top_val['IMAGE_WIDTH'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] = '' . $_modules_top_val['IMAGE_HEIGHT'] . ''; $this->_tpldata['DEFINE']['.']['CUSTOM_CODE'] = '' . $_modules_top_val['CODE'] . ''; $this->_tpldata['DEFINE']['.']['TITLE'] = '' . $_modules_top_val['TITLE'] . ''; $this->_tpldata['DEFINE']['.']['MODULE_ID'] = '' . $_modules_top_val['MODULE_ID'] . ''; if (isset($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'])) { $this->_tpl_include($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE']); } }} ?>

		</td>
	<!-- [-] top module area -->
	</tr>
	<?php } ?>

	<tr>
	<!-- [+] left module area --><?php if ($this->_rootref['S_LEFT_COLUMN']) {  ?>

		<td valign="top" style="width: <?php echo (isset($this->_rootref['S_PORTAL_LEFT_COLUMN'])) ? $this->_rootref['S_PORTAL_LEFT_COLUMN'] : ''; ?>px; padding-<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>left<?php } else { ?>right<?php } ?>: <?php echo (isset($this->_tpldata['DEFINE']['.']['BLOCK_DISTANCE'])) ? $this->_tpldata['DEFINE']['.']['BLOCK_DISTANCE'] : ''; ?>;">
			<?php $_modules_left_count = (isset($this->_tpldata['modules_left'])) ? sizeof($this->_tpldata['modules_left']) : 0;if ($_modules_left_count) {for ($_modules_left_i = 0; $_modules_left_i < $_modules_left_count; ++$_modules_left_i){$_modules_left_val = &$this->_tpldata['modules_left'][$_modules_left_i]; $this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'] = '' . $_modules_left_val['TEMPLATE_FILE'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] = '' . $_modules_left_val['IMAGE_SRC'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] = '' . $_modules_left_val['IMAGE_WIDTH'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] = '' . $_modules_left_val['IMAGE_HEIGHT'] . ''; $this->_tpldata['DEFINE']['.']['CUSTOM_CODE'] = '' . $_modules_left_val['CODE'] . ''; $this->_tpldata['DEFINE']['.']['TITLE'] = '' . $_modules_left_val['TITLE'] . ''; $this->_tpldata['DEFINE']['.']['MODULE_ID'] = '' . $_modules_left_val['MODULE_ID'] . ''; if (isset($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'])) { $this->_tpl_include($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE']); } }} ?>

		</td>
		<?php } ?><!-- [-] left module area --><!-- [+] center module area --><?php if ($this->_rootref['S_CENTER_COLUMN']) {  ?>

		<td valign="top">
			<?php $_modules_center_count = (isset($this->_tpldata['modules_center'])) ? sizeof($this->_tpldata['modules_center']) : 0;if ($_modules_center_count) {for ($_modules_center_i = 0; $_modules_center_i < $_modules_center_count; ++$_modules_center_i){$_modules_center_val = &$this->_tpldata['modules_center'][$_modules_center_i]; $this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'] = '' . $_modules_center_val['TEMPLATE_FILE'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] = '' . $_modules_center_val['IMAGE_SRC'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] = '' . $_modules_center_val['IMAGE_WIDTH'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] = '' . $_modules_center_val['IMAGE_HEIGHT'] . ''; $this->_tpldata['DEFINE']['.']['CUSTOM_CODE'] = '' . $_modules_center_val['CODE'] . ''; $this->_tpldata['DEFINE']['.']['TITLE'] = '' . $_modules_center_val['TITLE'] . ''; $this->_tpldata['DEFINE']['.']['MODULE_ID'] = '' . $_modules_center_val['MODULE_ID'] . ''; if (isset($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'])) { $this->_tpl_include($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE']); } }} if ($this->_rootref['S_DISPLAY_JUMPBOX'] && $this->_rootref['B3P_DISPLAY_JUMPBOX']) {  ?>

				<br />
				<?php $this->_tpl_include('portal/modules/jumpbox.html'); } ?>

		</td>
		<?php } ?><!-- [-] center module area --><!-- [+] right module area --><?php if ($this->_rootref['S_RIGHT_COLUMN']) {  ?>

		<td valign="top" style="width: <?php echo (isset($this->_rootref['S_PORTAL_RIGHT_COLUMN'])) ? $this->_rootref['S_PORTAL_RIGHT_COLUMN'] : ''; ?>px; padding-<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>right<?php } else { ?>left<?php } ?>: <?php echo (isset($this->_tpldata['DEFINE']['.']['BLOCK_DISTANCE'])) ? $this->_tpldata['DEFINE']['.']['BLOCK_DISTANCE'] : ''; ?>;">
			<?php $_modules_right_count = (isset($this->_tpldata['modules_right'])) ? sizeof($this->_tpldata['modules_right']) : 0;if ($_modules_right_count) {for ($_modules_right_i = 0; $_modules_right_i < $_modules_right_count; ++$_modules_right_i){$_modules_right_val = &$this->_tpldata['modules_right'][$_modules_right_i]; $this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'] = '' . $_modules_right_val['TEMPLATE_FILE'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] = '' . $_modules_right_val['IMAGE_SRC'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] = '' . $_modules_right_val['IMAGE_WIDTH'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] = '' . $_modules_right_val['IMAGE_HEIGHT'] . ''; $this->_tpldata['DEFINE']['.']['CUSTOM_CODE'] = '' . $_modules_right_val['CODE'] . ''; $this->_tpldata['DEFINE']['.']['TITLE'] = '' . $_modules_right_val['TITLE'] . ''; $this->_tpldata['DEFINE']['.']['MODULE_ID'] = '' . $_modules_right_val['MODULE_ID'] . ''; if (isset($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'])) { $this->_tpl_include($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE']); } }} ?>

		</td>
		<?php } ?><!-- [-] right module area -->
	</tr>
	<?php if ($this->_rootref['S_BOTTOM_COLUMN']) {  ?>

	<tr>
	<!-- [+] bottom module area -->
			<td colspan="3">
			<?php $_modules_bottom_count = (isset($this->_tpldata['modules_bottom'])) ? sizeof($this->_tpldata['modules_bottom']) : 0;if ($_modules_bottom_count) {for ($_modules_bottom_i = 0; $_modules_bottom_i < $_modules_bottom_count; ++$_modules_bottom_i){$_modules_bottom_val = &$this->_tpldata['modules_bottom'][$_modules_bottom_i]; $this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'] = '' . $_modules_bottom_val['TEMPLATE_FILE'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] = '' . $_modules_bottom_val['IMAGE_SRC'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] = '' . $_modules_bottom_val['IMAGE_WIDTH'] . ''; $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] = '' . $_modules_bottom_val['IMAGE_HEIGHT'] . ''; $this->_tpldata['DEFINE']['.']['CUSTOM_CODE'] = '' . $_modules_bottom_val['CODE'] . ''; $this->_tpldata['DEFINE']['.']['TITLE'] = '' . $_modules_bottom_val['TITLE'] . ''; $this->_tpldata['DEFINE']['.']['MODULE_ID'] = '' . $_modules_bottom_val['MODULE_ID'] . ''; if (isset($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE'])) { $this->_tpl_include($this->_tpldata['DEFINE']['.']['TEMPLATE_FILE']); } }} ?>

		</td>
	<!-- [-] bottom module area -->
	</tr>
	<?php } ?>

</table>

<!--// board3 Portal by www.board3.de //-->
<div class="copyright">Powered by <a href="http://www.board3.de/">Board3 Portal</a> &copy; 2009 - 2011 Board3 Group</div>

<?php $this->_tpl_include('overall_footer.html'); ?>