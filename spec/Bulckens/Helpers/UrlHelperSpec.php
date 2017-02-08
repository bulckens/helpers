<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\UrlHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UrlHelperSpec extends ObjectBehavior {

  function let() {
    global $_SERVER;
    $_SERVER = [];
    $_SERVER['REQUEST_URI'] = '/some/fake/path';
  }


  // CurrentPath method
  function it_returns_the_current_path() {
    self::currentPath()->shouldBe( '/some/fake/path' );
  }

  function it_tests_positive_if_the_given_path_matches_the_current_path() {
    self::currentPath( '/some/fake/path' )->shouldBe( true );
  }

  function it_tests_negative_if_the_given_path_does_not_match_the_current_path() {
    self::currentPath( '/another/fake/path' )->shouldBe( false );
  }


  // Root path method
  function it_returns_the_absolute_root_path() {
    self::rootPath()->shouldBe( '/' );
  }

}
