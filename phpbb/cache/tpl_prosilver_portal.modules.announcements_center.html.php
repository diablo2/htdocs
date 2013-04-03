<?php if (!defined('IN_PHPBB')) exit; $_announcements_center_row_count = (isset($this->_tpldata['announcements_center_row'])) ? sizeof($this->_tpldata['announcements_center_row']) : 0;if ($_announcements_center_row_count) {for ($_announcements_center_row_i = 0; $_announcements_center_row_i < $_announcements_center_row_count; ++$_announcements_center_row_i){$_announcements_center_row_val = &$this->_tpldata['announcements_center_row'][$_announcements_center_row_i]; if ($_announcements_center_row_val['S_FIRST_ROW']) {  ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_H_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_H_R'] : ''; ?>

<?php } if ($this->_tpldata['DEFINE']['.']['S_POSTBODY_TOP']) {  ?><div class="postbody" style="width: 100%"><?php } if ($_announcements_center_row_val['S_NO_TOPICS']) {  ?>

	<div class="post bg2" style="margin-bottom: 0px">
		<div class="inner"><span class="portal-corners-top-inner"></span>
			<span style="text-align: center;"><strong><?php echo ((isset($this->_rootref['L_NO_ANNOUNCEMENTS'])) ? $this->_rootref['L_NO_ANNOUNCEMENTS'] : ((isset($user->lang['NO_ANNOUNCEMENTS'])) ? $user->lang['NO_ANNOUNCEMENTS'] : '{ NO_ANNOUNCEMENTS }')); ?></strong></span>
	<?php } else { ?>

	<div style="margin-bottom: <?php if ($_announcements_center_row_val['S_LAST_ROW']) {  ?>0px<?php } else { ?>1px<?php } ?>" class="post <?php if (($_announcements_center_row_val['S_ROW_COUNT'] & 1)  ) {  ?>bg1<?php } else { ?>bg2<?php } ?>">
		<div class="inner"><span class="portal-corners-top-inner"></span>
			<h4 class="first"><a <?php if ($_announcements_center_row_val['S_FIRST_ROW']) {  ?>id="a" <?php } ?>name="a<?php echo $_announcements_center_row_val['A_ID']; ?>"></a><?php if ($_announcements_center_row_val['S_UNREAD_INFO']) {  ?><a href="<?php echo $_announcements_center_row_val['U_VIEW_UNREAD']; ?>"><?php echo (isset($this->_rootref['NEWEST_POST_IMG'])) ? $this->_rootref['NEWEST_POST_IMG'] : ''; ?></a><?php } else { ?><a href="<?php echo $_announcements_center_row_val['U_LAST_COMMENTS']; ?>"><?php echo (isset($this->_rootref['READ_POST_IMG'])) ? $this->_rootref['READ_POST_IMG'] : ''; ?></a><?php } ?> <?php echo $_announcements_center_row_val['ATTACH_ICON_IMG']; ?> <?php if ($_announcements_center_row_val['S_POLL']) {  ?> <strong><?php echo ((isset($this->_rootref['L_VIEW_TOPIC_POLL'])) ? $this->_rootref['L_VIEW_TOPIC_POLL'] : ((isset($user->lang['VIEW_TOPIC_POLL'])) ? $user->lang['VIEW_TOPIC_POLL'] : '{ VIEW_TOPIC_POLL }')); ?>: </strong><?php } if ($_announcements_center_row_val['TOPIC_ICON_IMG']) {  ?><img src="<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_announcements_center_row_val['TOPIC_ICON_IMG']; ?>" width="<?php echo $_announcements_center_row_val['TOPIC_ICON_IMG_WIDTH']; ?>" height="<?php echo $_announcements_center_row_val['TOPIC_ICON_IMG_HEIGHT']; ?>" alt="" /> <?php } ?><a href="<?php echo $_announcements_center_row_val['U_VIEW_COMMENTS']; ?>"><strong><?php echo $_announcements_center_row_val['TITLE']; ?></strong></a></h4>
			<?php if ($_announcements_center_row_val['PAGINATION']) {  ?><strong class="pagination"><span><?php echo $_announcements_center_row_val['PAGINATION']; ?></span></strong><?php } ?>

			<ul class="linklist">
				<li><?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?>: <?php echo $_announcements_center_row_val['POSTER_FULL']; ?> &raquo; <?php echo $_announcements_center_row_val['TIME']; ?></li>
				<li class="rightside"><?php if ($_announcements_center_row_val['FORUM_NAME']) {  echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <strong><a href="<?php echo $_announcements_center_row_val['U_VIEWFORUM']; ?>"><?php echo $_announcements_center_row_val['FORUM_NAME']; ?></a></strong><?php } else { echo ((isset($this->_rootref['L_GLOBAL_ANNOUNCEMENT'])) ? $this->_rootref['L_GLOBAL_ANNOUNCEMENT'] : ((isset($user->lang['GLOBAL_ANNOUNCEMENT'])) ? $user->lang['GLOBAL_ANNOUNCEMENT'] : '{ GLOBAL_ANNOUNCEMENT }')); } ?></li>
			</ul>
			<?php if (! $this->_tpldata['DEFINE']['.']['S_POSTBODY_TOP']) {  ?><div class="postbody" style="width: 100%"><?php } ?>

				<div class="content">
					<br /><?php echo $_announcements_center_row_val['TEXT']; ?>

				</div>
			<?php if ($_announcements_center_row_val['S_HAS_ATTACHMENTS']) {  ?>

			<dl class="attachbox">
				<dt><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></dt>
				<?php $_attachment_count = (isset($_announcements_center_row_val['attachment'])) ? sizeof($_announcements_center_row_val['attachment']) : 0;if ($_attachment_count) {for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i){$_attachment_val = &$_announcements_center_row_val['attachment'][$_attachment_i]; ?>

					<dd><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></dd>
				<?php }} ?>

			</dl>
			<?php } ?>

			<br style="clear:both" />
			<span style="float: left;"><?php echo ((isset($this->_rootref['L_TOPIC_VIEWS'])) ? $this->_rootref['L_TOPIC_VIEWS'] : ((isset($user->lang['TOPIC_VIEWS'])) ? $user->lang['TOPIC_VIEWS'] : '{ TOPIC_VIEWS }')); ?>: <?php echo $_announcements_center_row_val['TOPIC_VIEWS']; ?> &nbsp;&bull;&nbsp; <a href="<?php echo $_announcements_center_row_val['U_VIEW_COMMENTS']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_COMMENTS'])) ? $this->_rootref['L_VIEW_COMMENTS'] : ((isset($user->lang['VIEW_COMMENTS'])) ? $user->lang['VIEW_COMMENTS'] : '{ VIEW_COMMENTS }')); ?>"><?php echo ((isset($this->_rootref['L_COMMENTS'])) ? $this->_rootref['L_COMMENTS'] : ((isset($user->lang['COMMENTS'])) ? $user->lang['COMMENTS'] : '{ COMMENTS }')); ?>: <?php echo $_announcements_center_row_val['REPLIES']; ?></a> &nbsp;&bull;&nbsp; <a href="<?php echo $_announcements_center_row_val['U_POST_COMMENT']; ?>"><?php echo ((isset($this->_rootref['L_POST_REPLY'])) ? $this->_rootref['L_POST_REPLY'] : ((isset($user->lang['POST_REPLY'])) ? $user->lang['POST_REPLY'] : '{ POST_REPLY }')); ?></a></span>
			<span style="float: right; margin: 0 0 5px 0"><?php echo $_announcements_center_row_val['OPEN']; ?><a href="<?php echo $_announcements_center_row_val['U_READ_FULL']; ?>"><?php echo $_announcements_center_row_val['L_READ_FULL']; ?></a><?php echo $_announcements_center_row_val['CLOSE']; ?></span>
			<div class="back2top"><a href="#wrap" class="top" title="<?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?>"><?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?></a></div>
			<?php if ($_announcements_center_row_val['S_NOT_LAST']) {  ?><br style="clear:both" /><?php } if ($_announcements_center_row_val['S_LAST_ROW'] && ( $this->_rootref['AP_PAGINATION'] || $this->_rootref['TOTAL_ANNOUNCEMENTS'] )) {  ?>

				<hr class="dashed" />
				<div class="pagination">
					<?php echo (isset($this->_rootref['TOTAL_ANNOUNCEMENTS'])) ? $this->_rootref['TOTAL_ANNOUNCEMENTS'] : ''; ?>

				<?php if ($this->_rootref['AP_PAGE_NUMBER']) {  if ($this->_rootref['AP_PAGINATION']) {  ?> &bull; <?php echo (isset($this->_rootref['AP_PAGE_NUMBER'])) ? $this->_rootref['AP_PAGE_NUMBER'] : ''; ?> &bull; <span><?php echo (isset($this->_rootref['AP_PAGINATION'])) ? $this->_rootref['AP_PAGINATION'] : ''; ?></span><?php } else { ?> &bull; <?php echo (isset($this->_rootref['AP_PAGE_NUMBER'])) ? $this->_rootref['AP_PAGE_NUMBER'] : ''; } } ?>

				</div>
			<?php } if (! $this->_tpldata['DEFINE']['.']['S_POSTBODY_TOP']) {  ?></div><?php } } ?>

		<span class="portal-corners-bottom-inner"></span></div>
	</div>
<?php if ($this->_tpldata['DEFINE']['.']['S_POSTBODY_TOP']) {  ?></div><?php } if ($_announcements_center_row_val['S_LAST_ROW']) {  ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'] : ''; ?>

<?php } }} ?>