<?php

namespace Bulckens\Helpers;

use SimpleXMLElement;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class ArrayHelper {

  // Remove a specific item from an array
  public static function without( $needle, $haystack ) {
    return array_filter( $haystack, function( $item ) use ( $needle ) {
      return $item != $needle;
    });
  }


  // Intersect two object arrays
  public static function overlap( $first, $second ) {
    return array_uintersect( $first, $second, function ( $a1, $a2 ) {
      return $a1 == $a2;
    });
  }
  

  // Test for associative array
  public static function isAssociative( $array ) {
    return array_keys( $array ) !== range( 0, count( $array ) - 1 );
  }


  // Get value from associative array with null fallback
  public static function valueFrom( $array, $key ) {
    if ( isset( $array[$key] ) )
      return $array[$key];
  }


  // Get values for key from an Eloquent collection
  public static function valuesFromCollection( $key, $collection ) {
    // make sure the list is an array
    if ( ! is_array( $collection ) )
      $collection = $collection->toArray();

    // fetch all individual keys
    return array_map( function( $item ) use( $key ) {
      return $item[$key];
    }, $collection );
  }


  // Convert a deep associatibe array to a delimited key array
  public static function flattenDelimited( $array, $prefix = '', $delimiter = '.' ) {
    $result = [];

    foreach( $array as $key => $value ) {
      if ( is_array( $value ) )
        $result = $result + self::flattenDelimited( $value, $prefix . $key . $delimiter, $delimiter );
      else
        $result[$prefix . $key] = $value;
    }

    return $result;
  }


  // Convert array to JSON
  public static function toJson( $array ) {
    return json_encode( $array );
  }


  // Convert JSON to array
  public static function fromJson( $json ) {
    return json_decode( $json, true );
  }


  // Convert array to YAML
  public static function toYaml( $array ) {
    return Yaml::dump( $array, 2, 2 );
  }


  public static function fromYaml( $yaml ) {
    return Yaml::parse( $yaml );
  }
  

  // Convert array to XML
  public static function toXml( $array, $options = [] ) {
    // merge defaults
    $options = array_replace([
      'xml'    => null
    , 'root'   => 'root'
    , 'parent' => null
    ], $options );

    // ensure xml object
    if ( is_null( $options['xml'] ) )
      $options['xml'] = new SimpleXMLElement( "<{$options['root']}/>" );
    
    // dig through array structure
    foreach ( $array as $key => $value ) {
      // dealing with <0/>..<n/> issues
      if ( is_numeric( $key ) ) $key = Str::singular( $options['parent'] ?: 'item' );

      // make sure objects are converted to an array where possible
      if ( is_object( $value ) && method_exists( $value, 'toArray' ) )
        $value = $value->toArray();
      
      // test if a recruisive call is required
      is_array( $value )
        ? self::toXml( $value, [ 'xml' => $options['xml']->addChild( $key ), 'parent' => $key ] )
        : $options['xml']->addChild( $key, $value );
    }

    return $options['xml']->asXML();
  }


  // Convert array to XML
  public static function fromXml( $xml ) {
    // parse xml to array
    $xml = simplexml_load_string( $xml, 'SimpleXMLElement', LIBXML_NOCDATA );
    $raw = json_decode( json_encode( $xml ), true );    

    return self::flattenFromXml( $raw );
  }


  // Remove nested arrays introduced by semantic xml markup
  protected static function flattenFromXml( $array ) {
    foreach ( $array as $k => $value ) {
      if ( is_array( $value ) ) {
        // get singular name of node
        $s = Str::singular( $k );

        // if the singular child node is present, is the only child and is an array
        if ( isset( $array[$k][$s] ) && is_array( $array[$k][$s] ) && count( $array[$k] ) == 1 )
          // remove the wrapping child
          $array[$k] = $array[$k][$s];

        // perform a deep traverse
        $array[$k] = self::flattenFromXml( $array[$k] );
      } 
    }

    return $array;
  }


  // Hide sensitive data
  public static function censor( $array ) {
    foreach ( $array as $key => $value ) {
      if ( is_string( $key ) ) {
        if ( is_array( $value ) )
          $array[$key] = self::censor( $value );

        else if ( preg_match( '/passw/i', $key ) || $key == 'PHP_AUTH_PW' )
          $array[$key] = 'PASSWORD HIDDEN';
      }
    }
    
    return $array;
  }


  // Render array to string
  public static function toString( $array, $options = [] ) {
    // merge options
    $options = array_replace([
      'strip'  => false
    , 'censor' => false
    , 'pretty' => false
    ], $options );

    // hide sensitive data
    if ( $options['censor'] )
      $array = self::censor( $array );

    // prettyify array
    if ( $options['pretty'] )
      foreach ( $array as $key => $val )
        $array[$key] = StringHelper::stringify( $val );

    // render params to string
    $string = print_r( $array, true );

    // remove whitespace if required
    if ( $options['strip'] )
      $string = preg_replace( "/\n/", '', preg_replace( '/\s+/', ' ', $string ) );

    // remove Array prefixes
    $string = preg_replace( "/Array\s?/", '', $string );

    return $string;
  }


  // Render nested arrays as string
  public static function pretty( $array ) {
    if ( is_array( $array ) ) {
      foreach ( $array as $key => $val )
        $array[$key] = StringHelper::stringify( $val );
    }

    return $array;
  }

}