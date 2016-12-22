<?php
/**
 * Created by PhpStorm.
 * User: nicktuttle
 * Date: 12/20/2016
 * Time: 8:45 AM
 */
?>
<div class="nst-link-box">
    <?php if($settings->title_field != ''){ ?>
        <h3 class="nst-link-box-title"><?php echo $settings->title_field ?></h3>
    <?php } ?>
    <hr class="divider-line">
    <?php if($settings->double_col_toggle == 'false'){ ?>
        <div class="nst-link-box-col1 nst-full-col nst-link-box-img">
        <?php for ( $i = 0; $i < count( $settings->links ); $i++ ) : if ( empty( $settings->links[ $i ] ) ) continue; ?>
            <div class="nst-link-box-item"<?php if ( ! empty( $settings->id ) ) echo ' id="' . sanitize_html_class( $settings->id ) . '-' . $i . '"'; ?>>
                <a href="<?php echo $settings->links[ $i ]->link_url; ?>"><?php echo $settings->links[ $i ]->link_label; ?><a/>
            </div>
        <?php endfor; ?>
        </div>
    <?php } else {?>
        <div class="nst-link-box-col1 nst-split-col">
            <?php for ( $i = 0; $i < count( $settings->links ); $i++ ) : if ( empty( $settings->links[ $i ] ) ) continue; ?>
                <div class="nst-link-box-item"<?php if ( ! empty( $settings->id ) ) echo ' id="' . sanitize_html_class( $settings->id ) . '-' . $i . '"'; ?>>
                        <a href="<?php echo $settings->links[ $i ]->link_url; ?>"><?php echo $settings->links[ $i ]->link_label; ?><a/>
                </div>
            <?php endfor; ?>
        </div>
        <div class="nst-link-box-col2 nst-split-col nst-link-box-img"></div>
    <?php } ?>
</div>