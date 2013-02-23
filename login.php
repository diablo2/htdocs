<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Foundation</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">
  <link rel="stylesheet" href="stylesheets/design.css">
  <script src="javascripts/modernizr.foundation.js"></script>
</head>
<body>
  <div class="content">
    <div class="row">
      <div class="six columns offset-by-six">
        <div class="form_login">

            <form>
              <div class="row">
                <div class="four columns offset-by-one">
                  <h3>Login</h3>
                </div>
              </div>
              <div class="row">
                <div class="three columns">
                  <label class="right inline"> Username : </label>
                </div>
                <div class="nine columns">
                  <input type="text" placeholder="Username" class="ten"/>
                </div>
              </div>
                  
              <div class="row">
                <div class="three columns">
                  <label class="right inline">Password : </label>
                </div>
                <div class="nine columns">
                  <input type="password" placeholder="Password" class="ten">
                </div>
              </div>
              <div class="row">
                <div class="four columns centered">
                  <input type="submit" class="small secondary button" value="Login">
                  <input type="reset" class="small secondary button" value="Cancel">
                </div>
              </div>
            </form>

        </div>

      </div>

    </div>

  </div>

</body>
</html>