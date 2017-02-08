<?php

namespace spec\Bulckens\Helpers;

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

}
