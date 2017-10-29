<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\MemoryHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MemoryHelperSpec extends ObjectBehavior {

  // Snapshot method
  function it_gets_a_snapshot_of_current_memory_situation() {
    $this::snapshot()->shouldBeInteger();
  }


  // Humanize method
  function it_humanizes_to_zero_bytes() {
    $this::humanize( 0 )->shouldBe( '0 bytes' );
  }

  function it_humanizes_to_one_byte() {
    $this::humanize( 1 )->shouldBe( '1 byte' );
  }

  function it_humanizes_to_bytes() {
    $this::humanize( 128 )->shouldBe( '128 bytes' );
  }

  function it_humanizes_to_kilo_bytes() {
    $this::humanize( 1024 * 2 )->shouldBe( '2.00 KB' );
  }

  function it_humanizes_to_mega_bytes() {
    $this::humanize( 1024 * 1024 * 3 )->shouldBe( '3.00 MB' );
  }

  function it_humanizes_to_giga_bytes() {
    $this::humanize( 1024 * 1024 * 1024 * 4 )->shouldBe( '4.00 GB' );
  }

  function it_humanizes_to_tera_bytes() {
    $this::humanize( 1024 * 1024 * 1024 * 5000 )->shouldBe( '5.00 TB' );
  }

  function it_humanizes_to_peta_bytes() {
    $this::humanize( 1024 * 1024 * 1024 * 6000 * 1000 )->shouldBe( '6.00 PB' );
  }


  // Interpret method
  function it_interprets_zero_bytes() {
    $this::interpret( '0 bytes' )->shouldBe( 0 );
  }

  function it_interprets_one_byte_shorthand() {
    $this::interpret( '1 B' )->shouldBe( 1 );
  }

  function it_interprets_many_bytes_without_spaces() {
    $this::interpret( '128B' )->shouldBe( 128 );
  }

  function it_interprets_kilobytes() {
    $this::interpret( '20 KB' )->shouldBe( 20 * 1024 );
  }

  function it_interprets_kilobytes_without_spaces() {
    $this::interpret( '256KB' )->shouldBe( 256 * 1024 );
  }

  function it_interprets_megabytes() {
    $this::interpret( '17 MB' )->shouldBe( 17 * 1024 * 1024 );
  }

  function it_interprets_megabytes_without_spaces() {
    $this::interpret( '5MB' )->shouldBe( 5 * 1024 * 1024 );
  }

  function it_interprets_gigabytes() {
    $this::interpret( '1.5 GB' )->shouldBe( 1.5 * 1024 * 1024 * 1024 );
  }

  function it_interprets_gigabytes_without_spaces() {
    $this::interpret( '300GB' )->shouldBe( 300 * 1024 * 1024 * 1024 );
  }

  function it_interprets_terabytes() {
    $this::interpret( '.25 TB' )->shouldBe( .25 * 1024 * 1024 * 1024 * 1024 );
  }

  function it_interprets_terabytes_without_spaces() {
    $this::interpret( '3.14159265358979TB' )->shouldBe( 3.14159265358979 * 1024 * 1024 * 1024 * 1024 );
  }

  function it_interprets_petabytes() {
    $this::interpret( '1.5e3 PB' )->shouldBe( 1.5e3 * 1024 * 1024 * 1024 * 1024 * 1024 );
  }

  function it_interprets_petabytes_without_spaces() {
    $this::interpret( '.8PB' )->shouldBe( .8 * 1024 * 1024 * 1024 * 1024 * 1024 );
  }

  function it_accepts_a_purely_numeric_value_and_interprets_it_as_bytes() {
    $this::interpret( 568896 )->shouldBe( 568896 );
  }

  function it_fails_when_the_given_value_is_uninterpretable() {
    $this::shouldThrow( 'Bulckens\Helpers\MemoryHelperInterpretValueInvalidException' )->duringInterpret( 'mA sta B a' );
  }

  function it_fails_when_no_numeric_value_is_provided() {
    $this::shouldThrow( 'Bulckens\Helpers\MemoryHelperInterpretValueNotnumericException' )->duringInterpret( ' KB' );
  }

}
