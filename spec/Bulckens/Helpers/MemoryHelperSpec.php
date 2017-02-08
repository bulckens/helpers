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

}
