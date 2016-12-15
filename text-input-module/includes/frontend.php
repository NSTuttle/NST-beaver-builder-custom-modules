<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example:
 */

?>
<div class="input-field">
    <?php if($settings->toggle_icon == 'true'){ ?>
        <i class="prefix <?php echo $settings->icon_select; echo $settings->icon_position;?>"></i>
    <?php } ?>
    <input id="first_name" placeholder="<?php echo $settings->placeholder_field; ?>" class="eval validate input-bar-center" name="First_Name" required type="text">
    <label for="first_name"><?php echo $settings->title_field; ?></label>
    <span class="input-bar"></span>
</div>
