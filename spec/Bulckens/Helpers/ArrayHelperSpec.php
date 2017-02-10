<?php

namespace spec\Bulckens\Helpers;

use stdClass;
use Bulckens\Helpers\ArrayHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ArrayIterator;

class ArrayHelperSpec extends ObjectBehavior {
  
  // Without method
  function it_removes_an_item_form_the_given_array() {
    $this::without( 3, [ 1, 2, 3, 'a', 3 ] )->shouldHaveCount( 3 );
    $this::without( 3, [ 1, 2, 3, 'a', 3 ] )[0]->shouldBe( 1 );
    $this::without( 3, [ 1, 2, 3, 'a', 3 ] )[1]->shouldBe( 2 );
    $this::without( 3, [ 1, 2, 3, 'a', 3 ] )[3]->shouldBe( 'a' );
  }

  function it_returns_an_array_after_removing_an_item_form_the_given_array() {
    $this::without( 3, [ 1, 2, 3, 'a', 3 ] )->shouldBeArray();
  }


  // ToJson method
  function it_converts_an_array_to_json() {
    $this::toJson([ 'jarjar' => 'binks' ])->shouldBe( '{"jarjar":"binks"}' );
  }

  // FromJson method
  function it_converts_json_to_an_array() {
    $this::fromJson( '{"jarjar":"binks"}' )->shouldBe([ 'jarjar' => 'binks' ]);
  }


  // ToXml method
  function it_converts_an_array_to_xml() {
    $xml = $this::toXml([ 'jarjar' => 'binks' ]);
    $xml->shouldBe( "<?xml version=\"1.0\"?>\n<root><jarjar>binks</jarjar></root>\n" );
  }

  function it_converts_an_array_with_a_list_to_xml() {
    $xml = $this::toXml([ 'styles' => [ [ 'id' => 1 ], [ 'id' => 2 ] ] ]);
    $xml->shouldStartWith( "<?xml version=\"1.0\"?>" );
    $xml->shouldContain( '<root><styles>' );
    $xml->shouldContain( '<style><id>1</id></style>' );
    $xml->shouldContain( '<style><id>2</id></style>' );
    $xml->shouldContain( '</styles></root>' );
  }

  function it_converts_an_array_with_a_list_in_the_root_to_xml() {
    $xml = $this::toXml([ [ 'id' => 1 ], [ 'id' => 2 ], [ 'id' => 3 ] ]);
    $xml->shouldStartWith( "<?xml version=\"1.0\"?>" );
    $xml->shouldContain( '<root><item><id>1</id></item>' );
    $xml->shouldContain( '<item><id>2</id></item>' );
    $xml->shouldContain( '<item><id>3</id></item></root>' );
  }

  function it_converts_an_array_to_xml_with_custom_root() {
    $xml = $this::toXml([ 'jarjar' => 'binks' ], [ 'root' => 'blah' ] );
    $xml->shouldStartWith( "<?xml version=\"1.0\"?>" );
    $xml->shouldContain( "<blah><jarjar>binks</jarjar></blah>" );
  }


  // FromXml method
  function it_converts_xml_to_an_array() {
    $array = $this::fromXml( '<?xml version="1.0"?><root><jarjar>binks</jarjar></root>' );
    $array->shouldBe([ 'jarjar' => 'binks' ]);
  }

  function it_converts_xml_with_a_list_to_an_array() {
    $array = $this::fromXml( '<?xml version="1.0"?><root><number>826</number><styles><style><id>1</id></style><style><id>2</id></style><style><id>3</id></style></styles></root>' );

    $array->shouldHaveKey( 'styles' );
    $array['styles']->shouldBeArray();
    $array['styles']->shouldHaveCount( 3 );
    $array['styles']->shouldHaveKey( 0 );
    $array['styles'][0]->shouldHaveKey( 'id' );
    $array['styles'][0]['id']->shouldBe( '1' );
    $array['styles'][1]['id']->shouldBe( '2' );
    $array['styles'][2]['id']->shouldBe( '3' );
  }


  // ToYaml method
  function it_converts_an_array_to_yaml() {
    $this::toYaml([ 'jarjar' => 'binks' ])->shouldBe( "jarjar: binks\n" );
  }


  // FromYaml method
  function it_converts_yaml_to_an_array() {
    $this::fromYaml( "jarjar: binks" )->shouldBe( [ 'jarjar' => 'binks' ] );
  }


  // Censor method
  function it_strips_password_values_from_given_accociative_array() {
    $this::censor([ 'password' => 'abc123' ])->shouldHaveKeyWithValue( 'password', 'PASSWORD HIDDEN' );
  }

  function it_strips_password_values_from_given_accociative_array_with_nested_arrays() {
    $array = $this::censor([ 'password' => 'abc123', 'other' => [ 'password_confirmation' => 'abc123' ] ]);

    $array->shouldHaveKeyWithValue( 'password', 'PASSWORD HIDDEN' );
    $array['other']->shouldHaveKeyWithValue( 'password_confirmation', 'PASSWORD HIDDEN' );
  }

  function it_strips_php_auth_pw_values_from_given_accociative_array() {
    $this::censor([ 'PHP_AUTH_PW' => '121212' ])->shouldHaveKeyWithValue( 'PHP_AUTH_PW', 'PASSWORD HIDDEN' );
  }


  // ToString method
  function it_converts_an_array_to_string() {
    $string = $this::toString([ 'falder' => 'aldera' ]);
    $string->shouldContain( '[falder] => aldera' );
    $string->shouldContain( ')' );
  }

  function it_does_not_censor_sensitive_data() {
    $string = $this::toString([ 'sensitive' => [ 'password' => 'hihihi' ] ]);
    $string->shouldContain( '[password] => hihihi' );
  }

  function it_does_censor_sensitive_data_if_specifically_required() {
    $string = $this::toString([ 'sensitive' => [ 'password' => 'hihihi' ] ], [ 'censor' => true ]);
    $string->shouldContain( '[password] => PASSWORD HIDDEN' );
    $string->shouldNotContain( 'hihihi' );
  }

  function it_does_not_censor_sensitive_data_if_specifically_not_required() {
    $string = $this::toString([ 'sensitive' => [ 'password' => 'hihihi' ] ], [ 'censor' => false ]);
    $string->shouldContain( '[password] => hihihi' );
  }

  function it_does_not_strip_whitespace() {
    $string = $this::toString([ 'funny' => 'story' ]);
    $string->shouldContain( "\n" );
    $string->shouldContain( '    ' );
  }

  function it_strips_whitespace_if_specifically_required() {
    $string = $this::toString([ 'funny' => 'story' ], [ 'strip' => true ]);
    $string->shouldNotContain( "\n" );
    $string->shouldNotContain( '    ' );
  }

  function it_does_not_strip_whitespace_if_specifically_not_required() {
    $string = $this::toString([ 'funny' => 'story' ], [ 'strip' => false ]);
    $string->shouldContain( "\n" );
    $string->shouldContain( '    ' );
  }

  function it_does_not_print_pretty() {
    $string = $this::toString([ 'funny' => new stdClass() ], [ 'strip' => true ]);
    $string->shouldContain( '[funny] => stdClass Object ( )' );
  }

  function it_does_print_pretty_if_specifically_required() {
    $string = $this::toString([ 'funny' => new stdClass() ], [ 'strip' => true, 'pretty' => true ]);
    $string->shouldContain( '[funny] => stdClass' );
  }

  function it_does_print_pretty_with_nested_arrays_if_specifically_required() {
    $string = $this::toString([ 'funny' => [ 'fact' => new stdClass(), 'in' => [ 'side' => new stdClass() ] ] ], [ 'strip' => true, 'pretty' => true ]);
    $string->shouldContain( '[funny] => ( [fact] => stdClass ' );
    $string->shouldNotContain( 'stdClass Object ( )' );
  }

  function it_does_not_print_pretty_if_specifically_not_required() {
    $string = $this::toString([ 'funny' => new stdClass() ], [ 'strip' => true, 'pretty' => false ]);
    $string->shouldContain( '[funny] => stdClass' );
  }

  function it_does_strip_array_prefixes() {
    $string = $this::toString([ 'not_so_funny' => 'story' ]);
    $string->shouldNotStartWith( 'Array' );
    $string->shouldNotContain( 'Array' );
  }

}










