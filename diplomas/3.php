<<<<<<< HEAD
<div class="car_dip">
    <?php 
    $path    = 'Press-Release-HEXIS-PureZone-July2020-EN';
    $files = scandir($path);
    $path_to_img = 'diplomas';

    $files = array_diff(scandir($path), array('.', '..'));
    foreach( $files as $file ) {
    ?>
        <div class="dip_item">
            <img src="<?php echo $path_to_img.'/'.$path.'/'.$file; ?>" alt="">
        </div>
    <?php } ?>
=======
<div class="car_dip">
    <?php 
    $path    = 'Press-Release-HEXIS-PureZone-July2020-EN';
    $files = scandir($path);
    $path_to_img = 'diplomas';

    $files = array_diff(scandir($path), array('.', '..'));
    foreach( $files as $file ) {
    ?>
        <div class="dip_item">
            <img src="<?php echo $path_to_img.'/'.$path.'/'.$file; ?>" alt="">
        </div>
    <?php } ?>
>>>>>>> refs/remotes/purezone/master
</div>