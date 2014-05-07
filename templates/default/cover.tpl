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

			{{ pageContent }}

        </div>
        
      </div>

    </div>
  </body>
</html>