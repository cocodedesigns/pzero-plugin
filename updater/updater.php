<?php

if ( is_admin() ) {
  
  $mytheme = wp_get_theme();
  
  // Load Plugin and Theme Update Checker
  if ( !file_exists( PLUGIN_DIR . '/updater/ptuc/plugin-update-checker.php' ) ){
    require dirname(__FILE__) . '/ptuc/plugin-update-checker.php';
  } else { 
    // File already loaded in plugin
  }
  
  // Display notification for theme
  wp_admin_notification( 'notice-ccdClient-'.$mytheme->get('TextDomain').'-'.str_replace('.','-',$mytheme->get('Version')) , __('<strong>Thanks for installing version '.$mytheme->get('Version').' of '.$mytheme->get('Name').', your custom built theme from Cocode Designs.</strong><br />  Make sure you take a look at your <a href="'.admin_url('options-general.php?page=wys_theme_options').'">Theme Settings</a> to change any options that you need to. <ston','ccdClient-wp'), 'info', true);
}