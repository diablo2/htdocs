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
  <!-- Header and Nav -->
  
  <div class="row">
    <div class="three columns">
      <h1><img src="http://placehold.it/400x100&text=Logo" /></h1>
    </div>
    <div class="nine columns">
      <ul class="link-list right">
        <li><a href="#">Section 1</a></li>
        <li><a href="#">Section 2</a></li>
        <li><a href="#">Section 3</a></li>
        <li><a href="#">Section 4</a></li>
      </ul>
    </div>
  </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row">    
    
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="nine columns push-three">
      <div id="featured">
          <img src="../images/slide/1.jpg" />
          <img src="../images/slide/2.jpg" />
          <img src="../images/slide/3.jpg" />
      </div>

<!-- Public Relations -->

      <div id="PublicRelations">
        <div class="detailPR" class="twelve columns">
          <?php
            for($i=1;$i<5;$i++)
              echo '<div class="detail">fffff</div>';
          ?>   
        </div>
        <div class="detailActivity">
        </div>
      </div>


<!-- Activity -->     
      <div id="Activity">

          <?php
            $g = "GGGGGGGGGGGG";
              echo $g;
          ?>
      </div>


    </div>
    
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="three columns pull-nine">
        
      <ul class="side-nav">
        <li><a href="#">Section 1</a></li>
        <li><a href="#">Section 2</a></li>
        <li><a href="#">Section 3</a></li>
        <li><a href="#">Section 4</a></li>
        <li><a href="#">Section 5</a></li>
        <li><a href="#">Section 6</a></li>
      </ul>
      
      <p><img src="http://placehold.it/320x240&text=Ad" /></p>
        
    </div>
    
  </div>
    
  
  <!-- Footer -->
  
  <footer class="row">
    <div class="twelve columns">
      <hr />
      <div class="row">
        <div class="six columns">
          <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
        <div class="six columns">
          <ul class="link-list right">
            <li><a href="#">Section 1</a></li>
            <li><a href="#">Section 2</a></li>
            <li><a href="#">Section 3</a></li>
            <li><a href="#">Section 4</a></li>
          </ul>
        </div>
      </div>
    </div> 
  </footer>

  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>  
  
    <!-- Java Script -->
  <script type="text/javascript">
   $(window).load(function() {
       $("#featured").orbit();
   });
  </script>
  </body>

</html>