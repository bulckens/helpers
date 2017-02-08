<?php

namespace Bulckens\Helpers;

class UrlHelper {

  // Get or test current path
  public static function currentPath( $path = null ) {
    if ( ! $path )
      return $_SERVER['REQUEST_URI'];

    return $_SERVER['REQUEST_URI'] == $path;
  }
  
  
  // Helper function for root path
  public static function rootPath() {
    return '/';
  }

}
