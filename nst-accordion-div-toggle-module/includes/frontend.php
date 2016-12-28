<?php
/**
 * Created by PhpStorm.
 * User: nicktuttle
 * Date: 12/28/2016
 * Time: 2:05 PM
 */
?>
<div class='nst-tab-container'>
  <ul class='nav nst-nav-tabs'>

      <?php for ( $i = 0; $i < count( $settings->the_links ); $i++ ) : if ( empty( $settings->the_links[ $i ] ) ) {continue;} ?>
    <li class='<?php if ($i == 0) { echo 'active';}?>'<?php if ( ! empty( $settings->id ) ) { echo ' id="' . sanitize_html_class( $settings->id ) . '-' . $i . '"';} ?>>
      <a href='#<?php echo $settings->the_links[ $i ]->link_id; ?>' data-toggle='tab'>
        <span><?php echo $settings->the_links[ $i ]->link_label; ?></span>
      </a>
    </li>
      <?php endfor; ?>
  </ul>
</div>