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
<div class="input-field ">
    <i class="<?php echo $settings->icon-select;?>"></i>
    <input id="first_name" class="eval validate input-bar-center" name="First_Name" required type="text">
    <label for="first_name"><?php echo $settings->title_field; ?></label>
    <span class="input-bar"></span>
</div>
