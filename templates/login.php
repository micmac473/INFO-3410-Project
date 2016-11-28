<?php session_unset() ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>junkTrade Login</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel ="stylesheet" href ="../css/bootstrap-theme.css" >


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
    <link href ="../css/main.css" rel ="stylesheet">

    <!-- google font  -->
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">

    <script src="../bower_components/angular/angular.min.js"></script>
    <script src="../bower_components/angular-route/angular-route.min.js"></script>
    <script src ="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../bower_components/jquery/dist/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="../js/main.js"></script>

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
          <a class ="navbar-brand" href ="../">junkTrade</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
      
            <!--this is not rendering the login page as it shoul -->
            <ul class = "nav navbar-nav navbar-right ">
                <li><a href ="login.php">Login</a></li>
            </ul>
            <ul class = "nav navbar-nav navbar-right ">
                <li><a href ="registration.phtml">Sign up</a></li>
            </ul>
           <!--<ul class="nav navbar-nav navbar-right ">
                <li><button type="button" class="btn btn-primary btn-lg" onclick="window.location='templates/login.html'">login</button></li>
            </ul> -->
         
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
  <div class ="container">
    <h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange">Available Tradeable Items</h2>
    <div class ="row">
      <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" onsubmit="return login();" method ="POST" action="index.php/users">
          <fieldset>
            <!-- Form Name -->
            <legend style="text-align: center">Sign in to JunkTrade</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Email</label>  
              <div class="col-md-4">
              <input name="email" class="form-control input-md" id="email" required="" type="text" placeholder="johnDoe@example.com">
                
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="pass">Password</label>
              <div class="col-md-4">
                <input name="pass" class="form-control input-md" id="pass" required="" type="password" placeholder="password">
                
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="login"></label>
              <div class="col-md-4">
                <button name="saveBnt" class="btn btn-primary btn-block " id="saveBnt" type ="submit">Sign in</button>
                <a href ="#" style ="color: blue; text-decoration: none;">Forgot password?</a>
              </div>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
  </div>
<body>
</html>