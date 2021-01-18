<?php
/*
Plugin Name:  Create Sub Menu
Description: Learning Wordpress
Version: 1.0
*/


function demo_settings_page()
{
    add_settings_section("section", "Section", null, "demo");
    add_settings_field("demo-checkbox", "Demo Checkbox", "demo_checkbox_display", "demo", "section");  
    register_setting("section", "demo-checkbox");
}

function demo_checkbox_display()
{
   ?>
        <!-- Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string. -->
        <input type="checkbox" name="demo-checkbox" value="1" <?php checked(1, get_option('demo-checkbox'), true); ?> />
   <?php
}

add_action("admin_init", "demo_settings_page");

function demo_page()
{
  ?>
      <div class="wrap">
         <h1>Demo</h1>
 
         <form method="post" action="options.php">
            <?php
               settings_fields("section");
 
               do_settings_sections("demo");
                 
               submit_button();
            ?>
         </form>
      </div>
   <?php
}

function menu_item()
{
  add_submenu_page("options-general.php", "Demo", "Demo", "manage_options", "demo", "demo_page");
}
 
add_action("admin_menu", "menu_item");