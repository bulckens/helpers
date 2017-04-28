<?php

namespace Bulckens\Helpers;

use Exception;
use DateTime;

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
    if ( preg_match( '/\A([0-9\.]+)(ms|s|m|h|d|M|y|(\s[acdehilmnorstuy]{3,12}))\z/', $time, $match ) )
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
        case ' millisecond':
        case ' milliseconds':
          return $parts[1] / 1000;
        break;
        case 's':
        case ' second':
        case ' seconds':
          return $parts[1] * 1;
        break;
        case 'm':
        case ' minute':
        case ' minutes':
          return $parts[1] * 60;
        break;
        case 'h':
        case ' hour':
        case ' hours':
          return $parts[1] * 60 * 60;
        break;
        case 'd':
        case ' day':
        case ' days':
          return $parts[1] * 60 * 60 * 24;
        break;
        case 'M':
        case ' month':
        case ' months':
          return intval( 365 / 12 * $parts[1] * 24 * 60 * 60 );
        break;
        case 'y':
        case ' year':
        case ' years':
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


  // Get the current date to the second
  public static function stamp( $format = 'YmdHis' ) {
    if ( $format === true ) $format = 'YmdHisu';

    $now = DateTime::createFromFormat( 'U.u', microtime( true ) );
    return $now->format( $format );
  }
  
}


// Exceptions
class TimeNotConvertableException extends Exception {}