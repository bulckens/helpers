<?php

namespace Bulckens\Helpers;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

class FileHelper {

  // Recruisive directory search
  public static function rsearch( $folder, $pattern ) {
    $list = [];

    // make sure directory exists
    if ( file_exists( $folder ) ) {
      // define folder and prepare iterator
      $dir = new RecursiveDirectoryIterator( $folder );
      $ite = new RecursiveIteratorIterator( $dir );

      // search files
      $files = new RegexIterator( $ite, $pattern, RegexIterator::GET_MATCH );

      foreach ( $files as $file )
        $list = array_merge( $list, $file );
    }

    return $list;
  }


  // Find parent directory
  public static function parent( $dir, $offset = 1 ) {
    for ( $i = 0; $i < $offset ; $i++ )
      $dir = dirname( $dir );

    return $dir;
  }

}