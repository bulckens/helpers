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


  // IsAssociative method
  function it_tests_positive_if_an_array_is_associative() {
    $this::isAssociative([ 'ass' => true, 'oci' => false, 'ative' => '?' ])->shouldBe( true );
  }

  function it_tests_negative_if_an_array_is_not_associative() {
    $this::isAssociative([ 'ass', 'oci', 'ative' ])->shouldBe( false );
  }


  // ToJson method
  function it_converts_an_array_to_json() {
    $this::toJson([ 'jarjar' => 'binks' ])->shouldBe( '{"jarjar":"binks"}' );
  }

  // FromJson method
  function it_converts_json_to_an_array() {
    $this::fromJson( '{"jarjar":"binks"}' )->shouldBe([ 'jarjar' => 'binks' ]);
  }


  // Real difference between two arrays
  function it_finds_the_difference_between_two_arrays() {
    $diff = $this::diff([ 1, 2, 3 ], [ 2, 3, 4 ]);
    $diff->shouldContain( 1 );
    $diff->shouldNotContain( 2 );
    $diff->shouldNotContain( 3 );
    $diff->shouldContain( 4 );
  }


  // Duplicates
  function it_finds_the_duplicates_in_an_array() {
    $duplicates = $this::duplicates([ 1, 2, 3, 4, 3, 5, 6 ]);
    $duplicates->shouldHaveCount( 1 );
    $duplicates->shouldContain( 3 );
  }

  function it_returns_an_empty_array_if_no_duplicates_are_found() {
    $duplicates = $this::duplicates([ 9, 8, 7, 6, 5, 4, 3, 2, 1 ]);
    $duplicates->shouldHaveCount( 0 );
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
    $this::censor([ 'password' => 'abc123' ])
      ->shouldHaveKeyWithValue( 'password', '[SENSITIVE DATA HIDDEN]' );
  }

  function it_strips_password_values_from_given_accociative_array_with_nested_arrays() {
    $array = $this::censor([
      'password' => 'abc123', 'other' => [ 'password_confirmation' => 'abc123' ]
    ]);

    $array->shouldHaveKeyWithValue( 'password', '[SENSITIVE DATA HIDDEN]' );
    $array['other']->shouldHaveKeyWithValue( 'password_confirmation', '[SENSITIVE DATA HIDDEN]' );
  }

  function it_strips_php_auth_pw_values_from_given_accociative_array() {
    $this::censor([ 'PHP_AUTH_PW' => '121212' ])
      ->shouldHaveKeyWithValue( 'PHP_AUTH_PW', '[SENSITIVE DATA HIDDEN]' );
  }


  // Pretty method
  function it_renders_nested_arrays_as_a_string() {
    $this::pretty([ 'nested' => [ 'array' => 'as string' ] ])
      ->shouldHaveKeyWithValue( 'nested', '( [array] => as string ) ' );
  }

  function it_censors_sensitive_data_by_default() {
    $this::pretty([ 'password' => 'Sup3rS3cr3t!' ])
      ->shouldHaveKeyWithValue( 'password', '[SENSITIVE DATA HIDDEN]' );
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
    $string->shouldContain( '[password] => [SENSITIVE DATA HIDDEN]' );
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


  // FlattendDelimited (static) method
  function it_flattens_a_multidimensional_array_to_an_array_with_delimited_keys() {
    $array = [
      'a' => [
        'b' => 'c'
      , 'd' => 'e'
      , 'f' => [
          'g' => 'h'
        ]
      ]
    , 'i' => 'j'
    , 'k' => [
        'l' => [
          'm' => 'n'
        ]
      ]
    ];

    $flat = $this::flattenDelimited( $array );
    $flat->shouldHaveKeyWithValue( 'a.b', 'c' );
    $flat->shouldHaveKeyWithValue( 'a.d', 'e' );
    $flat->shouldHaveKeyWithValue( 'a.f.g', 'h' );
    $flat->shouldHaveKeyWithValue( 'i', 'j' );
    $flat->shouldHaveKeyWithValue( 'k.l.m', 'n' );
  }

  function it_flattens_a_multidimensional_array_to_an_array_with_custom_delimited_keys() {
    $array = [
      'a' => [
        'b' => 'c'
      , 'd' => 'e'
      , 'f' => [
          'g' => 'h'
        ]
      ]
    , 'i' => 'j'
    , 'k' => [
        'l' => [
          'm' => 'n'
        ]
      ]
    ];

    $flat = $this::flattenDelimited( $array, ':' );
    $flat->shouldHaveKeyWithValue( 'a:b', 'c' );
    $flat->shouldHaveKeyWithValue( 'a:d', 'e' );
    $flat->shouldHaveKeyWithValue( 'a:f:g', 'h' );
    $flat->shouldHaveKeyWithValue( 'i', 'j' );
    $flat->shouldHaveKeyWithValue( 'k:l:m', 'n' );
  }

  function it_flattens_a_multidimensional_array_to_an_array_with_delimited_keys_and_a_custom_prefix() {
    $array = [
      'a' => [
        'b' => 'c'
      , 'd' => 'e'
      , 'f' => [
          'g' => 'h'
        ]
      ]
    , 'i' => 'j'
    , 'k' => [
        'l' => [
          'm' => 'n'
        ]
      ]
    ];

    $flat = $this::flattenDelimited( $array, '-', 'x-' );
    $flat->shouldHaveKeyWithValue( 'x-a-b', 'c' );
    $flat->shouldHaveKeyWithValue( 'x-a-d', 'e' );
    $flat->shouldHaveKeyWithValue( 'x-a-f-g', 'h' );
    $flat->shouldHaveKeyWithValue( 'x-i', 'j' );
    $flat->shouldHaveKeyWithValue( 'x-k-l-m', 'n' );
  }


  // ExpandDelimited (static) method
  function it_expands_an_array_with_delimited_keys_to_a_multidimensional_array() {
    $array = [
      'a.b' => 'c'
    , 'a.d' => 'e'
    , 'a.f.g' => 'h'
    , 'i' => 'j'
    , 'k.l.m' => 'n'
    ];

    $expanded = $this::expandDelimited( $array );
    $expanded->shouldHaveKey( 'a' );
    $expanded['a']->shouldBeArray();
    $expanded['a']->shouldHaveKeyWithValue( 'b', 'c' );
    $expanded['a']->shouldHaveKeyWithValue( 'd', 'e' );
    $expanded['a']->shouldHaveKey( 'f' );
    $expanded['a']['f']->shouldHaveKeyWithValue( 'g', 'h' );
    $expanded->shouldHaveKeyWithValue( 'i', 'j' );
    $expanded->shouldHaveKey( 'k' );
    $expanded['k']->shouldBeArray();
    $expanded['k']->shouldHaveKey( 'l' );
    $expanded['k']['l']->shouldBeArray();
    $expanded['k']['l']->shouldHaveKeyWithValue( 'm', 'n' );
  }

  function it_expands_an_array_with_delimited_keys_to_a_multidimensional_array_using_a_custom_delimiter() {
    $array = [
      'a:b' => 'c'
    , 'a:d' => 'e'
    , 'a:f:g' => 'h'
    , 'i' => 'j'
    , 'k:l:m' => 'n'
    ];

    $expanded = $this::expandDelimited( $array, ':' );
    $expanded->shouldHaveKey( 'a' );
    $expanded['a']->shouldBeArray();
    $expanded['a']->shouldHaveKeyWithValue( 'b', 'c' );
    $expanded['a']->shouldHaveKeyWithValue( 'd', 'e' );
    $expanded['a']->shouldHaveKey( 'f' );
    $expanded['a']['f']->shouldHaveKeyWithValue( 'g', 'h' );
    $expanded->shouldHaveKeyWithValue( 'i', 'j' );
    $expanded->shouldHaveKey( 'k' );
    $expanded['k']->shouldBeArray();
    $expanded['k']->shouldHaveKey( 'l' );
    $expanded['k']['l']->shouldBeArray();
    $expanded['k']['l']->shouldHaveKeyWithValue( 'm', 'n' );
  }

}
