<?php

namespace Bulckens\Helpers;

use Exception;

class MemoryHelper {

  // Take snapshot of current memoy usage
  public static function snapshot() {
    return memory_get_usage();
  }

  
  // Humanize memory representation
  public static function humanize( $bytes ) {
    if ( $bytes >= 1073741824e6 ) {
      return number_format( $bytes / 1073741824e6, 2 ) . ' PB';

    } elseif ( $bytes >= 1073741824e3 ) {
      return number_format( $bytes / 1073741824e3, 2 ) . ' TB';

    } elseif ( $bytes >= 1073741824 ) {
      return number_format( $bytes / 1073741824, 2 ) . ' GB';

    } elseif ($bytes >= 1048576) {
      return number_format( $bytes / 1048576, 2 ) . ' MB';
    
    } elseif ($bytes >= 1024) {
      return number_format( $bytes / 1024, 2 ) . ' KB';
    
    } elseif ( $bytes > 1 ) {
      return $bytes . ' bytes';
    
    } elseif ( $bytes == 1 ) {
      return $bytes . ' byte';
    
    } else {
      return '0 bytes';
    }
  }


  // Interpret memory representation
  public static function interpret( $memory ) {
    // detect parsable value
    if ( preg_match( '/^((\d+)?(\.\d+(e\d+)?)?)\s?([BGMKPT]{1,2}|bytes?)$/', $memory, $matches ) ) {
      // verify numeric value
      if ( ! is_numeric( $matches[1] ) ) {
        throw new MemoryHelperInterpretValueNotnumericException( "Given value '$memory' does not include a number" );
      }

      switch ( $matches[5] ) {
        case 'B':
        case 'byte':
        case 'bytes':
          return $matches[1] * 1; 
        break;
        case 'KB':
          return $matches[1] * 1024;
        break;
        case 'MB':
          return $matches[1] * 1024 * 1024;
        break;
        case 'GB':
          return $matches[1] * 1024 * 1024 * 1024;
        break;
        case 'TB':
          return $matches[1] * 1024 * 1024 * 1024 * 1024;
        break;
        case 'PB':
          return $matches[1] * 1024 * 1024 * 1024 * 1024 * 1024;
        break;
      }

    } else {
      throw new MemoryHelperInterpretValueInvalidException( "Given value '$memory' is invalid" );
    }
  }

}


// Helpers
class MemoryHelperInterpretValueInvalidException extends Exception {}
class MemoryHelperInterpretValueNotnumericException extends Exception {}