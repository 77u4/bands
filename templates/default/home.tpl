<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jannis Hutt">

    <title>{{ title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="themes/default/css/bootstrap.css" rel="stylesheet">
    <!-- Font awesome -->
    <link href="themes/default/css/font-awesome.min.css" rel="stylesheet">
    <!-- Spezialstyledings -->
    <link href="themes/default/css/cover.css" rel="stylesheet">
    <!-- JS und so. ~ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="themes/default/js/bootstrap.min.js"></script>
    <!-- HTML5ify oder so. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	
	<div id="image"></div>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Bands</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="">Home</a></li>
                <li><a href="">Features</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">heading</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p class="lead">
              <a href="#" id="authenticate-button" class="btn btn-lg btn-outline" style="border: 1px; border-style: solid;"><span class="fa fa-twitter"></span> Sign in with Twitter</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Copyright &copy; {{ copyrightDate }} <a href="http://jannishutt.de/">Jannis Hutt</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>
  </body>
</html>