<?php if (!defined('IN_PHPBB')) exit; $_news_row_count = (isset($this->_tpldata['news_row'])) ? sizeof($this->_tpldata['news_row']) : 0;if ($_news_row_count) {for ($_news_row_i = 0; $_news_row_i < $_news_row_count; ++$_news_row_i){$_news_row_val = &$this->_tpldata['news_row'][$_news_row_i]; if ($_news_row_val['S_NO_TOPICS']) {  ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_H_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_H_R'] : ''; ?>

	<div class="post bg2" style="margin-bottom: 0px">
		<div class="inner"><span class="portal-corners-top-inner"></span>
			<span style="text-align: center;"><strong><?php echo ((isset($this->_rootref['L_NO_NEWS'])) ? $this->_rootref['L_NO_NEWS'] : ((isset($user->lang['NO_NEWS'])) ? $user->lang['NO_NEWS'] : '{ NO_NEWS }')); ?></strong></span>
		<span class="portal-corners-bottom-inner"></span></div>
	</div>
<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'] : ''; ?>

<?php } else { if ($_news_row_val['S_FIRST_ROW']) {  ?>

<?php echo (isset($this->_tpldata['DEFINE']['.']['CC_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['CC_BLOCK_H_L'] : ''; ?>

	<dt id="n" <?php if ($this->_rootref['S_DISPLAY_NEWS_RVS']) {  ?>style="width: 44%"<?php } else { ?>style="width: 60%"<?php } ?>><?php echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; ?></dt>
	<?php if ($this->_rootref['S_DISPLAY_NEWS_RVS']) {  ?>

		<dd class="posts" style="width: 11%"><?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?></dd>
		<dd class="views" style="width: 11%"><?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?></dd>
	<?php } ?>

	<dd class="lastpost" style="width: 25%"><span><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></span></dd>
<?php echo (isset($this->_tpldata['DEFINE']['.']['CC_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['CC_BLOCK_H_R'] : ''; ?>

<ul class="topiclist topics">
<?php } ?>

	<li class="row<?php if (!($_news_row_val['S_ROW_COUNT'] & 1)  ) {  ?> bg1<?php } else { ?> bg2<?php } ?>">
		<dl class="icon" style="background-image: url(<?php echo $_news_row_val['TOPIC_FOLDER_IMG_SRC']; ?>); background-repeat: no-repeat;">
			<dt style="<?php if ($this->_rootref['S_DISPLAY_NEWS_RVS']) {  ?>width: 44%;<?php } else { ?>width: 60%;<?php } if ($_news_row_val['TOPIC_ICON_IMG']) {  ?>background-image: url(<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_news_row_val['TOPIC_ICON_IMG']; ?>); background-repeat: no-repeat;<?php } ?>" title="<?php echo $_news_row_val['TOPIC_FOLDER_IMG_ALT']; ?>"><?php if ($_news_row_val['S_UNREAD_TOPIC']) {  ?><a href="<?php echo $_news_row_val['U_NEWEST_POST']; ?>"><?php echo (isset($this->_rootref['NEWEST_POST_IMG'])) ? $this->_rootref['NEWEST_POST_IMG'] : ''; ?></a> <?php } if ($_news_row_val['ATTACH_ICON_IMG']) {  echo $_news_row_val['ATTACH_ICON_IMG']; ?> <?php } if ($_news_row_val['S_POLL']) {  ?><strong><?php echo ((isset($this->_rootref['L_VIEW_TOPIC_POLL'])) ? $this->_rootref['L_VIEW_TOPIC_POLL'] : ((isset($user->lang['VIEW_TOPIC_POLL'])) ? $user->lang['VIEW_TOPIC_POLL'] : '{ VIEW_TOPIC_POLL }')); ?></strong><?php } ?><a href="<?php echo $_news_row_val['U_VIEW_COMMENTS']; ?>" title="<?php echo $_news_row_val['TITLE']; ?>" class="topictitle"><?php echo $_news_row_val['TITLE']; ?></a><?php if ($this->_rootref['U_VIEW_UNREAD_POST'] && ! $this->_rootref['S_IS_BOT']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_VIEW_UNREAD_POST'])) ? $this->_rootref['U_VIEW_UNREAD_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_UNREAD_POST'])) ? $this->_rootref['L_VIEW_UNREAD_POST'] : ((isset($user->lang['VIEW_UNREAD_POST'])) ? $user->lang['VIEW_UNREAD_POST'] : '{ VIEW_UNREAD_POST }')); ?></a> &bull; <?php } if ($_news_row_val['PAGINATION']) {  ?><strong class="pagination"><span><?php echo $_news_row_val['PAGINATION']; ?></span></strong><?php } ?>

					<br /><?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?> <?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_news_row_val['POSTER_FULL']; ?> &raquo; <?php echo $_news_row_val['TIME']; ?>

				<?php if ($_news_row_val['FORUM_NAME']) {  ?>

					<br /><?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?>: <a href="<?php echo $_news_row_val['U_VIEWFORUM']; ?>" style="font-weight: bold;"><?php echo $_news_row_val['FORUM_NAME']; ?></a>
				<?php } if (! $this->_rootref['S_DISPLAY_NEWS_RVS']) {  if ($_news_row_val['FORUM_NAME']) {  ?>&bull; <?php } echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?>: <strong><?php echo $_news_row_val['REPLIES']; ?></strong>  &bull; <?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?>: <strong><?php echo $_news_row_val['TOPIC_VIEWS']; ?></strong><?php } ?>

			</dt>
			<?php if ($this->_rootref['S_DISPLAY_NEWS_RVS']) {  ?>

				<dd class="posts" style="width: 11%"><?php echo $_news_row_val['REPLIES']; ?> <dfn><?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?></dfn></dd>
				<dd class="views" style="width: 11%"><?php echo $_news_row_val['TOPIC_VIEWS']; ?> <dfn><?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?></dfn></dd>
			<?php } ?>

			<dd class="lastpost" style="width: 25%"><span><dfn><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></dfn><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_news_row_val['USERNAME_FULL_LAST']; ?> <?php if ($_news_row_val['S_UNREAD_INFO']) {  ?><a href="<?php echo $_news_row_val['U_VIEW_UNREAD']; ?>"><?php echo (isset($this->_rootref['NEWEST_POST_IMG'])) ? $this->_rootref['NEWEST_POST_IMG'] : ''; ?></a><?php } else { ?><a href="<?php echo $_news_row_val['U_LAST_COMMENTS']; ?>"><?php echo (isset($this->_rootref['READ_POST_IMG'])) ? $this->_rootref['READ_POST_IMG'] : ''; ?></a><?php } ?><br />
				<?php echo $_news_row_val['LAST_POST_TIME']; ?></span>
			</dd>
		</dl>
	</li>
<?php if ($_news_row_val['S_LAST_ROW']) {  if ($this->_rootref['NP_PAGINATION'] || $this->_rootref['TOTAL_NEWS']) {  ?>

		<li class="row<?php if (!($_news_row_val['S_ROW_COUNT'] & 1)  ) {  ?> bg2<?php } else { ?> bg1<?php } ?>">
			<div class="topic-actions">
				<div class="pagination">
					<?php echo (isset($this->_rootref['TOTAL_NEWS'])) ? $this->_rootref['TOTAL_NEWS'] : ''; ?>

					<?php if ($this->_rootref['NP_PAGE_NUMBER']) {  if ($this->_rootref['NP_PAGINATION']) {  ?> &bull; <?php echo (isset($this->_rootref['NP_PAGE_NUMBER'])) ? $this->_rootref['NP_PAGE_NUMBER'] : ''; ?> &bull; <span><?php echo (isset($this->_rootref['NP_PAGINATION'])) ? $this->_rootref['NP_PAGINATION'] : ''; ?></span><?php } else { ?> &bull; <?php echo (isset($this->_rootref['NP_PAGE_NUMBER'])) ? $this->_rootref['NP_PAGE_NUMBER'] : ''; } } ?> &nbsp;
				</div>
			</div>
		</li>
    <?php } ?>

	</ul>
<?php echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['C_BLOCK_F_R'] : ''; ?>

<?php } } }} ?>