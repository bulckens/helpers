<?php

namespace Bulckens\Helpers;

class StringHelper {

  // Convert string to hex
  public static function toHex( $string ) {
    $hex = '';

    for ( $i = 0; $i < strlen( $string ); $i++ )
      $hex .= dechex( ord( $string[$i] ) );

    return $hex;
  }


  // Convert hex to string
  public static function fromHex( $hex ){
    $string = '';

    for ( $i = 0; $i < strlen( $hex ) -1; $i += 2 )
      $string .= chr( hexdec( $hex[$i] . $hex[$i + 1] ) );
    
    return $string;
  }


  // Test for blank value
  public static function isBlank( $value ) {
    return !! preg_match( '/\A(\s+)?\z/', $value );
  }


  // Make sure value is stringified
  public static function stringify( $value ) {
    // array
    if ( is_array( $value ) )
      return ArrayHelper::toString( $value, [
        'strip'  => true
      , 'pretty' => true
      , 'censor' => true
      ]);

    // null
    if ( is_null( $value ) )
      return 'null';

    // number
    if ( is_numeric( $value ) )
      return "$value";

    // object
    if ( is_object( $value ) )
      return get_class( $value );

    return $value;
  }
  
}