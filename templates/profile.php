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
<!--data-toggle="modal" data-target="#addItemModal" -->
    <button type="button"onclick ="showForm();" class="btn btn-info" ></a>Add Item
    </button>
    <button type="button" class="btn btn-info"><a href="views/addItem.html"></a>Find Item
    </button>
</div>
</div>
</div>

<div class ="container main">
<div class ="row">
<div class ="col-md-12">
<div style ="display:none;" id ="uploadItem">

<form class="form-horizontal" action ="" method ="POST">





<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="uppic">Choose an Image </label>
  <div class="col-md-4">
    <input name="uppic" class="input-file" id="uppic" type="file">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ItemDescription">Add a description</label>
  <div class="col-md-4">                     
    <textarea name="ItemDescription" class="form-control" id="ItemDescription">Tell us about your junk</textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="upload"></label>
  <div class="col-md-4">
    <button type ="submit" name="upload" class="btn btn-success" id="upload">Add</button>
  </div>
</div>


</form>

</div>
  <!-- this is a table which will list the pictures of the items which the user has uploaded, only the headings will be here-->
<h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange"> Here is all the junk you uploaded for trading </h2>
<div id ="userTable">

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