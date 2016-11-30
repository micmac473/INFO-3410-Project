<?php
include "base.php";
?>
<div class="container">
  <div class="text-center">
    <h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange">Available Tradeable Items</h2>
  </div>
  
  <div class="row">
    <div class="col-md-10 col-md-offset-1 table-responsive">
      <div id="table_sech"></div>
    </div>
  </div>
</div>
<script type="text/template" id="table_headingh">
  <table class="table table-hover table-condensed">
    <thead class="thead-inverse">
      <tr>
        <th>Image</th><th>Name</th><th>Description</th><th>Trader</th><th>Trade</th><th>Uploaded</th>
      </tr>
    </thead>
    <tbody>
</script>

<!-- Modal -->
  <div class="modal fade" id="requestModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form class="form-horizontal" onsubmit="return sendRequest();">
            <fieldset>

            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Item Owner</label>
              <div class="col-md-8">
                <input id="requestee" name="requestee" type="text" disabled placeholder="Item Owner" class="form-control input-md" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="name">Item</label>
              <div class="col-md-8">
                <input id="requesteditem" name="requesteditem" type="text" disabled placeholder="Requested Item" class="form-control input-md" required="">
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">Select Your Item</label>
              <div class="col-md-8">
                <select id="myitems" name="myitems" class="form-control">
                  <option value="0">Select Item</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-2">
                <button  name = "views" class="btn btn-success" type="submit">Send</button>
                <button  class="btn btn-danger" data-dismiss="modal">Cancel</button>
<?php
function getDBConnection(){
  try{ 
    //$db = new mysqli("138.197.20.97","peertrading","k$3eYUdUz_Th","peertrading");
    $db = new mysqli("localhost","root","","junktrade");
    if ($db == null && $db->connect_errno > 0)return null;
    return $db;
  }catch(Exception $e){ } 
  return null;
}


  $itemid = 29;

if($_GET){

    if(isset($_GET['views'])){
        productViews($itemid);
    }
}

function productViews($item){
    $sql = "UPDATE `items` SET `views` = views+1 WHERE `items`.`itemid` = $item";
  try{
    $db = getDBConnection();
    if ($db != NULL){
      $db->query($sql);
    }
  }catch (Exception $e){}
  return FALSE;
}

?>
              </div>
            </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

      
 