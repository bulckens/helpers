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

  function it_returns_a_mime_type_for_an_alternative_extension() {
    $this::get( 'jpeg' )->shouldBe( 'image/jpeg' );
  }

  function it_returns_nothing_if_a_given_extension_does_not_exist() {
    $this::get( 'mastaba' )->shouldBe( null );
  }

  function it_returns_the_preferred_mime_type() {
    $this::get( 'psd' )->shouldBe( 'application/photoshop' );
  }


  // Map (static) method
  function it_returns_the_full_map_with_extensions_as_keys() {
    $this::map()->shouldBeArray();
    $this::map()->shouldHaveKeyWithValue( 'yml', 'application/x-yaml' );
    $this::map()->shouldNotHaveKeyWithValue( 'yml', 'text/yaml' );
  }

  function it_returns_the_full_map_with_mime_types_as_keys() {
    $this::map( 'mime' )->shouldBeArray();
    $this::map( 'mime' )->shouldHaveKeyWithValue( 'text/yaml', 'yml' );
  }


  // Ext (static) method
  function it_returns_an_extension_for_a_mime_type() {
    $this::ext( 'image/jpeg' )->shouldBe( 'jpg' );
  }

  function it_returns_nothing_if_a_given_mime_type_does_not_exist() {
    $this::ext( 'application/mastaba' )->shouldBe( null );
  }

  function it_prioritizes_the_aiff_extension_for_audio_aiff() {
    $this::ext( 'audio/aiff' )->shouldBe( 'aiff' );
  }

  function it_prioritizes_the_avi_extension_for_video_avi() {
    $this::ext( 'video/avi' )->shouldBe( 'avi' );
  }

  function it_prioritizes_the_jpg_extension_for_jpeg_image() {
    $this::ext( 'image/jpeg' )->shouldBe( 'jpg' );
  }

  function it_prioritizes_the_js_extension_for_javascript_application() {
    $this::ext( 'application/javascript' )->shouldBe( 'js' );
  }

  function it_prioritizes_the_txt_extension_for_html_text() {
    $this::ext( 'text/html' )->shouldBe( 'html' );
  }

  function it_prioritizes_the_js_extension_for_photoshop_application() {
    $this::ext( 'application/photoshop' )->shouldBe( 'psd' );
  }

  function it_prioritizes_the_rtf_extension_for_rtf_application() {
    $this::ext( 'application/rtf' )->shouldBe( 'rtf' );
  }

  function it_prioritizes_the_tiff_extension_for_tiff_image() {
    $this::ext( 'image/tiff' )->shouldBe( 'tiff' );
  }

  function it_prioritizes_the_txt_extension_for_plain_text() {
    $this::ext( 'text/plain' )->shouldBe( 'txt' );
  }

  function it_prioritizes_the_xml_extension_for_xml_application() {
    $this::ext( 'application/xml' )->shouldBe( 'xml' );
  }

  function it_prioritizes_the_yaml_extension_for_yaml_application() {
    $this::ext( 'application/x-yaml' )->shouldBe( 'yaml' );
  }

  function it_prioritizes_the_zip_extension_for_zip_application() {
    $this::ext( 'application/zip' )->shouldBe( 'zip' );
  }


  // Register method
  function it_registeres_a_new_mime_type() {
    $this::get( 'fmpxml' )->shouldBe( null );
    $this::register( 'fmpxml', 'application/xml' )->shouldBe( true );
    $this::get( 'fmpxml' )->shouldBe( 'application/xml' );
  }

  function it_does_not_allow_an_existing_mime_type_to_be_reregistered() {
    $this::get( 'xml' )->shouldBe( 'application/xml' );
    $this::register( 'xml', 'trash/bag' )->shouldBe( false );
    $this::get( 'xml' )->shouldBe( 'application/xml' );
  }

}
