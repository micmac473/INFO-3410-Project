<?php
include "../lib.php";
include "base.php";

$useriD = 1;
$userItems =getUserItems($useriD);
json_encode($userItems);

?>
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
<!--
<script src="js/jquery/dist/jquery.js"></script>
<script src="js/angular/angular.min.js"></script>
<script src="js/angular-route/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="js/main.js"></script> -->
<div class="row">
  <div class="col-md-8 col-md-offset-2 table-responsive">
    <h4>Products</h4>
    <p>A table highlighting the available products</p>
    <div id="table_secp"></div>
  </div>
</div>
  <script type="text/template" id="table_headingp">
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Picture</th><th>Uploaded</th><th>Description</th><th>Operations</th>
    </tr>
    </thead>
    <tbody>
</script>

</body>

</html>