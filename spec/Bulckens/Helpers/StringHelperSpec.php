<?php

namespace spec\Bulckens\Helpers;

use stdClass;
use Bulckens\Helpers\StringHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringHelperSpec extends ObjectBehavior {

  // ToHex method
  function it_converts_a_text_string_to_a_hex_string() {
    $this::toHex( 'monkeytown' )->shouldBe( '6d6f6e6b6579746f776e' );
  }


  // FromHex method
  function it_converts_a_hex_string_to_a_text_string() {
    $this::fromHex( '6d6f6e6b6579746f776e' )->shouldBe( 'monkeytown' );
  }


  // IsBlank method
  function it_tests_positive_for_an_empty_string() {
    $this::isBlank( '' )->shouldBe( true );
  }

  function it_tests_positive_for_a_single_space() {
    $this::isBlank( ' ' )->shouldBe( true );
  }

  function it_tests_positive_for_multiple_spaces() {
    $this::isBlank( '           ' )->shouldBe( true );
  }

  function it_tests_positive_for_newlines() {
    $this::isBlank( "        \n   " )->shouldBe( true );
  }

  function it_tests_negative_for_zero() {
    $this::isBlank( '0' )->shouldBe( false );
  }

  function it_tests_negative_for_a_single_character() {
    $this::isBlank( '                       a ' )->shouldBe( false );
  }


  // Censor method
  function it_censors_a_string_for_a_given_sensitive_key() {
    $this::censor( 'password', '12345678' )->shouldBe( '[SENSITIVE DATA HIDDEN]' );
    $this::censor( 'PHP_AUTH_PW', '12345678' )->shouldBe( '[SENSITIVE DATA HIDDEN]' );
  }

  function it_does_not_censor_a_string_for_a_non_sensitive_key() {
    $this::censor( 'panda', '12345678' )->shouldBe( '12345678' );
  }

  function it_censors_a_string_with_a_given_set_of_sensitive_keys() {
    $this::censor( 'panda', '12345678', [ 'panda' ])->shouldBe( '[SENSITIVE DATA HIDDEN]' );
  }


  // Stringify method
  function it_converts_null_to_a_string() {
    $this::stringify( null )->shouldBe( 'null' );
  }

  function it_converts_number_to_a_string() {
    $this::stringify( 5396 )->shouldBe( '5396' );
  }

  function it_converts_an_array_to_a_string() {
    $this::stringify([ 'lala' => 'land' ])->shouldStartWith( '( [lala] => land )' );
  }

  function it_converts_an_object_to_a_string() {
    $this::stringify( new stdClass() )->shouldStartWith( 'stdClass' );
  }

  function it_converts_an_object_in_a_nested_array_to_a_string() {
    $string = $this::stringify([ 'la' => [ 'la' => new stdClass() ] ]);
    $string->shouldStartWith( '( [la] => ( [la] => stdClass ) )' );
  }


  // Generate method
  function it_generates_a_random_string() {
    $string = $this::generate();
    $string->shouldMatch( '/^[A-Za-z0-9]{16}$/' );
  }

  function it_generates_a_random_string_with_a_given_size() {
    $string = $this::generate( 128 );
    $string->shouldMatch( '/^[A-Za-z0-9]{128}$/' );
  }

  function it_generates_a_random_string_with_a_given_size_and_optional_puntuaction() {
    $string = $this::generate( 64, [ 'punctuation' => true ] );
    $string->shouldMatch( '/^[A-Za-z0-9~!@#$%^&*(){}\[\],.\/?]{64}$/' );
  }


  // Partition method
  function it_generates_a_partitioned_string_from_a_given_string() {
    $string = $this::partition( 'abcdefghijkl', 3 );
    $string->shouldBe( 'abc def ghi jkl' );
  }

  function it_pads_a_string_on_the_left_before_partitioning() {
    $string = $this::partition( 'abc', 2, '|', [ 'padding' => 10, 'with' => '-' ]);
    $string->shouldBe( '--|--|--|-a|bc' );
  }

  function it_pads_a_string_on_the_right_before_partitioning() {
    $string = $this::partition( 'abcde', 3, '.', [ 'padding' => 21, 'with' => '*', 'on' => 'right' ]);
    $string->shouldBe( 'abc.de*.***.***.***.***.***' );
  }

  function it_pads_a_string_on_the_right_before_partitioning_from_the_right() {
    $string = $this::partition( 'abcdef', 4, '.', [ 'padding' => 21, 'with' => '*', 'on' => 'right', 'from' => 'right' ]);
    $string->shouldBe( 'bcde.f***.****.****.****' );
  }

  function it_pads_a_number_on_the_left_before_partitioning() {
    $string = $this::partition( 8945, 3, '/', [ 'padding' => 9, 'with' => 0 ]);
    $string->shouldBe( '000/008/945' );
  }

}
