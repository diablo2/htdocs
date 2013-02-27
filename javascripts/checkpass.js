$(document).ready(function () {
  var validateUsername = $('#validateUsername');
  $('#username').keyup(function () {
    var t = this; 
    if (this.value != this.lastValue) {
      if (this.timer) clearTimeout(this.timer);
      validateUsername.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> checking availability...');
      
      this.timer = setTimeout(function () {
        $.ajax({
          url: 'ajax-validation.php',
          data: 'action=check_username&username=' + t.value,
          dataType: 'json',
          type: 'post',
          success: function (j) {
            validateUsername.html(j.msg);
          }
        });
      }, 200);
      
      this.lastValue = this.value;
    }
  });
});