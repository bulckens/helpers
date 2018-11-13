<?php

namespace spec\Bulckens\Helpers;

use Bulckens\Helpers\UploadHelper;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UploadHelperSpec extends ObjectBehavior {


  // Files (static) method
  function it_returns_a_reoragnized_files_array() {
    $this->mockFilesArray([ 'image' => [
      'name' => 'falumba.jpg'
    , 'type' => 'image/jpeg'
    , 'tmp_name' => '/tmp/uploads/gfGV545hgGvJHJbHJB545456'
    , 'error' => UPLOAD_ERR_OK
    , 'size' => 84253
    ]]);

    $files = $this::files();
    $files['image']->shouldHaveKeyWithValue( 'name', 'falumba.jpg' );
    $files['image']->shouldHaveKeyWithValue( 'type', 'image/jpeg' );
    $files['image']->shouldHaveKeyWithValue( 'tmp_name', '/tmp/uploads/gfGV545hgGvJHJbHJB545456' );
    $files['image']->shouldHaveKeyWithValue( 'error', UPLOAD_ERR_OK );
    $files['image']->shouldHaveKeyWithValue( 'size', 84253 );
  }

  function it_reorganizes_a_files_array_with_multiple_uploads() {
    $this->mockFilesArray([ 'pages' => [
      'name' => [
        '1' => [
          'thumb' => 'thumbnail.png'
        , 'image' => 'imaginative.jpg'
        ]
      , '2' => [
          'elements' => [
            '3' => [
              'thumb' => 'duimnagel.png'
            ]
          ]
        ]
      ]
    , 'type' => [
        '1' => [
          'thumb' => 'image/png'
        , 'image' => 'image/jpeg'
        ]
      , '2' => [
          'elements' => [
            '3' => [
              'thumb' => 'image/png'
            ]
          ]
        ]
      ]
    , 'tmp_name' => [
        '1' => [
          'thumb' => '/tmp/uploads/gfGV545hgGvJHJbHJB545456'
        , 'image' => '/tmp/uploads/hsukKlO45Ijfd955hfFFUjgf'
        ]
      , '2' => [
          'elements' => [
            '3' => [
              'thumb' => '/tmp/uploads/uuhFHVvghGHhj54235GVCgh5'
            ]
          ]
        ]
      ]
    , 'error' => [
        '1' => [
          'thumb' => UPLOAD_ERR_OK
        , 'image' => UPLOAD_ERR_OK
        ]
      , '2' => [
          'elements' => [
            '3' => [
              'thumb' => UPLOAD_ERR_OK
            ]
          ]
        ]
      ]
    , 'size' => [
        '1' => [
          'thumb' => 84253
        , 'image' => 3513165464
        ]
      , '2' => [
          'elements' => [
            '3' => [
              'thumb' => 98456
            ]
          ]
        ]
      ]
    ]]);

    $files = $this::files();
    $files['pages']['1']['thumb']->shouldHaveKeyWithValue( 'name', 'thumbnail.png' );
    $files['pages']['1']['thumb']->shouldHaveKeyWithValue( 'type', 'image/png' );
    $files['pages']['1']['thumb']->shouldHaveKeyWithValue( 'tmp_name', '/tmp/uploads/gfGV545hgGvJHJbHJB545456' );
    $files['pages']['1']['thumb']->shouldHaveKeyWithValue( 'error', UPLOAD_ERR_OK );
    $files['pages']['1']['thumb']->shouldHaveKeyWithValue( 'size', 84253 );
    $files['pages']['1']['image']->shouldHaveKeyWithValue( 'name', 'imaginative.jpg' );
    $files['pages']['1']['image']->shouldHaveKeyWithValue( 'type', 'image/jpeg' );
    $files['pages']['1']['image']->shouldHaveKeyWithValue( 'tmp_name', '/tmp/uploads/hsukKlO45Ijfd955hfFFUjgf' );
    $files['pages']['1']['image']->shouldHaveKeyWithValue( 'error', UPLOAD_ERR_OK );
    $files['pages']['1']['image']->shouldHaveKeyWithValue( 'size', 3513165464 );
    $files['pages']['2']['elements']['3']['thumb']->shouldHaveKeyWithValue( 'name', 'duimnagel.png' );
    $files['pages']['2']['elements']['3']['thumb']->shouldHaveKeyWithValue( 'type', 'image/png' );
    $files['pages']['2']['elements']['3']['thumb']->shouldHaveKeyWithValue( 'tmp_name', '/tmp/uploads/uuhFHVvghGHhj54235GVCgh5' );
    $files['pages']['2']['elements']['3']['thumb']->shouldHaveKeyWithValue( 'error', UPLOAD_ERR_OK );
    $files['pages']['2']['elements']['3']['thumb']->shouldHaveKeyWithValue( 'size', 98456 );
  }


  // Helpers
  function mockFilesArray( $a ) {
    global $_FILES;
    $_FILES = $a;
  }

}
