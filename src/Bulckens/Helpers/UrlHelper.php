<?php

namespace Bulckens\Helpers;

class UrlHelper {

  // Parse a url
  public static function parse( $url ) {
    // native parse
    $url = parse_url( $url );

    // add path base and format
    if ( isset( $url['path'])) {
      $url = array_replace( $url, pathinfo( $url['path']));
    }

    return $url;
  }


  // Get or test current path
  public static function currentPath( $path = null ) {
    if ( is_null( $path ) )
      return self::server( 'REQUEST_URI' );

    return self::server( 'REQUEST_URI' ) == $path;
  }
  
  
  // Helper function for root path (bit trivial though...)
  public static function rootPath( $path = null ) {
    if ( is_null( $path ) )
      return '/';

    return $path == '/';
  }


  // Test if SSL is enabled
  public static function ssl() {
    return array_key_exists( 'HTTPS', self::server() ) && self::server( 'HTTPS' ) == 'on';
  }


  // Get global server data
  public static function server( $key = null ) {
    if ( ! isset( $_SERVER ) ) {
      global $_SERVER;
      $_SERVER = $_SERVER ?: [];
    }

    if ( is_null( $key ) )
      return $_SERVER;

    if ( isset( $_SERVER[$key] ) )
      return $_SERVER[$key];
  }

}
