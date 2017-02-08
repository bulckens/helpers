<?php

namespace Bulckens\Helpers;

class TimeHelper {

  // Get time in milliseconds
  public static function milliseconds() {
    return round( microtime( 1 ) * 1000 );
  }

  // Get time in milliseconds (alias)
  public static function ms() {
    return self::milliseconds();
  }
  
}
