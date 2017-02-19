<?php

namespace Bulckens\Helpers;

use Exception;

class TimeHelper {

  // Get time in milliseconds
  public static function milliseconds() {
    return round( microtime( 1 ) * 1000 );
  }


  // Get time in milliseconds (alias)
  public static function ms() {
    return self::milliseconds();
  }


  // Parse time string to parts
  public static function parse( $time ) {
    if ( preg_match( '/\A([0-9]+)(ms|s|m|h|d|M|y)\z/', $time, $match ) )
      return $match;
  }


  // Parse time string to seconds
  public static function sec( $time ) {
    // if numeric, return as is
    if ( is_numeric( $time ) )
      return $time * 1;

    // parse string values
    if ( self::is( $time ) ) {
      $parts = self::parse( $time );

      switch ( $parts[2] ) {
        case 'ms':
          return $parts[1] / 1000;
        break;
        case 's':
          return $parts[1] * 1;
        break;
        case 'm':
          return $parts[1] * 60;
        break;
        case 'h':
          return $parts[1] * 60 * 60;
        break;
        case 'd':
          return $parts[1] * 60 * 60 * 24;
        break;
        case 'M':
          return intval( 365 / 12 * $parts[1] * 24 * 60 * 60 );
        break;
        case 'y':
          return $parts[1] * 365 * 24 * 60 * 60;
        break;
      }
    }
  }


  // Test given string as time
  public static function is( $time ) {
    // if numeric, true
    if ( is_numeric( $time ) ) return true;

    // if string, try to parse it
    if ( is_string( $time ) )
      return !! self::parse( $time );

    throw new TimeNotConvertableException( 'Expected string or number but got ' . gettype( $time ) );
  }
  
}


// Exceptions
class TimeNotConvertableException extends Exception {}