<?php

namespace Bulckens\Helpers;

use SimpleXMLElement;
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

  public function fromYaml( $yaml ) {
    return Yaml::parse( $yaml );
  }
  
  // Convert array to XML
  public static function toXml( $array, $options = [] ) {
    // merge defaults
    $options = array_replace( [ 'xml' => null, 'name' => 'item', 'root' => 'root' ], $options );

    // ensure xml object
    if ( is_null( $options['xml'] ) )
      $options['xml'] = new SimpleXMLElement( "<{$options['root']}/>" );
    
    // dig through array structure
    foreach ( $array as $key => $value ) {
      // dealing with <0/>..<n/> issues
      if ( is_numeric( $key ) ) $key = $options['name'];

      // make sure objects are converted to an array where possible
      if ( is_object( $value ) && method_exists( $value, 'toArray' ) )
        $value = $value->toArray();
      
      // test if a recruisive call is required
      is_array( $value )
        ? self::toXml( $value, [ 'xml' => $options['xml']->addChild( $key ) ] )
        : $options['xml']->addChild( $key, $value );
    }

    return $options['xml']->asXML();
  }

  // Convert array to XML
  public static function fromXml( $xml ) {
    $xml = simplexml_load_string( $xml, 'SimpleXMLElement', LIBXML_NOCDATA );
    return json_decode( json_encode( $xml ), true );
  }

}