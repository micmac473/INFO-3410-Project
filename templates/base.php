<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>junkTrade Login</title>
    
    <!-- Bootstrap core CSS -->
    <!-- <link href="../css/bootstrap.css" rel="stylesheet"> -->
    <!-- <link rel ="stylesheet" href ="../css/bootstrap-theme.css" > -->
    <!-- <link href ="../css/main.css" rel ="stylesheet"> -->
    <!--<script src="../bower_components/jquery/dist/jquery.js"></script> -->

    <!-- google font  -->
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">

    <!-- Latest compiled and minified CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">

   

</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img alt ="logo" width ="30px" height ="30px" src ="../img/logo.png"></a>
          <a class ="navbar-brand" href ="#">junkTrade</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Electronics</a></li>
              <li><a href="#">Furniture</a></li>
              <li><a href="#">Books & Magazines</a></li>
              <li><a href="#">Clothes</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="form">
            <div class="form-group">
              <input type="text" placeholder="search for junk" class="form-control">
            </div>
            <!--change to icon-->
            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
          
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">My Profile</a></li>
              <li><a href="#">Log Out</a></li>
              <li><a href="#">Help</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Dynamically Populated Requets</a></li>
          </ul>
        </li>
      </ul>
      </div><!--/.navbar-collapse -->
    </div>
    </nav>
        <div class="jumbotron">
      <div class="container">
        <h1 style="color:#096790 ;text-shadow: 4px 4px orange;font-family: 'Bowlby One SC', cursive;">Greeting based on time of day.</h1>
        <h2 style="color:orange ;text-shadow: 4px 4px #096790;font-family: 'Bowlby One SC', cursive;"> Your junk can become someone's Treasure </h2></br>
            <p><button type="button" class="btn btn-primary btn-lg"><a href="homepage.phtml"></a>Upload Item
            </button></p>
      </div>
    </div>
    <!--there should be a footer here -->
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="js/ie10-viewport-bug-workaround.js"></script> -->
 <!-- AngularJS JavaScript file  -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <!-- AngularJS Route module -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="../js/main.js"></script>


</body>

</html>