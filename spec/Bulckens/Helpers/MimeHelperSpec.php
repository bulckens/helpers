<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\MimeHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MimeHelperSpec extends ObjectBehavior {
  
  // Get (static) method
  function it_returns_a_mime_type_for_an_extension() {
    $this::get( 'jpg' )->shouldBe( 'image/jpeg' );
  }

  function it_returns_nothing_if_a_given_extension_does_not_exist() {
    $this::get( 'mastaba' )->shouldBe( null );
  }

  function it_returns_the_preferred_mime_type() {
    $this::get( 'psd' )->shouldBe( 'application/photoshop' );
  }


  // Map (static) method
  function it_returns_the_full_map_without_an_argument() {
    $this::map()->shouldBeArray();
    $this::map()->shouldHaveKeyWithValue( 'text/yaml', 'yml' );
  }


  // Ext (static) method
  function it_returns_an_extension_for_a_mime_type() {
    $this::ext( 'image/jpeg' )->shouldBe( 'jpg' );
  }

  function it_returns_nothing_if_a_given_mime_type_does_not_exist() {
    $this::ext( 'application/mastaba' )->shouldBe( null );
  }

}
