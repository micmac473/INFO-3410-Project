<?php
include "base.php";
?>
  <div class="container-fluid">
    <div class="text-center">
        <h2>Homepage</h2>
        <p>This is the homepage. The listing of all items will be shown here</p>
    </div>
  </div>
  <div class="row">
  <div class="col-md-8 col-md-offset-2 table-responsive">
    <h4>Products</h4>
    <p>A table highlighting the available products</p>
    <div id="table_sec"></div>
  </div>
</div>
  <script type="text/template" id="table_heading">
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Picture</th><th>Uploaded</th><th>Description</th><th>Trader</th><th>Operations</th>
    </tr>
    </thead>
    <tbody>
</script>

      
 