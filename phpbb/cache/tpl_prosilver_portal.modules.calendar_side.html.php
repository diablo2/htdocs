<?php if (!defined('IN_PHPBB')) exit; $_minical_count = (isset($this->_tpldata['minical'])) ? sizeof($this->_tpldata['minical']) : 0;if ($_minical_count) {for ($_minical_i = 0; $_minical_i < $_minical_count; ++$_minical_i){$_minical_val = &$this->_tpldata['minical'][$_minical_i]; if ($_minical_val['MODULE_ID'] == $this->_tpldata['DEFINE']['.']['MODULE_ID']) {  ?>

<a id="minical<?php echo $_minical_val['MODULE_ID']; ?>" style="float: right;"></a>
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>	
	<table width="100%" cellspacing="1">
		<tr>
			<td align="left" colspan="2"><?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  echo $_minical_val['U_NEXT_MONTH']; } else { echo $_minical_val['U_PREV_MONTH']; } ?></td>
			<td colspan="3" align="center"><span class="genmed"><?php echo $_minical_val['L_MINI_CAL_MONTH']; ?></span></td>
			<td align="right" colspan="2"><?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  echo $_minical_val['U_PREV_MONTH']; } else { echo $_minical_val['U_NEXT_MONTH']; } ?></td>
		</tr>
		<tr>
			<?php if ($_minical_val['S_SUNDAY_FIRST']) {  ?>

				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_SUN']; ?></span></td>
			<?php } ?>

				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_MON']; ?></span></td>
				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_TUE']; ?></span></td>
				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_WED']; ?></span></td>
				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_THU']; ?></span></td>
				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_FRI']; ?></span></td>
				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_SAT']; ?></span></td>
			<?php if (! $_minical_val['S_SUNDAY_FIRST']) {  ?>

				<td style="width: 14%;"><span class="gensmall" style="font-weight: bold"><?php echo $_minical_val['L_MINI_CAL_SUN']; ?></span></td>
			<?php } ?>

		</tr>
		<?php $_mini_cal_row_count = (isset($_minical_val['mini_cal_row'])) ? sizeof($_minical_val['mini_cal_row']) : 0;if ($_mini_cal_row_count) {for ($_mini_cal_row_i = 0; $_mini_cal_row_i < $_mini_cal_row_count; ++$_mini_cal_row_i){$_mini_cal_row_val = &$_minical_val['mini_cal_row'][$_mini_cal_row_i]; if ($_mini_cal_row_val['MODULE_ID'] == $this->_tpldata['DEFINE']['.']['MODULE_ID']) {  ?>

		<tr>
			<?php $_mini_cal_days_count = (isset($_mini_cal_row_val['mini_cal_days'])) ? sizeof($_mini_cal_row_val['mini_cal_days']) : 0;if ($_mini_cal_days_count) {for ($_mini_cal_days_i = 0; $_mini_cal_days_i < $_mini_cal_days_count; ++$_mini_cal_days_i){$_mini_cal_days_val = &$_mini_cal_row_val['mini_cal_days'][$_mini_cal_days_i]; ?>

				<td class="row1" align="center"><span class="gensmall"><?php echo $_mini_cal_days_val['MINI_CAL_DAY']; ?></span></td>
			<?php }} ?>

		</tr>
		<?php } }} ?>

	</table>
	<?php if ($_minical_val['S_DISPLAY_EVENTS']) {  ?>

	<hr class="dashed" />
	<div class="menutitle" style="font: bold 12px 'Trebuchet MS','Lucida Grande',Arial,sans-serif; text-decoration: underline;"><?php echo ((isset($this->_rootref['L_CURRENT_EVENTS'])) ? $this->_rootref['L_CURRENT_EVENTS'] : ((isset($user->lang['CURRENT_EVENTS'])) ? $user->lang['CURRENT_EVENTS'] : '{ CURRENT_EVENTS }')); ?>:</div>
	<ul class="portal-events">
		<?php $_cur_events_count = (isset($_minical_val['cur_events'])) ? sizeof($_minical_val['cur_events']) : 0;if ($_cur_events_count) {for ($_cur_events_i = 0; $_cur_events_i < $_cur_events_count; ++$_cur_events_i){$_cur_events_val = &$_minical_val['cur_events'][$_cur_events_i]; ?>


		<li class="row">
			<dl class="icon">
				<dt style="width: 100%; padding-left: 0px; padding-bottom: 5px;">
					<?php if ($_cur_events_val['EVENT_URL']) {  ?><a href="<?php echo $_cur_events_val['EVENT_URL']; ?>" title="<?php echo $_cur_events_val['EVENT_TITLE']; ?>" <?php if ($_cur_events_val['EVENT_URL_NEW_WINDOW']) {  ?>onclick="window.open('<?php echo $_cur_events_val['EVENT_URL']; ?>'); return false;"<?php } ?>><?php } ?>

					<span style="font-weight: bold;"><?php echo $_cur_events_val['EVENT_TITLE']; ?>:</span><br />
					<?php if ($_cur_events_val['ALL_DAY']) {  echo ((isset($this->_rootref['L_EVENT_START'])) ? $this->_rootref['L_EVENT_START'] : ((isset($user->lang['EVENT_START'])) ? $user->lang['EVENT_START'] : '{ EVENT_START }')); ?>:&nbsp;<?php echo $_cur_events_val['START_TIME']; ?><br /><?php echo ((isset($this->_rootref['L_EVENT_ALL_DAY'])) ? $this->_rootref['L_EVENT_ALL_DAY'] : ((isset($user->lang['EVENT_ALL_DAY'])) ? $user->lang['EVENT_ALL_DAY'] : '{ EVENT_ALL_DAY }')); ?><br />
					<?php } else if (! $_cur_events_val['ALL_DAY'] && $_cur_events_val['END_TIME']) {  echo ((isset($this->_rootref['L_EVENT_START'])) ? $this->_rootref['L_EVENT_START'] : ((isset($user->lang['EVENT_START'])) ? $user->lang['EVENT_START'] : '{ EVENT_START }')); ?>:&nbsp;<?php echo $_cur_events_val['START_TIME']; ?><br /><?php echo ((isset($this->_rootref['L_EVENT_END'])) ? $this->_rootref['L_EVENT_END'] : ((isset($user->lang['EVENT_END'])) ? $user->lang['EVENT_END'] : '{ EVENT_END }')); ?>:&nbsp;<?php echo $_cur_events_val['END_TIME']; ?><br />
					<?php } else { echo ((isset($this->_rootref['L_EVENT_ALL_DAY'])) ? $this->_rootref['L_EVENT_ALL_DAY'] : ((isset($user->lang['EVENT_ALL_DAY'])) ? $user->lang['EVENT_ALL_DAY'] : '{ EVENT_ALL_DAY }')); ?><br />
					<?php } if ($_cur_events_val['EVENT_DESC']) {  ?><span style="font-style: italic;"><?php echo $_cur_events_val['EVENT_DESC']; ?></span><?php } if ($_cur_events_val['EVENT_URL']) {  ?></a><?php } ?>

				</dt>
			</dl>
		</li>

		<?php }} else { ?>

		<li class="calendar-info"><span style="float:left;" class="gensmall"><strong><?php echo ((isset($this->_rootref['L_NO_CUR_EVENTS'])) ? $this->_rootref['L_NO_CUR_EVENTS'] : ((isset($user->lang['NO_CUR_EVENTS'])) ? $user->lang['NO_CUR_EVENTS'] : '{ NO_CUR_EVENTS }')); ?></strong></span><br /></li>
		<?php } ?>

	</ul>
	<hr style="margin: 5px 0; border-top: 0;" />
	<div class="menutitle" style="font: bold 12px 'Trebuchet MS','Lucida Grande',Arial,sans-serif; text-decoration: underline;"><?php echo ((isset($this->_rootref['L_UPCOMING_EVENTS'])) ? $this->_rootref['L_UPCOMING_EVENTS'] : ((isset($user->lang['UPCOMING_EVENTS'])) ? $user->lang['UPCOMING_EVENTS'] : '{ UPCOMING_EVENTS }')); ?>:</div>
	<ul class="portal-events">
		<?php $_upcoming_events_count = (isset($_minical_val['upcoming_events'])) ? sizeof($_minical_val['upcoming_events']) : 0;if ($_upcoming_events_count) {for ($_upcoming_events_i = 0; $_upcoming_events_i < $_upcoming_events_count; ++$_upcoming_events_i){$_upcoming_events_val = &$_minical_val['upcoming_events'][$_upcoming_events_i]; ?>

		
		<li class="row">
			<dl class="icon">
				<dt style="width: 100%; padding-left: 0px; padding-bottom: 5px;">
					<?php if ($_upcoming_events_val['EVENT_URL']) {  ?><a href="<?php echo $_upcoming_events_val['EVENT_URL']; ?>" title="<?php echo $_upcoming_events_val['EVENT_TITLE']; ?>" <?php if ($_upcoming_events_val['EVENT_URL_NEW_WINDOW']) {  ?>onclick="window.open('<?php echo $_upcoming_events_val['EVENT_URL']; ?>'); return false;"<?php } ?>><?php } ?>

					<span style="font-weight: bold;"><?php echo $_upcoming_events_val['EVENT_TITLE']; ?>:</span><br />
					<?php if (! $_upcoming_events_val['ALL_DAY'] && ! $_upcoming_events_val['END_TIME']) {  echo ((isset($this->_rootref['L_EVENT_TIME'])) ? $this->_rootref['L_EVENT_TIME'] : ((isset($user->lang['EVENT_TIME'])) ? $user->lang['EVENT_TIME'] : '{ EVENT_TIME }')); ?>:&nbsp;<?php echo $_upcoming_events_val['START_TIME']; ?><br />
					<?php } else if (! $_upcoming_events_val['ALL_DAY'] && $_upcoming_events_val['END_TIME']) {  echo ((isset($this->_rootref['L_EVENT_START'])) ? $this->_rootref['L_EVENT_START'] : ((isset($user->lang['EVENT_START'])) ? $user->lang['EVENT_START'] : '{ EVENT_START }')); ?>:&nbsp;<?php echo $_upcoming_events_val['START_TIME']; ?><br /><?php echo ((isset($this->_rootref['L_EVENT_END'])) ? $this->_rootref['L_EVENT_END'] : ((isset($user->lang['EVENT_END'])) ? $user->lang['EVENT_END'] : '{ EVENT_END }')); ?>:&nbsp;<?php echo $_upcoming_events_val['END_TIME']; ?><br />
					<?php } else { echo ((isset($this->_rootref['L_EVENT_TIME'])) ? $this->_rootref['L_EVENT_TIME'] : ((isset($user->lang['EVENT_TIME'])) ? $user->lang['EVENT_TIME'] : '{ EVENT_TIME }')); ?>:&nbsp;<?php echo $_upcoming_events_val['START_TIME']; ?><br /><?php echo ((isset($this->_rootref['L_EVENT_ALL_DAY'])) ? $this->_rootref['L_EVENT_ALL_DAY'] : ((isset($user->lang['EVENT_ALL_DAY'])) ? $user->lang['EVENT_ALL_DAY'] : '{ EVENT_ALL_DAY }')); ?><br />
					<?php } if ($_upcoming_events_val['EVENT_DESC']) {  ?><span style="font-style: italic;"><?php echo $_upcoming_events_val['EVENT_DESC']; ?></span><br /><?php } if ($_upcoming_events_val['EVENT_URL']) {  ?></a><?php } ?>

				</dt>
			</dl>
		</li>
		
		<?php }} else { ?>

		<li class="calendar-info"><span style="float:left;" class="gensmall"><strong><?php echo ((isset($this->_rootref['L_NO_UPCOMING_EVENTS'])) ? $this->_rootref['L_NO_UPCOMING_EVENTS'] : ((isset($user->lang['NO_UPCOMING_EVENTS'])) ? $user->lang['NO_UPCOMING_EVENTS'] : '{ NO_UPCOMING_EVENTS }')); ?></strong></span><br /></li>
		<?php } ?>

	</ul>
	<br />
	<?php } ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>

<?php } }} ?>