<?php
include "../lib.php";
include "base.php";
?>
<div class ="container-fluid">

  <div class="row">
    <div class="col-md-8 col-md-offset-2 table-responsive">
      <h2 style="text-align: center; font-family: 'Acme', sans-serif; color:orange">My Requests</h2>
    <!--<h4>Products</h4>
    <p>A table highlighting the available products</p> -->
      <div id="table_secp"></div>
    </div>

  </div>

</div>  <!-- close container -->  
<script type="text/template" id="table_headingp">
  <table class="table table-hover table-condensed">
    <thead>
    <tr>
      <th>To</th>
      <th>For</th>
      <th>Date Requested</th>
      <th>Status</th>
    </tr>
    </thead>
    <tbody>
</script>

