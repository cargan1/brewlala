<?php

if( ! empty($breweries) ) {
  $i = 0;
  foreach( $breweries as $location ):
    
    if( empty( $location->latitude ) || empty( $location->longitude ) ) continue;
    
    ?>
    <div class="card brewery-card" id="brewery-<?= $i; ?>" data-position="<?= $i; ?>">
      <div class="card-section">
        <h6><?= ucwords( $location->brewery_type ); ?></h6>
        <h5><?= $location->name; ?></h5>
        <p><?= number_format($location->distance, 2); ?> mi - <?= $location->city; ?></p>
        <?php
          if( $lat && $lng ){
            echo '<a class="button" target="_blank" href="https://www.google.com/maps/dir/'.$lat.','.$lng.'/'.$location->latitude.', '.$location->longitude.'">Get Directions</a>';
          }
        ?>
      </div>
    </div>

    <?php 

    $i++; 
  endforeach; 
} else {
  wp_send_json_error( ['html' => '<strong>No Results Found</strong>'] );
}
?>
