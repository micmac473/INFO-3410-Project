<?php
include "../lib.php";
include "base.php";

/*$useriD = 1;
$userItems =getUserItems($useriD);
json_encode($userItems); */

?>
<div class ="container-fluid">
  <div class ="row">
    <div class ="col-md-8 col-md-offset-2">
      <button type="button" onclick ="showForm();" class="btn btn-info">Add Item</button>
      <button type="button" class="btn btn-info"><a href="views/addItem.html"></a>Find Item</button>
    </div>
  </div>

  <!-- Add Item -->
  <div class ="row" style ="display:none;" id ="uploadItem">
    <div class ="col-md-8 col-md-offset-2">
      <form class="form-horizontal" action ="index.php/additem" method ="POST" onsubmit="return addItem();">
        <fieldset>
          <legend style="text-align:center">Upload a New Item</legend>
            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="uppic">Choose an Image </label>
              <div class="col-md-4">
                <input name="image" class="input-file" id="image" type="file" required="">
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="ItemDescription">Add a description</label>
              <div class="col-md-4">                     
                <textarea name="itemdescription" class="form-control" id="itemdescription" placeholder="Tell us about your item" required=""></textarea>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="upload"></label>
              <div class="col-md-4">
                <button type ="submit" name="upload" class="btn btn-success" id="upload">Add</button>
                  <button type="button"onclick ="hideForm();" class="btn btn-warning" ></a>Cancel
                </button>
              </div>
            </div>

          </fieldset>
        </form>
    </div>
  </div>

  <!-- this is a table which will list the pictures of the items which the user has uploaded, only the headings will be here-->

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
    <div class="col-md-7 table-responsive">
      <h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange">My Junk</h2>
    <!--<h4>Products</h4>
    <p>A table highlighting the available products</p> -->
      <div id="table_secp"></div>
    </div>

    <div class ="col-md-5 table-responsive">
      <h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange">Requests</h2>
    <!--<h4>Products</h4>
    <p>A table highlighting the available products</p> -->
      <div id="table_secr"></div>
    </div>
  </div>

</div>  <!-- close container -->  
<script type="text/template" id="table_headingp">
  <table class="table table-hover">
    <thead>
    <tr>
      <th></th><th>Description</th><th>Options</th><th>Date Uploaded</th>
    </tr>
    </thead>
    <tbody>
</script>

<script type="text/template" id="table_headingr">
  <table class="table table-hover">
    <thead>
    <tr>
      <th>Requested By</th><th>Item</th><th>Suggested Item</th><th>Decision</th>
    </tr>
    </thead>
    <tbody>
</script>
