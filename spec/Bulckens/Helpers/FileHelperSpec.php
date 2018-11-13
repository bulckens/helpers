<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\FileHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileHelperSpec extends ObjectBehavior {
  
  // Rsearch method
  function it_find_all_files_with_a_given_pattern_in_the_current_directory() {
    $rsearch = $this::rsearch( __DIR__, '/.*\.php$/' );
    $rsearch->shouldHaveCount( 8 );
    $rsearch[0]->shouldEndWith( 'HelperSpec.php' );
    $rsearch[5]->shouldEndWith( 'HelperSpec.php' );
  }

  function it_returns_an_empty_array_if_folder_does_not_exist() {
    $rsearch = $this::rsearch( __DIR__ . '/floop', '/*/' );
    $rsearch->shouldBeArray();
    $rsearch->shouldHaveCount( 0 );
  }


  // Parent method
  function it_finds_the_parent_directory() {
    $this::parent( __DIR__ )->shouldBe( dirname( __DIR__ ) );
  }

  function it_finds_the_parent_directory_one_level_up() {
    $this::parent( __DIR__, 1 )->shouldBe( dirname( __DIR__ ) );
  }

  function it_finds_a_parent_directory_a_given_number_of_levels_up() {
    $this::parent( __DIR__, 3 )->shouldBe( dirname( dirname( dirname( __DIR__ ) ) ) );
  }

}
