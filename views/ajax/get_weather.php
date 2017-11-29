<div class="container" id="wo">
  <h4><?php echo date('F j, Y',strtotime($response->date)); ?></h4>
  <h4 style="margin-left: 15px;">Today's High: <?php echo $response->high; ?><sup>&deg;</sup> F</h4>
  <h4 style="margin-left: 15px;">Today's Low: <?php echo $response->low; ?><sup>&deg;</sup> F</h4>
</div>