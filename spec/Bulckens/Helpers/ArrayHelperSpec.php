<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\ArrayHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ArrayIterator;
use stdClass;

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
    $xml = $this::toXml([ 'jarjar' => 'binks' ]);
    $xml->shouldBe( "<?xml version=\"1.0\"?>\n<root><jarjar>binks</jarjar></root>\n" );
  }

  function it_converts_an_array_with_a_list_to_xml() {
    $xml = $this::toXml([ 'styles' => [ [ 'id' => 1 ], [ 'id' => 2 ] ] ]);
    $xml->shouldStartWith( "<?xml version=\"1.0\"?>" );
    $xml->shouldContain( '<root><styles>' );
    $xml->shouldContain( '<style><id>1</id></style>' );
    $xml->shouldContain( '<style><id>2</id></style>' );
    $xml->shouldContain( '</styles></root>' );
  }

  function it_converts_an_array_with_a_list_in_the_root_to_xml() {
    $xml = $this::toXml([ [ 'id' => 1 ], [ 'id' => 2 ], [ 'id' => 3 ] ]);
    $xml->shouldStartWith( "<?xml version=\"1.0\"?>" );
    $xml->shouldContain( '<root><item><id>1</id></item>' );
    $xml->shouldContain( '<item><id>2</id></item>' );
    $xml->shouldContain( '<item><id>3</id></item></root>' );
  }

  function it_converts_an_array_to_xml_with_custom_root() {
    $xml = $this::toXml([ 'jarjar' => 'binks' ], [ 'root' => 'blah' ] );
    $xml->shouldStartWith( "<?xml version=\"1.0\"?>" );
    $xml->shouldContain( "<blah><jarjar>binks</jarjar></blah>" );
  }


  // FromXml method
  function it_converts_xml_to_an_array() {
    $array = $this::fromXml( '<?xml version="1.0"?><root><jarjar>binks</jarjar></root>' );
    $array->shouldBe([ 'jarjar' => 'binks' ]);
  }

  function it_converts_xml_with_a_list_to_an_array() {
    $array = $this::fromXml( '<?xml version="1.0"?><root><number>826</number><styles><style><id>1</id></style><style><id>2</id></style><style><id>3</id></style></styles></root>' );

    $array->shouldHaveKey( 'styles' );
    $array['styles']->shouldBeArray();
    $array['styles']->shouldHaveCount( 3 );
    $array['styles']->shouldHaveKey( 0 );
    $array['styles'][0]->shouldHaveKey( 'id' );
    $array['styles'][0]['id']->shouldBe( '1' );
    $array['styles'][1]['id']->shouldBe( '2' );
    $array['styles'][2]['id']->shouldBe( '3' );
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
