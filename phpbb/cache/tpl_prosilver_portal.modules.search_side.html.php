<?php if (!defined('IN_PHPBB')) exit; ?><script type="text/javascript">
<!--

function qsearch_onSubmit()
{
	qs_enginename = document.getElementById('qsearch_select').value;
	qs_keywords = document.getElementById('searchfield').value;
	switch( qs_enginename )
	{
	case 'site':
		break;
	case 'author':
		window.open('search.php?author=' + qs_keywords, '_self', '');
		return false;
	case 'wikipedia':
		window.open('http://en.wikipedia.org/wiki/Spezial:Search?search=' + qs_keywords, '_wikipedia', '');
		return false;
	case 'google':
		window.open('http://www.google.com/search?q=' + qs_keywords, '_google', '');
		return false;
	case 'yahoo':
		window.open('http://search.yahoo.com/search?p=' + qs_keywords, '_yahoo', '');
		return false;	
	case 'bing':
		window.open('http://www.bing.com/search?q=' + qs_keywords, '_bing', '');
		return false;
	case 'altavista':
		window.open('http://www.altavista.com/web/results?itag=ody&q=' + qs_keywords + '&kgs=0&kls=0', '_altavista', '');
		return false;
	case 'lycos':
		window.open('http://search.lycos.com/?query=' + qs_keywords, '_lycos', '');
		return false;
	case 'odp':
		window.open('http://search.dmoz.org/cgi-bin/search?search=' + qs_keywords, '_odp', '');
		return false;
	default:
		if( (i = qsearch_findEngine(qs_enginename)) >= 0 )
		{
			window.open(qsearch_engines[i].url + qs_keywords, '_blank', '');
			return false;
		}
		break;
	}
	return true;
}
//-->
</script>

<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_L'] : ''; if ($this->_tpldata['DEFINE']['.']['S_BLOCK_ICON']) {  ?><img src="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_SRC'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_SRC'] : ''; ?>" width="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_WIDTH'] : ''; ?>" height="<?php echo (isset($this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'])) ? $this->_tpldata['DEFINE']['.']['IMAGE_HEIGHT'] : ''; ?>" alt="" />&nbsp;<?php } echo (isset($this->_tpldata['DEFINE']['.']['TITLE'])) ? $this->_tpldata['DEFINE']['.']['TITLE'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_H_R'] : ''; ?>

	<form id="qsearch_form" method="post" action="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>" onsubmit="return qsearch_onSubmit();">
	<p>
		<input type="text" tabindex="6" name="keywords" id="searchfield" size="autowidth" maxlength="40" title="<?php echo ((isset($this->_rootref['L_SEARCH_KEYWORDS'])) ? $this->_rootref['L_SEARCH_KEYWORDS'] : ((isset($user->lang['SEARCH_KEYWORDS'])) ? $user->lang['SEARCH_KEYWORDS'] : '{ SEARCH_KEYWORDS }')); ?>" class="inputbox search" value="<?php if ($this->_rootref['SEARCH_WORDS']) {  echo (isset($this->_rootref['SEARCH_WORDS'])) ? $this->_rootref['SEARCH_WORDS'] : ''; } else { echo ((isset($this->_rootref['L_SEARCH_MINI'])) ? $this->_rootref['L_SEARCH_MINI'] : ((isset($user->lang['SEARCH_MINI'])) ? $user->lang['SEARCH_MINI'] : '{ SEARCH_MINI }')); } ?>" onclick="if(this.value=='<?php echo ((isset($this->_rootref['LA_SEARCH_MINI'])) ? $this->_rootref['LA_SEARCH_MINI'] : ((isset($this->_rootref['L_SEARCH_MINI'])) ? addslashes($this->_rootref['L_SEARCH_MINI']) : ((isset($user->lang['SEARCH_MINI'])) ? addslashes($user->lang['SEARCH_MINI']) : '{ SEARCH_MINI }'))); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo ((isset($this->_rootref['LA_SEARCH_MINI'])) ? $this->_rootref['LA_SEARCH_MINI'] : ((isset($this->_rootref['L_SEARCH_MINI'])) ? addslashes($this->_rootref['L_SEARCH_MINI']) : ((isset($user->lang['SEARCH_MINI'])) ? addslashes($user->lang['SEARCH_MINI']) : '{ SEARCH_MINI }'))); ?>';" />
	</p>
	<p>
	<select id="qsearch_select" tabindex="7">
		<optgroup label="<?php echo ((isset($this->_rootref['L_PORTAL_SEARCH_SITE'])) ? $this->_rootref['L_PORTAL_SEARCH_SITE'] : ((isset($user->lang['PORTAL_SEARCH_SITE'])) ? $user->lang['PORTAL_SEARCH_SITE'] : '{ PORTAL_SEARCH_SITE }')); ?>">
			<option value="site"><?php echo ((isset($this->_rootref['L_PORTAL_SEARCH_POSTS'])) ? $this->_rootref['L_PORTAL_SEARCH_POSTS'] : ((isset($user->lang['PORTAL_SEARCH_POSTS'])) ? $user->lang['PORTAL_SEARCH_POSTS'] : '{ PORTAL_SEARCH_POSTS }')); ?></option>
			<option value="author"><?php echo ((isset($this->_rootref['L_PORTAL_SEARCH_AUTHOR'])) ? $this->_rootref['L_PORTAL_SEARCH_AUTHOR'] : ((isset($user->lang['PORTAL_SEARCH_AUTHOR'])) ? $user->lang['PORTAL_SEARCH_AUTHOR'] : '{ PORTAL_SEARCH_AUTHOR }')); ?></option>
		</optgroup>
		<optgroup label="<?php echo ((isset($this->_rootref['L_PORTAL_SEARCH_ENGINE'])) ? $this->_rootref['L_PORTAL_SEARCH_ENGINE'] : ((isset($user->lang['PORTAL_SEARCH_ENGINE'])) ? $user->lang['PORTAL_SEARCH_ENGINE'] : '{ PORTAL_SEARCH_ENGINE }')); ?>">
			<option value="wikipedia">Wikipedia</option>
			<option value="google">Google</option>
			<option value="yahoo">Yahoo</option>
			<option value="bing">Bing</option>
			<option value="altavista">Altavista</option>
			<option value="lycos">Lycos</option>
			<option value="odp">Open directory</option>
		</optgroup>
	</select>
	<input type="hidden" name="search_fields" value="all" />
	<input type="hidden" name="show_results" value="topics" />
	<input type="submit" value="<?php echo ((isset($this->_rootref['L_PORTAL_SEARCH_GO'])) ? $this->_rootref['L_PORTAL_SEARCH_GO'] : ((isset($user->lang['PORTAL_SEARCH_GO'])) ? $user->lang['PORTAL_SEARCH_GO'] : '{ PORTAL_SEARCH_GO }')); ?>" class="button2" tabindex="8" />
	</p>
	</form>
	<p><a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PORTAL_SEARCH_ADV'])) ? $this->_rootref['L_PORTAL_SEARCH_ADV'] : ((isset($user->lang['PORTAL_SEARCH_ADV'])) ? $user->lang['PORTAL_SEARCH_ADV'] : '{ PORTAL_SEARCH_ADV }')); ?></a></p>
<?php echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_L'] : ''; echo (isset($this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'])) ? $this->_tpldata['DEFINE']['.']['LR_BLOCK_F_R'] : ''; ?>