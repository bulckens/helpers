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
    return preg_match( '/\A(\s+)?\z/', $value );
  }
  
}