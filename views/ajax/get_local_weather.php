<div style="padding-left: 15px; margin-left: 15px; background-color: #AD1D28; border: 1px solid #000; color: #FFF;">
  <h4><?php echo date('F j, Y',strtotime($response->date)).' - '.$response->zip; ?></h4>
  <hr style="width: 70%">
  <h4 style="margin-left: 15px;">Today's High: <?php echo $response->high; ?><sup>&deg;</sup> F</h4>
  <h4 style="margin-left: 15px;">Today's Low: <?php echo $response->low; ?><sup>&deg;</sup> F</h4>
</div>