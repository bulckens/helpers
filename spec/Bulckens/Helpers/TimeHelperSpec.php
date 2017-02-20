<?php

namespace spec\Bulckens\Helpers;

use stdClass;
use Bulckens\Helpers\TimeHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimeHelperSpec extends ObjectBehavior {
  
  // Milliseconds method
  function it_returns_current_milliseconds() {
    $this::milliseconds()->shouldBeDouble();
  }

  
  // Ms method method
  function it_returns_current_milliseconds_as_alias() {
    $this::ms()->shouldBeDouble();
  }

  
  // Sec method
  function it_parses_a_given_string_representation_to_time_in_milliseconds() {
    $this::sec( '523ms' )->shouldBe( 0.523 );
  }

  function it_parses_a_given_human_string_representation_to_time_in_milliseconds() {
    $this::sec( '1 millisecond' )->shouldBe( 0.001 );
    $this::sec( '36 milliseconds' )->shouldBe( 0.036 );
  }

  function it_parses_a_given_string_representation_to_time_in_seconds() {
    $this::sec( '10s' )->shouldBe( 10 );
  }

  function it_parses_a_given_human_string_representation_to_time_in_seconds() {
    $this::sec( '1 second' )->shouldBe( 1 );
    $this::sec( '7 seconds' )->shouldBe( 7 );
  }

  function it_parses_a_given_string_representation_to_time_in_minutes() {
    $this::sec( '5m' )->shouldBe( 5 * 60 );
  }

  function it_parses_a_given_human_string_representation_to_time_in_minutes() {
    $this::sec( '1 minute' )->shouldBe( 60 );
    $this::sec( '81 minutes' )->shouldBe( 81 * 60 );
  }

  function it_parses_a_given_string_representation_to_time_in_hours() {
    $this::sec( '7h' )->shouldBe( 7* 60 * 60 );
  }

  function it_parses_a_given_human_string_representation_to_time_in_hours() {
    $this::sec( '1 hour' )->shouldBe( 60 * 60 );
    $this::sec( '0.5 hours' )->shouldBe( 0.5 * 60 * 60 );
  }

  function it_parses_a_given_string_representation_to_time_in_days() {
    $this::sec( '2d' )->shouldBe( 2 * 24 * 60 * 60 );
  }

  function it_parses_a_given_human_string_representation_to_time_in_days() {
    $this::sec( '1 day' )->shouldBe( 24 * 60 * 60 );
    $this::sec( '6 days' )->shouldBe( 6 * 24 * 60 * 60 );
  }

  function it_parses_a_given_string_representation_to_time_in_months() {
    $this::sec( '2M' )->shouldBe( intval( 365 / 12 * 2 * 24 * 60 * 60 ) );
  }

  function it_parses_a_given_human_string_representation_to_time_in_months() {
    $this::sec( '1 month' )->shouldBe( intval( 365 / 12 * 24 * 60 * 60 ) );
    $this::sec( '12 months' )->shouldBe( intval( 365 / 12 * 12 * 24 * 60 * 60 ) );
  }

  function it_parses_a_given_string_representation_to_time_in_zero_months() {
    $this::sec( '0M' )->shouldBe( 0 );
  }

  function it_parses_a_given_string_representation_to_time_in_years() {
    $this::sec( '2y' )->shouldBe( 365 * 2 * 24 * 60 * 60 );
  }

  function it_parses_a_given_human_string_representation_to_time_in_years() {
    $this::sec( '1 year' )->shouldBe( 365 * 24 * 60 * 60 );
    $this::sec( '8 years' )->shouldBe( 365 * 8 * 24 * 60 * 60 );
  }

  function it_parses_a_given_string_representation_to_time_in_zero_years() {
    $this::sec( '0y' )->shouldBe( 0 );
  }

  function it_accepts_a_given_number_as_seconds() {
    $this::sec( 15 )->shouldBe( 15 );
  }

  function it_fails_when_given_anything_other_than_a_string_or_number_for_from() {
    $this::shouldThrow( 'Bulckens\Helpers\TimeNotConvertableException' )->duringIs( new stdClass() );
  }


  // Is method
  function it_tests_true_if_a_given_string_represents_time_in_milliseconds() {
    $this::is( '523ms' )->shouldBe( true );
  }

  function it_tests_true_if_a_given_string_represents_time_in_seconds() {
    $this::is( '10s' )->shouldBe( true );
  }

  function it_tests_true_if_a_given_string_represents_time_in_minutes() {
    $this::is( '5m' )->shouldBe( true );
  }

  function it_tests_true_if_a_given_string_represents_time_in_hours() {
    $this::is( '7h' )->shouldBe( true );
  }

  function it_tests_true_if_a_given_string_represents_time_in_days() {
    $this::is( '2d' )->shouldBe( true );
  }

  function it_tests_true_if_a_given_string_represents_time_in_months() {
    $this::is( '2M' )->shouldBe( true );
  }

  function it_tests_true_if_a_given_string_represents_time_in_years() {
    $this::is( '2y' )->shouldBe( true );
  }

  function it_tests_true_for_a_given_string_number_as_seconds() {
    $this::is( '531' )->shouldBe( true );
  }

  function it_tests_true_for_a_given_number_as_seconds() {
    $this::is( 36 )->shouldBe( true );
  }

  function it_fails_when_given_anything_other_than_a_string_or_number_for_is() {
    $this::shouldThrow( 'Bulckens\Helpers\TimeNotConvertableException' )->duringIs( new stdClass() );
  }


  // Parse method
  function it_parses_time_to_two_parts() {
    $parts = $this::parse( '36d' );
    $parts->shouldBeArray();
    $parts[1]->shouldBe( '36' );
    $parts[2]->shouldBe( 'd' );
  }

}
