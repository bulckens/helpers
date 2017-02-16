<?php

namespace Bulckens\Helpers;

class UrlHelper {

  // Get or test current path
  public static function currentPath( $path = null ) {
    if ( ! $path )
      return $_SERVER['REQUEST_URI'];

    return $_SERVER['REQUEST_URI'] == $path;
  }
  
  
  // Helper function for root path (bit trivial though...)
  public static function rootPath() {
    return '/';
  }


  // Test if SSL is enabled
  public static function ssl() {
    return array_key_exists( 'HTTPS', $_SERVER ) && $_SERVER['HTTPS'] == 'on';
  }

}
