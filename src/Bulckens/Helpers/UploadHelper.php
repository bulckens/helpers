<?php

namespace Bulckens\Helpers;

class UploadHelper {

  // Build a proper array from uploaded files
  public static function files() {
    global $_FILES;
    $array = ArrayHelper::flattenDelimited( $_FILES );
    $files = [];

    foreach ( $array as $key => $value ) {
      if ( preg_match( "/^([^.]+)\.(name|error|size|tmp_name|type)\.(.*)$/", $key, $m ) ) {
        $key = sprintf( '%s.%s.%s', $m[1], $m[3], $m[2] );
      }

      $files[$key] = $value;
    }

    return ArrayHelper::expandDelimited( $files );
  }

}
