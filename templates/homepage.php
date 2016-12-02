<?php
include "base.php";
?>

    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    
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
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">Request Details</h4>
        </div>
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
                <select id="myitems" name="myitems" class="form-control" required="">
                  
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-2">
                <button  class="btn btn-success" type="submit">Send</button>
                <button  class="btn btn-danger" data-dismiss="modal">Cancel</button>

              </div>
            </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

      
 