<?php if (!defined('IN_PHPBB')) exit; if (sizeof($this->_tpldata['latest_announcements']) || sizeof($this->_tpldata['latest_hot_topics']) || sizeof($this->_tpldata['latest_topics'])) {  ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_H_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_H_R'] : ''; ?>

	<ul class="topiclist bg1">
		<li><dl>
			<dd style="border-left:0px; width:100%">
			<table width="100%">
			<tr>
				<?php if (sizeof($this->_tpldata['latest_announcements'])) {  ?><td class="row1"><strong><?php echo ((isset($this->_rootref['L_PORTAL_RECENT_ANN'])) ? $this->_rootref['L_PORTAL_RECENT_ANN'] : ((isset($user->lang['PORTAL_RECENT_ANN'])) ? $user->lang['PORTAL_RECENT_ANN'] : '{ PORTAL_RECENT_ANN }')); ?></strong></td><?php } if (sizeof($this->_tpldata['latest_hot_topics'])) {  ?><td class="row1"><strong><?php echo ((isset($this->_rootref['L_PORTAL_RECENT_HOT_TOPIC'])) ? $this->_rootref['L_PORTAL_RECENT_HOT_TOPIC'] : ((isset($user->lang['PORTAL_RECENT_HOT_TOPIC'])) ? $user->lang['PORTAL_RECENT_HOT_TOPIC'] : '{ PORTAL_RECENT_HOT_TOPIC }')); ?></strong></td><?php } if (sizeof($this->_tpldata['latest_topics'])) {  ?><td class="row1"><strong><?php echo ((isset($this->_rootref['L_PORTAL_RECENT_TOPIC'])) ? $this->_rootref['L_PORTAL_RECENT_TOPIC'] : ((isset($user->lang['PORTAL_RECENT_TOPIC'])) ? $user->lang['PORTAL_RECENT_TOPIC'] : '{ PORTAL_RECENT_TOPIC }')); ?></strong></td><?php } ?>

			</tr>
			<tr>
				<?php if (sizeof($this->_tpldata['latest_announcements'])) {  ?>

				<td class="row1" style="width: 33%;" valign="top">
					<span class="gensmall">
					<?php $_latest_announcements_count = (isset($this->_tpldata['latest_announcements'])) ? sizeof($this->_tpldata['latest_announcements']) : 0;if ($_latest_announcements_count) {for ($_latest_announcements_i = 0; $_latest_announcements_i < $_latest_announcements_count; ++$_latest_announcements_i){$_latest_announcements_val = &$this->_tpldata['latest_announcements'][$_latest_announcements_i]; ?>

								<a href="<?php echo $_latest_announcements_val['U_VIEW_TOPIC']; ?>" title="<?php echo $_latest_announcements_val['FULL_TITLE']; ?>"><?php echo $_latest_announcements_val['TITLE']; ?></a><br />
					<?php }} ?>

					</span>
				</td>
				<?php } if (sizeof($this->_tpldata['latest_hot_topics'])) {  ?>

				<td class="row1" style="width: 33%;" valign="top">
					<span class="gensmall">
					<?php $_latest_hot_topics_count = (isset($this->_tpldata['latest_hot_topics'])) ? sizeof($this->_tpldata['latest_hot_topics']) : 0;if ($_latest_hot_topics_count) {for ($_latest_hot_topics_i = 0; $_latest_hot_topics_i < $_latest_hot_topics_count; ++$_latest_hot_topics_i){$_latest_hot_topics_val = &$this->_tpldata['latest_hot_topics'][$_latest_hot_topics_i]; ?>

						<a href="<?php echo $_latest_hot_topics_val['U_VIEW_TOPIC']; ?>" title="<?php echo $_latest_hot_topics_val['FULL_TITLE']; ?>"><?php echo $_latest_hot_topics_val['TITLE']; ?></a><br />
					<?php }} ?>

					</span>
				</td>
				<?php } if (sizeof($this->_tpldata['latest_topics'])) {  ?>

				<td class="row1" style="width: 33%;" valign="top">
					<span class="gensmall">
					<?php $_latest_topics_count = (isset($this->_tpldata['latest_topics'])) ? sizeof($this->_tpldata['latest_topics']) : 0;if ($_latest_topics_count) {for ($_latest_topics_i = 0; $_latest_topics_i < $_latest_topics_count; ++$_latest_topics_i){$_latest_topics_val = &$this->_tpldata['latest_topics'][$_latest_topics_i]; ?>

						<a href="<?php echo $_latest_topics_val['U_VIEW_TOPIC']; ?>" title="<?php echo $_latest_topics_val['FULL_TITLE']; ?>"><?php echo $_latest_topics_val['TITLE']; ?></a><br />
					<?php }} ?>

					</span>
				</td>
				<?php } ?>

			</tr>
			</table>
			</dd>
		</dl></li>
	</ul>
<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'] : ''; ?>

<?php } ?>