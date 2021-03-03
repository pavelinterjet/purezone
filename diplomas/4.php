<div class="car_dip">
    <?php 
    $path    = 'R2007HEX001-1_ENPurezone';
    $files = scandir($path);
    $path_to_img = 'diplomas';

    $files = array_diff(scandir($path), array('.', '..'));
    foreach( $files as $file ) {
    ?>
        <div class="dip_item">
            <img src="<?php echo $path_to_img.'/'.$path.'/'.$file; ?>" alt="">
        </div>
    <?php } ?>
</div>