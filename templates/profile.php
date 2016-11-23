<?php
incude "lib.php";
 $userItems =getUserItems();
 echo json_encode($userItems);



?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>junkTrade</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel ="stylesheet" href ="css/bootstrap-theme.css" >


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">
    <link href ="css/main.css" rel ="stylesheet">
    <style>
      .main{
        background-color: lightblue;
      }
    </style>

    <!-- google font, note an stra font heree!!!!!  -->
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
   
    <script src = "js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body ng-app="myApp">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img alt ="logo" width ="30px" height ="30px" src =img/logo.png></a>
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
        <h1 style="color:#096790 ;text-shadow: 4px 4px orange;font-family: 'Bowlby One SC', cursive;">Hi [User Name]</h1>



      </div>
    </div>

<div class ="container controls">
<div class ="row">
<div class ="col-md-12">
    <button type="button"onclick ="addItem();" class="btn btn-info"><a href="views/addItem.html"></a>Add Item
    </button>
    <button type="button" class="btn btn-info"><a href="views/addItem.html"></a>Find Item
    </button>
</div>
</div>
</div>
<div class ="container main">
<div class ="row">
<div class ="col-md-12">
  <!-- this is a table which will list the pictures of the items which the user has uploaded, only the headings will be here-->
<h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange"> Here is all the junk you uploaded for trading </h2>
<div id ="userTable">
<!--
<table class="table table-hover">
  <thead>
    <tr>
      <th>Item #</th>
      <th>Date Uploaded</th>
      <th>Item Description</th>
      <th>Uploaded Picture</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
     <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
     </td>

    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
-->
</div>

</div>
</div>
</div>
    <!--there should be a footer here -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="js/ie10-viewport-bug-workaround.js"></script> -->

<script src="js/jquery/dist/jquery.js"></script>
<script src="js/angular/angular.min.js"></script>
<script src="js/angular-route/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="js/main.js"></script>
<script type="text/template" id="User_table_heading">
  <table class="table table-bordered">
    <thead>
    <thead>
    <tr>
      <th>Item #</th>
      <th>Date Uploaded</th>
      <th>Item Description</th>
      <th>Uploaded Picture</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody>
</script>

</body>

</html>