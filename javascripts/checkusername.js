<!--
/*
Credits: Bit Repository
Source: http://www.bitrepository.com/web-programming/ajax/username-checker.html 
*/

pic1 = new Image(16, 16); 
pic1.src = "../images/ajax-loader.gif";

$(document).ready(function(){

  $("#username").change(function() { 

    var usr = $("#username").val();

    if(usr.length >= 4 && usr.length <= 12)
      {
        $("#status").html('<img src="../images/ajax-loader.gif" align="absmiddle">&nbsp;Checking availability...');

          $.ajax({  
          type: "POST",  
          url: "action/check.php",  
          data: "username="+ usr,  
          success: function(msg)
            {  
              $("#status").ajaxComplete(function(event, request, settings){ 

                if(msg == 'OK')
                { 
                  $("#username").removeClass('object_error'); // if necessary
                  $("#username").addClass("object_ok");
                  $(this).html('&nbsp;<img src="../images/tick.gif" align="absmiddle">');
                }  
                  else  
                {  
                  $("#username").removeClass('object_ok'); // if necessary
                  $("#username").addClass("object_error");
                  $(this).html(msg);
                }  
                 
              });

             } 
               
              }); 

            }
      else
      {
        $("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
        $("#username").removeClass('object_ok'); // if necessary
        $("#username").addClass("object_error");
      }

  });


  $("#password").change(function() { 

    var pass = $("#password").val();

    if(pass.length >= 6 && pass.length <= 16)
      {
        $("#status_pass").html('<img src="../images/ajax-loader.gif" align="absmiddle">&nbsp;Checking availability...');

          $.ajax({  
          type: "POST",  
          url: "action/checkpass.php",  
          data: "password="+ pass,  
          success: function(msg)
            {  
              $("#status_pass").ajaxComplete(function(event, request, settings){ 

                if(msg == 'OK')
                { 
                  $("#password").removeClass('object_error'); // if necessary
                  $("#password").addClass("object_ok");
                  $(this).html('&nbsp;<img src="../images/tick.gif" align="absmiddle">');
                }  
                  else  
                {  
                  $("#password").removeClass('object_ok'); // if necessary
                  $("#password").addClass("object_error");
                  $(this).html(msg);
                }  
                 
              });

             } 
               
              }); 

            }
      else
      {
        $("#status_pass").html('<font color="red">The password should have at least <strong>6</strong> characters and most 16 characters.</font>');
        $("#password").removeClass('object_ok'); // if necessary
        $("#password").addClass("object_error");
      }

  });
  

});

//-->