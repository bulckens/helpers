<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\ArrayHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


  // ToJson method
  function it_converts_an_array_to_json() {
    $this::toJson([ 'jarjar' => 'binks' ])->shouldBe( '{"jarjar":"binks"}' );
  }

  // FromJson method
  function it_converts_json_to_an_array() {
    $this::fromJson( '{"jarjar":"binks"}' )->shouldBe([ 'jarjar' => 'binks' ]);
  }


  // ToXml method
  function it_converts_an_array_to_xml() {
    $this::toXml([ 'jarjar' => 'binks' ])->shouldBe( "<?xml version=\"1.0\"?>\n<root><jarjar>binks</jarjar></root>\n" );
  }

  function it_converts_an_array_to_xml_with_custom_root() {
    $this::toXml([ 'jarjar' => 'binks' ], [ 'root' => 'blah' ] )->shouldBe( "<?xml version=\"1.0\"?>\n<blah><jarjar>binks</jarjar></blah>\n" );
  }


  // FromXml method
  function it_converts_xml_to_an_array() {
    $this::fromXml( '<?xml version="1.0"?><root><jarjar>binks</jarjar></root>' )->shouldBe([ 'jarjar' => 'binks' ]);
  }


  // ToYaml method
  function it_converts_an_array_to_yaml() {
    $this::toYaml([ 'jarjar' => 'binks' ])->shouldBe( "jarjar: binks\n" );
  }

  // FromYaml method
  function it_converts_yaml_to_an_array() {
    $this::fromYaml( "jarjar: binks" )->shouldBe( [ 'jarjar' => 'binks' ] );
  }

}
