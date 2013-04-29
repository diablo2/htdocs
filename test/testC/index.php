<!DOCTYPE html>
<html lang="th"><head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../assets/css/design.css" rel="stylesheet">
	<link rel="stylesheet" href="css/calendar.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>
</head>
<body class="container">
    <?php include('../assets/component/nav-top.php'); ?>   
    <div class="container-fluid contain">
      	<div class="row-fluid header">
		
      	</div>
      	<div class="row-fluid">
        	<div class="span3">
        		<?php include '../assets/component/nav-side.php'; ?>
        	</div><!--/span-->

			<div class="span8 well">
				<div class="row-fluid">
					<div class="page-header">
						<div class="pull-right">
							<div class="btn-group">
								<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
								<button class="btn" data-calendar-nav="today">Today</button>
								<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
							</div>
							<div class="btn-group">
								<button class="btn btn-warning" data-calendar-view="year">Year</button>
								<button class="btn btn-warning active" data-calendar-view="month">Month</button>
								<button class="btn btn-warning" data-calendar-view="week">Week</button>
								<button class="btn btn-warning" data-calendar-view="day">Day</button>
							</div>
						</div>
						<h3></h3>
					</div>
				</div>
				<div class="row-fluid">
					<div id="calendar"></div>
				</div>
			</div>
		</div>

	<div class="clearfix"></div>
	<br><br>
	<div id="disqus_thread"></div>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


	<script type="text/javascript" src="components/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="components/underscore/underscore-min.js"></script>
	<script type="text/javascript" src="components/bootstrap/docs/assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/language/en-GB.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/app.js"></script>

	<script type="text/javascript">
		var disqus_shortname = 'bootstrapcalendar'; // required: replace example with your forum shortname
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
</div>
</body>
</html>