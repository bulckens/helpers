<?php

namespace Bulckens\Helpers;

class StringHelper {

  // Convert string to hex
  public static function toHex( $string ) {
    $hex = '';

    for ( $i = 0; $i < strlen( $string ); $i++ ) {
      $hex .= dechex( ord( $string[$i] ) );
    }

    return $hex;
  }


  // Convert hex to string
  public static function fromHex( $hex ){
    $string = '';

    for ( $i = 0; $i < strlen( $hex ) -1; $i += 2 ) {
      $string .= chr( hexdec( $hex[$i] . $hex[$i + 1] ) );
    }
    
    return $string;
  }


  // Test for blank value
  public static function isBlank( $value ) {
    return !! preg_match( '/\A(\s+)?\z/', $value );
  }


  // Make sure value is stringified
  public static function stringify( $value ) {
    // array
    if ( is_array( $value ) ) {
      return ArrayHelper::toString( $value, [
        'strip'  => true
      , 'pretty' => true
      , 'censor' => true
      ]);
    }

    // null
    if ( is_null( $value ) ) return 'null';

    // number
    if ( is_numeric( $value ) ) return "$value";

    // object
    if ( is_object( $value ) ) return get_class( $value );

    return $value;
  }


  // Generate random string for passwords and such
  public static function generate( $length = 16, $options = [] ) {
    // define selection of characters
    $keys = array_merge( range( 0, 9 ), range( 'a', 'z' ), range( 'A', 'Z' ) );

    // add punctuation if required
    if ( isset( $options['punctuation'] ) && $options['punctuation'] === true ) {
      $keys = array_merge( $keys, str_split( '~!@#$%^&*(){}[],./?' ) );
    }

    // build key
    $key = '';

    for ( $i = 0; $i < $length; $i++ ) {
      $key .= $keys[mt_rand( 0, count( $keys ) - 1 )];
    }
    
    return $key;
  }


  // Partition a string with optional padding
  public static function partition( $value, $length, $part = ' ', $options = [] ) {
    // ensure defaults
    $o = array_replace([
      'padding' => 0
    , 'with' => ' '
    , 'on' => 'left'
    , 'from' => 'left'
    ], $options );

    // make sure value is a string
    $value = "$value";

    // pad string if required
    if ( strlen( $value ) < $o['padding'] ) {
      if ( $o['on'] == 'left' ) {
        $on = STR_PAD_LEFT;
      } else if ( $o['on'] == 'both' ) {
        $on = STR_PAD_BOTH;
      } else {
        $on = STR_PAD_RIGHT;
      }

      $value = str_pad( $value, $o['padding'], $o['with'], $on );
    }
    
    // detect partitioning from the right
    if ( $o['from'] == 'right' ) $value = strrev( $value );

    // split string at given length
    preg_match_all( '/.{' . $length . '}/', $value, $matches );

    // glue back together
    $value = implode( $part, $matches[0] );

    // detect partitioning from the right
    if ( $o['from'] == 'right' ) $value = strrev( $value );

    return $value;
  }
  
}





















