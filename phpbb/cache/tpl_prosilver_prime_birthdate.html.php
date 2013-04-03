<?php if (!defined('IN_PHPBB')) exit; if ($this->_rootref['S_BIRTHDAYS_UCP_PROFILE']) {  ?>


		<dl>
			<dt><label for="bday_day"><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_NAME'])) ? $this->_rootref['L_PRIME_BIRTHDATE_NAME'] : ((isset($user->lang['PRIME_BIRTHDATE_NAME'])) ? $user->lang['PRIME_BIRTHDATE_NAME'] : '{ PRIME_BIRTHDATE_NAME }')); ?>:<?php if ($this->_rootref['S_BIRTHDAYS_REQUIRED']) {  ?> *<?php } ?></label><br /><span><?php echo ((isset($this->_rootref['L_BIRTHDAY_EXPLAIN'])) ? $this->_rootref['L_BIRTHDAY_EXPLAIN'] : ((isset($user->lang['BIRTHDAY_EXPLAIN'])) ? $user->lang['BIRTHDAY_EXPLAIN'] : '{ BIRTHDAY_EXPLAIN }')); ?></span></dt>
			<dd>
				<select<?php if ($this->_rootref['S_BIRTHDAYS_LOCKED']) {  ?> disabled="disabled"<?php } ?> name="bday_month" id="bday_month"><?php echo (isset($this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'] : ''; ?></select>
				<select<?php if ($this->_rootref['S_BIRTHDAYS_LOCKED']) {  ?> disabled="disabled"<?php } ?> name="bday_day" id="bday_day"><?php echo (isset($this->_rootref['S_BIRTHDAY_DAY_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_DAY_OPTIONS'] : ''; ?></select>
				<select<?php if ($this->_rootref['S_BIRTHDAYS_LOCKED']) {  ?> disabled="disabled"<?php } ?> name="bday_year" id="bday_year"><?php echo (isset($this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'] : ''; ?></select>
			</dd>
		</dl>
		<dl>
			<dt><label for="show_age1"><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_SHOW_AGE'])) ? $this->_rootref['L_PRIME_BIRTHDATE_SHOW_AGE'] : ((isset($user->lang['PRIME_BIRTHDATE_SHOW_AGE'])) ? $user->lang['PRIME_BIRTHDATE_SHOW_AGE'] : '{ PRIME_BIRTHDATE_SHOW_AGE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'])) ? $this->_rootref['L_PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'] : ((isset($user->lang['PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'])) ? $user->lang['PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'] : '{ PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN }')); ?></span></dt>
			<dd>
				<label for="show_age1"><input type="radio" name="show_age" id="show_age1" value="1"<?php if ($this->_rootref['S_SHOW_AGE']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label> 
				<label for="show_age0"><input type="radio" name="show_age" id="show_age0" value="0"<?php if (! $this->_rootref['S_SHOW_AGE']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label>
			</dd>
		</dl>
		<?php if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST']) {  ?>

		<dl>
			<dt><label for="congrats1"><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_CONGRATS'])) ? $this->_rootref['L_PRIME_BIRTHDATE_CONGRATS'] : ((isset($user->lang['PRIME_BIRTHDATE_CONGRATS'])) ? $user->lang['PRIME_BIRTHDATE_CONGRATS'] : '{ PRIME_BIRTHDATE_CONGRATS }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_CONGRATS_EXPLAIN'])) ? $this->_rootref['L_PRIME_BIRTHDATE_CONGRATS_EXPLAIN'] : ((isset($user->lang['PRIME_BIRTHDATE_CONGRATS_EXPLAIN'])) ? $user->lang['PRIME_BIRTHDATE_CONGRATS_EXPLAIN'] : '{ PRIME_BIRTHDATE_CONGRATS_EXPLAIN }')); ?></span></dt>
			<dd>
				<label for="congrats1"><input type="radio" name="congrats" id="congrats1" value="1"<?php if ($this->_rootref['S_SHOW_CONGRATS']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></label> 
				<label for="congrats0"><input type="radio" name="congrats" id="congrats0" value="0"<?php if (! $this->_rootref['S_SHOW_CONGRATS']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></label>
			</dd>
		</dl>
		<?php } } else if ($this->_rootref['S_BIRTHDAYS_ENABLED'] === ('UCP_AGREEMENT')) {  if ($this->_rootref['ERROR']) {  ?><p class="error"><?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?></p><?php } ?>


	<b class="genmed"><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_ENTER'])) ? $this->_rootref['L_PRIME_BIRTHDATE_ENTER'] : ((isset($user->lang['PRIME_BIRTHDATE_ENTER'])) ? $user->lang['PRIME_BIRTHDATE_ENTER'] : '{ PRIME_BIRTHDATE_ENTER }')); ?>:</b>
	<div style="margin-top:4px;margin-bottom:1em;">
		<select name="bday_month"><?php echo (isset($this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'] : ''; ?></select>
		<select name="bday_day"><?php echo (isset($this->_rootref['S_BIRTHDAY_DAY_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_DAY_OPTIONS'] : ''; ?></select>
		<select name="bday_year"><?php echo (isset($this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'] : ''; ?></select>
	</div>

<?php } else if ($this->_rootref['S_BIRTHDAYS_ENABLED'] === ('UCP_REGISTER')) {  ?>


	<dl>
		<dt><label><?php echo ((isset($this->_rootref['L_PRIME_BIRTHDATE_NAME'])) ? $this->_rootref['L_PRIME_BIRTHDATE_NAME'] : ((isset($user->lang['PRIME_BIRTHDATE_NAME'])) ? $user->lang['PRIME_BIRTHDATE_NAME'] : '{ PRIME_BIRTHDATE_NAME }')); ?>:<?php if ($this->_rootref['S_BIRTHDAYS_REQUIRED']) {  ?> *<?php } ?></label></dt>
		<dd><select name="bday_month" onchange="if(check_coppa) check_coppa();"><?php echo (isset($this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_MONTH_OPTIONS'] : ''; ?></select>
			<select name="bday_day" onchange="if(check_coppa) check_coppa();"><?php echo (isset($this->_rootref['S_BIRTHDAY_DAY_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_DAY_OPTIONS'] : ''; ?></select>
			<select name="bday_year" onchange="if(check_coppa) check_coppa();"><?php echo (isset($this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'])) ? $this->_rootref['S_BIRTHDAY_YEAR_OPTIONS'] : ''; ?></select>
<script type="text/javascript">
// <![CDATA[
	/**
	* Show/Hide COPPA
	*/
	function get_age(dd, mm, yy) 
	{
		var bdate = new Array(parseInt(dd), parseInt(mm), parseInt(yy));
		var now   = new Date();			// get current date
		var age   = parseInt(now.getFullYear()) - bdate[2];
		if ((bdate[1] > now.getMonth() + 1) || (bdate[1] == now.getMonth() + 1 && now.getDate() < bdate[0]))
		{
			age -= 1;
		}
		return age;
	}
	
	function check_coppa() 
	{
		if (!document.forms || !document.forms['register']) 
		{
			return;
		}
		var day   = document.forms['register'].bday_day.value   || 0;
		var month = document.forms['register'].bday_month.value || 0;
		var year  = document.forms['register'].bday_year.value  || 0;
		if (month > 0 && day > 0 && year > 0) 
		{
			var obj = document.getElementById("coppa_area");
			var coppa = get_age(day, month, year) < <?php echo (isset($this->_rootref['COPPA_AGE_CUTOFF'])) ? $this->_rootref['COPPA_AGE_CUTOFF'] : ''; ?> ? true : false;
			if (document.forms['register'].coppa)
			{
				document.forms['register'].coppa.value = coppa ? 1 : 0;
			}
			if (obj && obj.style)
			{
				obj.style.display = coppa ? "" : "none";
			}
		}
	}
// ]]>
</script>
		</dd>
	</dl>

<?php } ?>