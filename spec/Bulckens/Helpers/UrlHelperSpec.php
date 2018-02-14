<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\UrlHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UrlHelperSpec extends ObjectBehavior {

  function let() {
    global $_SERVER;
    $_SERVER['REQUEST_URI'] = '/some/fake/path';
  }


  // Parse mthod
  function it_parses_the_given_url() {
    $uri = $this::parse( 'http://domdom.com/fatty/feast.json?some=param' );
    $uri->shouldBeArray();
    $uri->shouldHaveKeyWithValue( 'scheme', 'http' );
    $uri->shouldHaveKeyWithValue( 'host', 'domdom.com' );
    $uri->shouldHaveKeyWithValue( 'path', '/fatty/feast.json' );
    $uri->shouldHaveKeyWithValue( 'dirname', '/fatty' );
    $uri->shouldHaveKeyWithValue( 'basename', 'feast.json' );
    $uri->shouldHaveKeyWithValue( 'extension', 'json' );
    $uri->shouldHaveKeyWithValue( 'filename', 'feast' );
    $uri->shouldHaveKeyWithValue( 'query', 'some=param' );
  }


  // CurrentPath method
  function it_returns_the_current_path() {
    $this::currentPath()->shouldBe( '/some/fake/path' );
  }

  function it_tests_positive_if_the_given_path_matches_the_current_path() {
    $this::currentPath( '/some/fake/path' )->shouldBe( true );
  }

  function it_tests_negative_if_the_given_path_does_not_match_the_current_path() {
    $this::currentPath( '/another/fake/path' )->shouldBe( false );
  }


  // RootPath method
  function it_returns_the_absolute_root_path() {
    $this::rootPath()->shouldBe( '/' );
  }

  function it_tests_positive_if_the_given_path_matches_the_root_path() {
    $this::rootPath( '/' )->shouldBe( true );
  }

  function it_tests_negative_if_the_given_path_does_not_match_the_root_path() {
    $this::rootPath( '/fake/path' )->shouldBe( false );
  }


  // Ssl method
  function it_tests_positive_for_ssl_enabled() {
    global $_SERVER;
    $_SERVER['HTTPS'] = 'on';
    $this::ssl()->shouldBe( true );
  }

  function it_tests_negative_for_ssl_disabled() {
    global $_SERVER;
    $_SERVER['HTTPS'] = 'off';
    $this::ssl()->shouldBe( false );
  }


  // Server method
  function it_returns_the_server_array() {
    $this::server()->shouldBeArray();
  }

  function it_returns_a_given_key_from_the_server_array() {
    global $_SERVER;
    $_SERVER['GIVEN'] = 'KEY';
    $this::server( 'GIVEN' )->shouldBe( 'KEY' );
  }

}
