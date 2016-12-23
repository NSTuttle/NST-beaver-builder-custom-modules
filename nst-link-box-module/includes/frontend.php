<?php
/**
 * Created by PhpStorm.
 * User: nicktuttle
 * Date: 12/20/2016
 * Time: 8:45 AM
 */
?>

<?php $splitLayout = ($settings->double_col_toggle == 'true') ? true : false; ?>

<div class="nst-link-box">
    <?php if($settings->title_field != ''){ ?>
        <h3 class="nst-link-box-title"><?php echo trim($settings->title_field); ?></h3>
    <?php } ?>

    <?php if($settings->title_divider_toggle == 'true'){ ?>
        <hr class="divider-line">
    <?php } ?>

    <div class="<?php if($splitLayout) { echo 'nst-split-col';} else { echo 'nst-full-col nst-link-box-img';}?>">
        <?php for ( $i = 0; $i < count( $settings->the_links ); $i++ ) : if ( empty( $settings->the_links[ $i ] ) ) {continue;} ?>
            <div class="nst-link-box-item"<?php if ( ! empty( $settings->id ) ) { echo ' id="' . sanitize_html_class( $settings->id ) . '-' . $i . '"';} ?>>
                <a href="<?php echo $settings->the_links[ $i ]->link_url; ?>"><?php echo $settings->the_links[ $i ]->link_label; ?></a>
            </div>
        <?php endfor; ?>
    </div>
    <?php if($splitLayout) { ?>
        <div class="nst-split-col nst-link-box-img"></div>
    <?php } ?>
</div>
