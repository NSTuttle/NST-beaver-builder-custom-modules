<?php
/**
 * Created by PhpStorm.
 * User: nicktuttle
 * Date: 12/20/2016
 * Time: 11:49 AM
 */
?>

<?php if($settings->link_box_img2_src != '') { ?>
.fl-node-<?php echo $id; ?> .nst-link-box-img{
    background: url("<?php echo $settings->link_box_img2_src?>") center no-repeat;
    background-size: cover;
    overflow: hidden;
}
<?php } ?>

<?php if($settings->title_align_toggle == 'right') { ?>
.fl-node-<?php echo $id; ?> .nst-link-box-title{
    text-align: right;
}

<?php } elseif(($settings->title_align_toggle == 'center')) { ?>
.fl-node-<?php echo $id; ?> .nst-link-box-title{
    text-align: center;
}
<?php } ?>

<?php if($settings->title_divider_toggle == 'false'){ ?>
.fl-node-<?php echo $id; ?> .nst-link-box-title{
    padding-bottom: 27px;
}
<?php } ?>
