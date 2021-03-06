<?php

namespace Bulckens\Helpers;

class MimeHelper {

  protected static $map = [
    // preferred
    [ 'ext' => 'aiff', 'mime' => 'audio/aiff' ]
  , [ 'ext' => 'avi', 'mime' => 'video/avi' ]
  , [ 'ext' => 'jpg', 'mime' => 'image/jpeg' ]
  , [ 'ext' => 'js', 'mime' => 'application/javascript' ]
  , [ 'ext' => 'html', 'mime' => 'text/html' ]
  , [ 'ext' => 'psd', 'mime' => 'application/photoshop' ]
  , [ 'ext' => 'rtf', 'mime' => 'application/rtf' ]
  , [ 'ext' => 'tiff', 'mime' => 'image/tiff' ]
  , [ 'ext' => 'txt', 'mime' => 'text/plain' ]
  , [ 'ext' => 'xml', 'mime' => 'application/xml' ]
  , [ 'ext' => 'yaml', 'mime' => 'application/x-yaml' ]
  , [ 'ext' => 'yml', 'mime' => 'application/x-yaml' ]
  , [ 'ext' => 'zip', 'mime' => 'application/zip' ]


    // secondary
  , [ 'ext' => '3dm', 'mime' => 'x-world/x-3dmf' ]
  , [ 'ext' => '3dmf', 'mime' => 'x-world/x-3dmf' ]
  , [ 'ext' => 'a', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'aab', 'mime' => 'application/x-authorware-bin' ]
  , [ 'ext' => 'aam', 'mime' => 'application/x-authorware-map' ]
  , [ 'ext' => 'aas', 'mime' => 'application/x-authorware-seg' ]
  , [ 'ext' => 'abc', 'mime' => 'text/vnd.abc' ]
  , [ 'ext' => 'acgi', 'mime' => 'text/html' ]
  , [ 'ext' => 'afl', 'mime' => 'video/animaflex' ]
  , [ 'ext' => 'ai', 'mime' => 'application/postscript' ]
  , [ 'ext' => 'aiff', 'mime' => 'audio/aiff' ]
  , [ 'ext' => 'aif', 'mime' => 'audio/x-aiff' ]
  , [ 'ext' => 'aifc', 'mime' => 'audio/aiff' ]
  , [ 'ext' => 'aifc', 'mime' => 'audio/x-aiff' ]
  , [ 'ext' => 'aiff', 'mime' => 'audio/x-aiff' ]
  , [ 'ext' => 'aim', 'mime' => 'application/x-aim' ]
  , [ 'ext' => 'aip', 'mime' => 'text/x-audiosoft-intra' ]
  , [ 'ext' => 'ani', 'mime' => 'application/x-navi-animation' ]
  , [ 'ext' => 'aos', 'mime' => 'application/x-nokia-9000-communicator-add-on-software' ]
  , [ 'ext' => 'aps', 'mime' => 'application/mime' ]
  , [ 'ext' => 'arc', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'arj', 'mime' => 'application/arj' ]
  , [ 'ext' => 'arj', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'art', 'mime' => 'image/x-jg' ]
  , [ 'ext' => 'asf', 'mime' => 'video/x-ms-asf' ]
  , [ 'ext' => 'asm', 'mime' => 'text/x-asm' ]
  , [ 'ext' => 'asp', 'mime' => 'text/asp' ]
  , [ 'ext' => 'asx', 'mime' => 'application/x-mplayer2' ]
  , [ 'ext' => 'asx', 'mime' => 'video/x-ms-asf' ]
  , [ 'ext' => 'asx', 'mime' => 'video/x-ms-asf-plugin' ]
  , [ 'ext' => 'au', 'mime' => 'audio/basic' ]
  , [ 'ext' => 'au', 'mime' => 'audio/x-au' ]
  , [ 'ext' => 'avi', 'mime' => 'application/x-troff-msvideo' ]
  , [ 'ext' => 'avi', 'mime' => 'video/msvideo' ]
  , [ 'ext' => 'avi', 'mime' => 'video/x-msvideo' ]
  , [ 'ext' => 'avs', 'mime' => 'video/avs-video' ]
  , [ 'ext' => 'bcpio', 'mime' => 'application/x-bcpio' ]
  , [ 'ext' => 'bin', 'mime' => 'application/mac-binary' ]
  , [ 'ext' => 'bin', 'mime' => 'application/macbinary' ]
  , [ 'ext' => 'bin', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'bin', 'mime' => 'application/x-binary' ]
  , [ 'ext' => 'bin', 'mime' => 'application/x-macbinary' ]
  , [ 'ext' => 'bm', 'mime' => 'image/bmp' ]
  , [ 'ext' => 'bmp', 'mime' => 'image/bmp' ]
  , [ 'ext' => 'bmp', 'mime' => 'image/x-windows-bmp' ]
  , [ 'ext' => 'boo', 'mime' => 'application/book' ]
  , [ 'ext' => 'book', 'mime' => 'application/book' ]
  , [ 'ext' => 'boz', 'mime' => 'application/x-bzip2' ]
  , [ 'ext' => 'bsh', 'mime' => 'application/x-bsh' ]
  , [ 'ext' => 'bz', 'mime' => 'application/x-bzip' ]
  , [ 'ext' => 'bz2', 'mime' => 'application/x-bzip2' ]
  , [ 'ext' => 'c', 'mime' => 'text/plain' ]
  , [ 'ext' => 'c', 'mime' => 'text/x-c' ]
  , [ 'ext' => 'c++', 'mime' => 'text/plain' ]
  , [ 'ext' => 'cat', 'mime' => 'application/vnd.ms-pki.seccat' ]
  , [ 'ext' => 'cc', 'mime' => 'text/plain' ]
  , [ 'ext' => 'cc', 'mime' => 'text/x-c' ]
  , [ 'ext' => 'ccad', 'mime' => 'application/clariscad' ]
  , [ 'ext' => 'cco', 'mime' => 'application/x-cocoa' ]
  , [ 'ext' => 'cdf', 'mime' => 'application/cdf' ]
  , [ 'ext' => 'cdf', 'mime' => 'application/x-cdf' ]
  , [ 'ext' => 'cdf', 'mime' => 'application/x-netcdf' ]
  , [ 'ext' => 'cer', 'mime' => 'application/pkix-cert' ]
  , [ 'ext' => 'cer', 'mime' => 'application/x-x509-ca-cert' ]
  , [ 'ext' => 'cha', 'mime' => 'application/x-chat' ]
  , [ 'ext' => 'chat', 'mime' => 'application/x-chat' ]
  , [ 'ext' => 'class', 'mime' => 'application/java' ]
  , [ 'ext' => 'class', 'mime' => 'application/java-byte-code' ]
  , [ 'ext' => 'class', 'mime' => 'application/x-java-class' ]
  , [ 'ext' => 'com', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'com', 'mime' => 'text/plain' ]
  , [ 'ext' => 'conf', 'mime' => 'text/plain' ]
  , [ 'ext' => 'cpio', 'mime' => 'application/x-cpio' ]
  , [ 'ext' => 'cpp', 'mime' => 'text/x-c' ]
  , [ 'ext' => 'cpt', 'mime' => 'application/mac-compactpro' ]
  , [ 'ext' => 'cpt', 'mime' => 'application/x-compactpro' ]
  , [ 'ext' => 'cpt', 'mime' => 'application/x-cpt' ]
  , [ 'ext' => 'crl', 'mime' => 'application/pkcs-crl' ]
  , [ 'ext' => 'crl', 'mime' => 'application/pkix-crl' ]
  , [ 'ext' => 'crt', 'mime' => 'application/pkix-cert' ]
  , [ 'ext' => 'crt', 'mime' => 'application/x-x509-ca-cert' ]
  , [ 'ext' => 'crt', 'mime' => 'application/x-x509-user-cert' ]
  , [ 'ext' => 'csh', 'mime' => 'application/x-csh' ]
  , [ 'ext' => 'csh', 'mime' => 'text/x-script.csh' ]
  , [ 'ext' => 'css', 'mime' => 'text/css' ]
  , [ 'ext' => 'css', 'mime' => 'application/x-pointplus' ]
  , [ 'ext' => 'cxx', 'mime' => 'text/plain' ]
  , [ 'ext' => 'dcr', 'mime' => 'application/x-director' ]
  , [ 'ext' => 'deepv', 'mime' => 'application/x-deepv' ]
  , [ 'ext' => 'def', 'mime' => 'text/plain' ]
  , [ 'ext' => 'der', 'mime' => 'application/x-x509-ca-cert' ]
  , [ 'ext' => 'dif', 'mime' => 'video/x-dv' ]
  , [ 'ext' => 'dir', 'mime' => 'application/x-director' ]
  , [ 'ext' => 'dl', 'mime' => 'video/dl' ]
  , [ 'ext' => 'dl', 'mime' => 'video/x-dl' ]
  , [ 'ext' => 'doc', 'mime' => 'application/msword' ]
  , [ 'ext' => 'dot', 'mime' => 'application/msword' ]
  , [ 'ext' => 'dp', 'mime' => 'application/commonground' ]
  , [ 'ext' => 'drw', 'mime' => 'application/drafting' ]
  , [ 'ext' => 'dump', 'mime' => 'text/plain' ]
  , [ 'ext' => 'dump', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'dv', 'mime' => 'video/x-dv' ]
  , [ 'ext' => 'dvi', 'mime' => 'application/x-dvi' ]
  , [ 'ext' => 'dwf', 'mime' => 'drawing/x-dwf' ]
  , [ 'ext' => 'dwf', 'mime' => 'model/vnd.dwf' ]
  , [ 'ext' => 'dwg', 'mime' => 'application/acad' ]
  , [ 'ext' => 'dwg', 'mime' => 'image/vnd.dwg' ]
  , [ 'ext' => 'dwg', 'mime' => 'image/x-dwg' ]
  , [ 'ext' => 'dxf', 'mime' => 'application/dxf' ]
  , [ 'ext' => 'dxf', 'mime' => 'image/vnd.dwg' ]
  , [ 'ext' => 'dxf', 'mime' => 'image/x-dwg' ]
  , [ 'ext' => 'dxr', 'mime' => 'application/x-director' ]
  , [ 'ext' => 'el', 'mime' => 'text/x-script.elisp' ]
  , [ 'ext' => 'elc', 'mime' => 'application/x-bytecode.elisp' ]
  , [ 'ext' => 'elc', 'mime' => 'application/x-elc' ]
  , [ 'ext' => 'env', 'mime' => 'application/x-envoy' ]
  , [ 'ext' => 'eps', 'mime' => 'application/postscript' ]
  , [ 'ext' => 'es', 'mime' => 'application/x-esrehber' ]
  , [ 'ext' => 'etx', 'mime' => 'text/x-setext' ]
  , [ 'ext' => 'evy', 'mime' => 'application/envoy' ]
  , [ 'ext' => 'evy', 'mime' => 'application/x-envoy' ]
  , [ 'ext' => 'exe', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'f', 'mime' => 'text/plain' ]
  , [ 'ext' => 'f', 'mime' => 'text/x-fortran' ]
  , [ 'ext' => 'f77', 'mime' => 'text/x-fortran' ]
  , [ 'ext' => 'f90', 'mime' => 'text/plain' ]
  , [ 'ext' => 'f90', 'mime' => 'text/x-fortran' ]
  , [ 'ext' => 'fdf', 'mime' => 'application/vnd.fdf' ]
  , [ 'ext' => 'fif', 'mime' => 'application/fractals' ]
  , [ 'ext' => 'fif', 'mime' => 'image/fif' ]
  , [ 'ext' => 'fli', 'mime' => 'video/fli' ]
  , [ 'ext' => 'fli', 'mime' => 'video/x-fli' ]
  , [ 'ext' => 'flo', 'mime' => 'image/florian' ]
  , [ 'ext' => 'flx', 'mime' => 'text/vnd.fmi.flexstor' ]
  , [ 'ext' => 'fmf', 'mime' => 'video/x-atomic3d-feature' ]
  , [ 'ext' => 'for', 'mime' => 'text/plain' ]
  , [ 'ext' => 'for', 'mime' => 'text/x-fortran' ]
  , [ 'ext' => 'fpx', 'mime' => 'image/vnd.fpx' ]
  , [ 'ext' => 'fpx', 'mime' => 'image/vnd.net-fpx' ]
  , [ 'ext' => 'frl', 'mime' => 'application/freeloader' ]
  , [ 'ext' => 'funk', 'mime' => 'audio/make' ]
  , [ 'ext' => 'g', 'mime' => 'text/plain' ]
  , [ 'ext' => 'g3', 'mime' => 'image/g3fax' ]
  , [ 'ext' => 'gif', 'mime' => 'image/gif' ]
  , [ 'ext' => 'gl', 'mime' => 'video/gl' ]
  , [ 'ext' => 'gl', 'mime' => 'video/x-gl' ]
  , [ 'ext' => 'gsd', 'mime' => 'audio/x-gsm' ]
  , [ 'ext' => 'gsm', 'mime' => 'audio/x-gsm' ]
  , [ 'ext' => 'gsp', 'mime' => 'application/x-gsp' ]
  , [ 'ext' => 'gss', 'mime' => 'application/x-gss' ]
  , [ 'ext' => 'gtar', 'mime' => 'application/x-gtar' ]
  , [ 'ext' => 'gz', 'mime' => 'application/x-compressed' ]
  , [ 'ext' => 'gz', 'mime' => 'application/x-gzip' ]
  , [ 'ext' => 'gzip', 'mime' => 'application/x-gzip' ]
  , [ 'ext' => 'gzip', 'mime' => 'multipart/x-gzip' ]
  , [ 'ext' => 'h', 'mime' => 'text/plain' ]
  , [ 'ext' => 'h', 'mime' => 'text/x-h' ]
  , [ 'ext' => 'hdf', 'mime' => 'application/x-hdf' ]
  , [ 'ext' => 'help', 'mime' => 'application/x-helpfile' ]
  , [ 'ext' => 'hgl', 'mime' => 'application/vnd.hp-hpgl' ]
  , [ 'ext' => 'hh', 'mime' => 'text/plain' ]
  , [ 'ext' => 'hh', 'mime' => 'text/x-h' ]
  , [ 'ext' => 'hlb', 'mime' => 'text/x-script' ]
  , [ 'ext' => 'hlp', 'mime' => 'application/hlp' ]
  , [ 'ext' => 'hlp', 'mime' => 'application/x-helpfile' ]
  , [ 'ext' => 'hlp', 'mime' => 'application/x-winhelp' ]
  , [ 'ext' => 'hpg', 'mime' => 'application/vnd.hp-hpgl' ]
  , [ 'ext' => 'hpgl', 'mime' => 'application/vnd.hp-hpgl' ]
  , [ 'ext' => 'hqx', 'mime' => 'application/binhex' ]
  , [ 'ext' => 'hqx', 'mime' => 'application/binhex4' ]
  , [ 'ext' => 'hqx', 'mime' => 'application/mac-binhex' ]
  , [ 'ext' => 'hqx', 'mime' => 'application/mac-binhex40' ]
  , [ 'ext' => 'hqx', 'mime' => 'application/x-binhex40' ]
  , [ 'ext' => 'hqx', 'mime' => 'application/x-mac-binhex40' ]
  , [ 'ext' => 'hta', 'mime' => 'application/hta' ]
  , [ 'ext' => 'htc', 'mime' => 'text/x-component' ]
  , [ 'ext' => 'htm', 'mime' => 'text/html' ]
  , [ 'ext' => 'htmls', 'mime' => 'text/html' ]
  , [ 'ext' => 'htt', 'mime' => 'text/webviewhtml' ]
  , [ 'ext' => 'htx', 'mime' => 'text/html' ]
  , [ 'ext' => 'ice', 'mime' => 'x-conference/x-cooltalk' ]
  , [ 'ext' => 'ico', 'mime' => 'image/x-icon' ]
  , [ 'ext' => 'idc', 'mime' => 'text/plain' ]
  , [ 'ext' => 'ief', 'mime' => 'image/ief' ]
  , [ 'ext' => 'iefs', 'mime' => 'image/ief' ]
  , [ 'ext' => 'iges', 'mime' => 'application/iges' ]
  , [ 'ext' => 'iges', 'mime' => 'model/iges' ]
  , [ 'ext' => 'igs', 'mime' => 'application/iges' ]
  , [ 'ext' => 'igs', 'mime' => 'model/iges' ]
  , [ 'ext' => 'ima', 'mime' => 'application/x-ima' ]
  , [ 'ext' => 'imap', 'mime' => 'application/x-httpd-imap' ]
  , [ 'ext' => 'inf', 'mime' => 'application/inf' ]
  , [ 'ext' => 'ins', 'mime' => 'application/x-internett-signup' ]
  , [ 'ext' => 'ip', 'mime' => 'application/x-ip2' ]
  , [ 'ext' => 'isu', 'mime' => 'video/x-isvideo' ]
  , [ 'ext' => 'it', 'mime' => 'audio/it' ]
  , [ 'ext' => 'iv', 'mime' => 'application/x-inventor' ]
  , [ 'ext' => 'ivr', 'mime' => 'i-world/i-vrml' ]
  , [ 'ext' => 'ivy', 'mime' => 'application/x-livescreen' ]
  , [ 'ext' => 'jam', 'mime' => 'audio/x-jam' ]
  , [ 'ext' => 'jav', 'mime' => 'text/plain' ]
  , [ 'ext' => 'jav', 'mime' => 'text/x-java-source' ]
  , [ 'ext' => 'java', 'mime' => 'text/plain' ]
  , [ 'ext' => 'java', 'mime' => 'text/x-java-source' ]
  , [ 'ext' => 'jcm', 'mime' => 'application/x-java-commerce' ]
  , [ 'ext' => 'jpg', 'mime' => 'image/pjpeg' ]
  , [ 'ext' => 'jpeg', 'mime' => 'image/jpeg' ]
  , [ 'ext' => 'jpeg', 'mime' => 'image/pjpeg' ]
  , [ 'ext' => 'jfif', 'mime' => 'image/jpeg' ]
  , [ 'ext' => 'jfif', 'mime' => 'image/pjpeg' ]
  , [ 'ext' => 'jpe', 'mime' => 'image/jpeg' ]
  , [ 'ext' => 'jfif-tbnl', 'mime' => 'image/jpeg' ]
  , [ 'ext' => 'jpe', 'mime' => 'image/pjpeg' ]
  , [ 'ext' => 'jps', 'mime' => 'image/x-jps' ]
  , [ 'ext' => 'js', 'mime' => 'application/x-javascript' ]
  , [ 'ext' => 'js', 'mime' => 'application/ecmascript' ]
  , [ 'ext' => 'js', 'mime' => 'text/javascript' ]
  , [ 'ext' => 'js', 'mime' => 'text/ecmascript' ]
  , [ 'ext' => 'json', 'mime' => 'application/json' ]
  , [ 'ext' => 'jut', 'mime' => 'image/jutvision' ]
  , [ 'ext' => 'kar', 'mime' => 'audio/midi' ]
  , [ 'ext' => 'kar', 'mime' => 'music/x-karaoke' ]
  , [ 'ext' => 'ksh', 'mime' => 'application/x-ksh' ]
  , [ 'ext' => 'ksh', 'mime' => 'text/x-script.ksh' ]
  , [ 'ext' => 'la', 'mime' => 'audio/nspaudio' ]
  , [ 'ext' => 'la', 'mime' => 'audio/x-nspaudio' ]
  , [ 'ext' => 'lam', 'mime' => 'audio/x-liveaudio' ]
  , [ 'ext' => 'latex', 'mime' => 'application/x-latex' ]
  , [ 'ext' => 'lha', 'mime' => 'application/lha' ]
  , [ 'ext' => 'lha', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'lha', 'mime' => 'application/x-lha' ]
  , [ 'ext' => 'lhx', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'list', 'mime' => 'text/plain' ]
  , [ 'ext' => 'lma', 'mime' => 'audio/nspaudio' ]
  , [ 'ext' => 'lma', 'mime' => 'audio/x-nspaudio' ]
  , [ 'ext' => 'log', 'mime' => 'text/plain' ]
  , [ 'ext' => 'lsp', 'mime' => 'application/x-lisp' ]
  , [ 'ext' => 'lsp', 'mime' => 'text/x-script.lisp' ]
  , [ 'ext' => 'lst', 'mime' => 'text/plain' ]
  , [ 'ext' => 'lsx', 'mime' => 'text/x-la-asf' ]
  , [ 'ext' => 'ltx', 'mime' => 'application/x-latex' ]
  , [ 'ext' => 'lzh', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'lzh', 'mime' => 'application/x-lzh' ]
  , [ 'ext' => 'lzx', 'mime' => 'application/lzx' ]
  , [ 'ext' => 'lzx', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'lzx', 'mime' => 'application/x-lzx' ]
  , [ 'ext' => 'm', 'mime' => 'text/plain' ]
  , [ 'ext' => 'm', 'mime' => 'text/x-m' ]
  , [ 'ext' => 'm1v', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'm2a', 'mime' => 'audio/mpeg' ]
  , [ 'ext' => 'm2v', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'm3u', 'mime' => 'audio/x-mpequrl' ]
  , [ 'ext' => 'man', 'mime' => 'application/x-troff-man' ]
  , [ 'ext' => 'map', 'mime' => 'application/json' ]
  , [ 'ext' => 'map', 'mime' => 'application/x-navimap' ]
  , [ 'ext' => 'mar', 'mime' => 'text/plain' ]
  , [ 'ext' => 'mbd', 'mime' => 'application/mbedlet' ]
  , [ 'ext' => 'mc$', 'mime' => 'application/x-magic-cap-package-1.0' ]
  , [ 'ext' => 'mcd', 'mime' => 'application/mcad' ]
  , [ 'ext' => 'mcd', 'mime' => 'application/x-mathcad' ]
  , [ 'ext' => 'mcf', 'mime' => 'image/vasa' ]
  , [ 'ext' => 'mcf', 'mime' => 'text/mcf' ]
  , [ 'ext' => 'mcp', 'mime' => 'application/netmc' ]
  , [ 'ext' => 'me', 'mime' => 'application/x-troff-me' ]
  , [ 'ext' => 'mht', 'mime' => 'message/rfc822' ]
  , [ 'ext' => 'mhtml', 'mime' => 'message/rfc822' ]
  , [ 'ext' => 'mid', 'mime' => 'application/x-midi' ]
  , [ 'ext' => 'mid', 'mime' => 'audio/midi' ]
  , [ 'ext' => 'mid', 'mime' => 'audio/x-mid' ]
  , [ 'ext' => 'mid', 'mime' => 'audio/x-midi' ]
  , [ 'ext' => 'mid', 'mime' => 'music/crescendo' ]
  , [ 'ext' => 'mid', 'mime' => 'x-music/x-midi' ]
  , [ 'ext' => 'midi', 'mime' => 'application/x-midi' ]
  , [ 'ext' => 'midi', 'mime' => 'audio/midi' ]
  , [ 'ext' => 'midi', 'mime' => 'audio/x-mid' ]
  , [ 'ext' => 'midi', 'mime' => 'audio/x-midi' ]
  , [ 'ext' => 'midi', 'mime' => 'music/crescendo' ]
  , [ 'ext' => 'midi', 'mime' => 'x-music/x-midi' ]
  , [ 'ext' => 'mif', 'mime' => 'application/x-frame' ]
  , [ 'ext' => 'mif', 'mime' => 'application/x-mif' ]
  , [ 'ext' => 'mime', 'mime' => 'message/rfc822' ]
  , [ 'ext' => 'mime', 'mime' => 'www/mime' ]
  , [ 'ext' => 'mjf', 'mime' => 'audio/x-vnd.audioexplosion.mjuicemediafile' ]
  , [ 'ext' => 'mjpg', 'mime' => 'video/x-motion-jpeg' ]
  , [ 'ext' => 'mm', 'mime' => 'application/base64' ]
  , [ 'ext' => 'mm', 'mime' => 'application/x-meme' ]
  , [ 'ext' => 'mme', 'mime' => 'application/base64' ]
  , [ 'ext' => 'mod', 'mime' => 'audio/mod' ]
  , [ 'ext' => 'mod', 'mime' => 'audio/x-mod' ]
  , [ 'ext' => 'moov', 'mime' => 'video/quicktime' ]
  , [ 'ext' => 'mov', 'mime' => 'video/quicktime' ]
  , [ 'ext' => 'movie', 'mime' => 'video/x-sgi-movie' ]
  , [ 'ext' => 'mp2', 'mime' => 'audio/mpeg' ]
  , [ 'ext' => 'mp2', 'mime' => 'audio/x-mpeg' ]
  , [ 'ext' => 'mp2', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'mp2', 'mime' => 'video/x-mpeg' ]
  , [ 'ext' => 'mp2', 'mime' => 'video/x-mpeq2a' ]
  , [ 'ext' => 'mp3', 'mime' => 'audio/mpeg3' ]
  , [ 'ext' => 'mp3', 'mime' => 'audio/x-mpeg-3' ]
  , [ 'ext' => 'mp3', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'mp3', 'mime' => 'video/x-mpeg' ]
  , [ 'ext' => 'mpa', 'mime' => 'audio/mpeg' ]
  , [ 'ext' => 'mpa', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'mpc', 'mime' => 'application/x-project' ]
  , [ 'ext' => 'mpe', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'mpeg', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'mpg', 'mime' => 'audio/mpeg' ]
  , [ 'ext' => 'mpg', 'mime' => 'video/mpeg' ]
  , [ 'ext' => 'mpga', 'mime' => 'audio/mpeg' ]
  , [ 'ext' => 'mpp', 'mime' => 'application/vnd.ms-project' ]
  , [ 'ext' => 'mpt', 'mime' => 'application/x-project' ]
  , [ 'ext' => 'mpv', 'mime' => 'application/x-project' ]
  , [ 'ext' => 'mpx', 'mime' => 'application/x-project' ]
  , [ 'ext' => 'mrc', 'mime' => 'application/marc' ]
  , [ 'ext' => 'ms', 'mime' => 'application/x-troff-ms' ]
  , [ 'ext' => 'mv', 'mime' => 'video/x-sgi-movie' ]
  , [ 'ext' => 'my', 'mime' => 'audio/make' ]
  , [ 'ext' => 'mzz', 'mime' => 'application/x-vnd.audioexplosion.mzz' ]
  , [ 'ext' => 'nap', 'mime' => 'image/naplps' ]
  , [ 'ext' => 'naplps', 'mime' => 'image/naplps' ]
  , [ 'ext' => 'nc', 'mime' => 'application/x-netcdf' ]
  , [ 'ext' => 'ncm', 'mime' => 'application/vnd.nokia.configuration-message' ]
  , [ 'ext' => 'nif', 'mime' => 'image/x-niff' ]
  , [ 'ext' => 'niff', 'mime' => 'image/x-niff' ]
  , [ 'ext' => 'nix', 'mime' => 'application/x-mix-transfer' ]
  , [ 'ext' => 'nsc', 'mime' => 'application/x-conference' ]
  , [ 'ext' => 'nvd', 'mime' => 'application/x-navidoc' ]
  , [ 'ext' => 'o', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'oda', 'mime' => 'application/oda' ]
  , [ 'ext' => 'omc', 'mime' => 'application/x-omc' ]
  , [ 'ext' => 'omcd', 'mime' => 'application/x-omcdatamaker' ]
  , [ 'ext' => 'omcr', 'mime' => 'application/x-omcregerator' ]
  , [ 'ext' => 'p', 'mime' => 'text/x-pascal' ]
  , [ 'ext' => 'p10', 'mime' => 'application/pkcs10' ]
  , [ 'ext' => 'p10', 'mime' => 'application/x-pkcs10' ]
  , [ 'ext' => 'p12', 'mime' => 'application/pkcs-12' ]
  , [ 'ext' => 'p12', 'mime' => 'application/x-pkcs12' ]
  , [ 'ext' => 'p7a', 'mime' => 'application/x-pkcs7-signature' ]
  , [ 'ext' => 'p7c', 'mime' => 'application/pkcs7-mime' ]
  , [ 'ext' => 'p7c', 'mime' => 'application/x-pkcs7-mime' ]
  , [ 'ext' => 'p7m', 'mime' => 'application/pkcs7-mime' ]
  , [ 'ext' => 'p7m', 'mime' => 'application/x-pkcs7-mime' ]
  , [ 'ext' => 'p7r', 'mime' => 'application/x-pkcs7-certreqresp' ]
  , [ 'ext' => 'p7s', 'mime' => 'application/pkcs7-signature' ]
  , [ 'ext' => 'part', 'mime' => 'application/pro_eng' ]
  , [ 'ext' => 'pas', 'mime' => 'text/pascal' ]
  , [ 'ext' => 'pbm', 'mime' => 'image/x-portable-bitmap' ]
  , [ 'ext' => 'pcl', 'mime' => 'application/vnd.hp-pcl' ]
  , [ 'ext' => 'pcl', 'mime' => 'application/x-pcl' ]
  , [ 'ext' => 'pct', 'mime' => 'image/x-pict' ]
  , [ 'ext' => 'pcx', 'mime' => 'image/x-pcx' ]
  , [ 'ext' => 'pdb', 'mime' => 'chemical/x-pdb' ]
  , [ 'ext' => 'pdf', 'mime' => 'application/pdf' ]
  , [ 'ext' => 'pfunk', 'mime' => 'audio/make' ]
  , [ 'ext' => 'pfunk', 'mime' => 'audio/make.my.funk' ]
  , [ 'ext' => 'pgm', 'mime' => 'image/x-portable-graymap' ]
  , [ 'ext' => 'pgm', 'mime' => 'image/x-portable-greymap' ]
  , [ 'ext' => 'pic', 'mime' => 'image/pict' ]
  , [ 'ext' => 'pict', 'mime' => 'image/pict' ]
  , [ 'ext' => 'pkg', 'mime' => 'application/x-newton-compatible-pkg' ]
  , [ 'ext' => 'pko', 'mime' => 'application/vnd.ms-pki.pko' ]
  , [ 'ext' => 'pl', 'mime' => 'text/plain' ]
  , [ 'ext' => 'pl', 'mime' => 'text/x-script.perl' ]
  , [ 'ext' => 'plx', 'mime' => 'application/x-pixclscript' ]
  , [ 'ext' => 'pm', 'mime' => 'image/x-xpixmap' ]
  , [ 'ext' => 'pm', 'mime' => 'text/x-script.perl-module' ]
  , [ 'ext' => 'pm4', 'mime' => 'application/x-pagemaker' ]
  , [ 'ext' => 'pm5', 'mime' => 'application/x-pagemaker' ]
  , [ 'ext' => 'png', 'mime' => 'image/png' ]
  , [ 'ext' => 'pnm', 'mime' => 'application/x-portable-anymap' ]
  , [ 'ext' => 'pnm', 'mime' => 'image/x-portable-anymap' ]
  , [ 'ext' => 'pot', 'mime' => 'application/mspowerpoint' ]
  , [ 'ext' => 'pot', 'mime' => 'application/vnd.ms-powerpoint' ]
  , [ 'ext' => 'pov', 'mime' => 'model/x-pov' ]
  , [ 'ext' => 'ppa', 'mime' => 'application/vnd.ms-powerpoint' ]
  , [ 'ext' => 'ppm', 'mime' => 'image/x-portable-pixmap' ]
  , [ 'ext' => 'pps', 'mime' => 'application/mspowerpoint' ]
  , [ 'ext' => 'pps', 'mime' => 'application/vnd.ms-powerpoint' ]
  , [ 'ext' => 'ppt', 'mime' => 'application/mspowerpoint' ]
  , [ 'ext' => 'ppt', 'mime' => 'application/powerpoint' ]
  , [ 'ext' => 'ppt', 'mime' => 'application/vnd.ms-powerpoint' ]
  , [ 'ext' => 'ppt', 'mime' => 'application/x-mspowerpoint' ]
  , [ 'ext' => 'ppz', 'mime' => 'application/mspowerpoint' ]
  , [ 'ext' => 'pre', 'mime' => 'application/x-freelance' ]
  , [ 'ext' => 'prt', 'mime' => 'application/pro_eng' ]
  , [ 'ext' => 'ps', 'mime' => 'application/postscript' ]
  , [ 'ext' => 'psd', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'psd', 'mime' => 'image/vnd.adobe.photoshop' ]
  , [ 'ext' => 'psd', 'mime' => 'application/x-photoshop' ]
  , [ 'ext' => 'psd', 'mime' => 'application/psd' ]
  , [ 'ext' => 'psd', 'mime' => 'image/psd' ]
  , [ 'ext' => 'pvu', 'mime' => 'paleovu/x-pv' ]
  , [ 'ext' => 'pwz', 'mime' => 'application/vnd.ms-powerpoint' ]
  , [ 'ext' => 'py', 'mime' => 'text/x-script.phyton' ]
  , [ 'ext' => 'pyc', 'mime' => 'application/x-bytecode.python' ]
  , [ 'ext' => 'qcp', 'mime' => 'audio/vnd.qcelp' ]
  , [ 'ext' => 'qd3', 'mime' => 'x-world/x-3dmf' ]
  , [ 'ext' => 'qd3d', 'mime' => 'x-world/x-3dmf' ]
  , [ 'ext' => 'qif', 'mime' => 'image/x-quicktime' ]
  , [ 'ext' => 'qt', 'mime' => 'video/quicktime' ]
  , [ 'ext' => 'qtc', 'mime' => 'video/x-qtc' ]
  , [ 'ext' => 'qti', 'mime' => 'image/x-quicktime' ]
  , [ 'ext' => 'qtif', 'mime' => 'image/x-quicktime' ]
  , [ 'ext' => 'ra', 'mime' => 'audio/x-pn-realaudio' ]
  , [ 'ext' => 'ra', 'mime' => 'audio/x-pn-realaudio-plugin' ]
  , [ 'ext' => 'ra', 'mime' => 'audio/x-realaudio' ]
  , [ 'ext' => 'ram', 'mime' => 'audio/x-pn-realaudio' ]
  , [ 'ext' => 'ras', 'mime' => 'application/x-cmu-raster' ]
  , [ 'ext' => 'ras', 'mime' => 'image/cmu-raster' ]
  , [ 'ext' => 'ras', 'mime' => 'image/x-cmu-raster' ]
  , [ 'ext' => 'rast', 'mime' => 'image/cmu-raster' ]
  , [ 'ext' => 'rexx', 'mime' => 'text/x-script.rexx' ]
  , [ 'ext' => 'rf', 'mime' => 'image/vnd.rn-realflash' ]
  , [ 'ext' => 'rgb', 'mime' => 'image/x-rgb' ]
  , [ 'ext' => 'rm', 'mime' => 'application/vnd.rn-realmedia' ]
  , [ 'ext' => 'rm', 'mime' => 'audio/x-pn-realaudio' ]
  , [ 'ext' => 'rmi', 'mime' => 'audio/mid' ]
  , [ 'ext' => 'rmm', 'mime' => 'audio/x-pn-realaudio' ]
  , [ 'ext' => 'rmp', 'mime' => 'audio/x-pn-realaudio' ]
  , [ 'ext' => 'rmp', 'mime' => 'audio/x-pn-realaudio-plugin' ]
  , [ 'ext' => 'rng', 'mime' => 'application/ringing-tones' ]
  , [ 'ext' => 'rng', 'mime' => 'application/vnd.nokia.ringing-tone' ]
  , [ 'ext' => 'rnx', 'mime' => 'application/vnd.rn-realplayer' ]
  , [ 'ext' => 'roff', 'mime' => 'application/x-troff' ]
  , [ 'ext' => 'rp', 'mime' => 'image/vnd.rn-realpix' ]
  , [ 'ext' => 'rpm', 'mime' => 'audio/x-pn-realaudio-plugin' ]
  , [ 'ext' => 'rt', 'mime' => 'text/richtext' ]
  , [ 'ext' => 'rt', 'mime' => 'text/vnd.rn-realtext' ]
  , [ 'ext' => 'rtf', 'mime' => 'application/x-rtf' ]
  , [ 'ext' => 'rtf', 'mime' => 'text/richtext' ]
  , [ 'ext' => 'rtx', 'mime' => 'application/rtf' ]
  , [ 'ext' => 'rtx', 'mime' => 'text/richtext' ]
  , [ 'ext' => 'rv', 'mime' => 'video/vnd.rn-realvideo' ]
  , [ 'ext' => 's', 'mime' => 'text/x-asm' ]
  , [ 'ext' => 's3m', 'mime' => 'audio/s3m' ]
  , [ 'ext' => 'saveme', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'sbk', 'mime' => 'application/x-tbook' ]
  , [ 'ext' => 'scm', 'mime' => 'application/x-lotusscreencam' ]
  , [ 'ext' => 'scm', 'mime' => 'text/x-script.guile' ]
  , [ 'ext' => 'scm', 'mime' => 'text/x-script.scheme' ]
  , [ 'ext' => 'scm', 'mime' => 'video/x-scm' ]
  , [ 'ext' => 'sdml', 'mime' => 'text/plain' ]
  , [ 'ext' => 'sdp', 'mime' => 'application/sdp' ]
  , [ 'ext' => 'sdp', 'mime' => 'application/x-sdp' ]
  , [ 'ext' => 'sdr', 'mime' => 'application/sounder' ]
  , [ 'ext' => 'sea', 'mime' => 'application/sea' ]
  , [ 'ext' => 'sea', 'mime' => 'application/x-sea' ]
  , [ 'ext' => 'set', 'mime' => 'application/set' ]
  , [ 'ext' => 'sgm', 'mime' => 'text/sgml' ]
  , [ 'ext' => 'sgm', 'mime' => 'text/x-sgml' ]
  , [ 'ext' => 'sgml', 'mime' => 'text/sgml' ]
  , [ 'ext' => 'sgml', 'mime' => 'text/x-sgml' ]
  , [ 'ext' => 'sh', 'mime' => 'application/x-bsh' ]
  , [ 'ext' => 'sh', 'mime' => 'application/x-sh' ]
  , [ 'ext' => 'sh', 'mime' => 'application/x-shar' ]
  , [ 'ext' => 'sh', 'mime' => 'text/x-script.sh' ]
  , [ 'ext' => 'shar', 'mime' => 'application/x-bsh' ]
  , [ 'ext' => 'shar', 'mime' => 'application/x-shar' ]
  , [ 'ext' => 'shtml', 'mime' => 'text/html' ]
  , [ 'ext' => 'shtml', 'mime' => 'text/x-server-parsed-html' ]
  , [ 'ext' => 'sid', 'mime' => 'audio/x-psid' ]
  , [ 'ext' => 'sit', 'mime' => 'application/x-sit' ]
  , [ 'ext' => 'sit', 'mime' => 'application/x-stuffit' ]
  , [ 'ext' => 'skd', 'mime' => 'application/x-koan' ]
  , [ 'ext' => 'skm', 'mime' => 'application/x-koan' ]
  , [ 'ext' => 'skp', 'mime' => 'application/x-koan' ]
  , [ 'ext' => 'skt', 'mime' => 'application/x-koan' ]
  , [ 'ext' => 'sl', 'mime' => 'application/x-seelogo' ]
  , [ 'ext' => 'smi', 'mime' => 'application/smil' ]
  , [ 'ext' => 'smil', 'mime' => 'application/smil' ]
  , [ 'ext' => 'snd', 'mime' => 'audio/basic' ]
  , [ 'ext' => 'snd', 'mime' => 'audio/x-adpcm' ]
  , [ 'ext' => 'sol', 'mime' => 'application/solids' ]
  , [ 'ext' => 'spc', 'mime' => 'application/x-pkcs7-certificates' ]
  , [ 'ext' => 'spc', 'mime' => 'text/x-speech' ]
  , [ 'ext' => 'spl', 'mime' => 'application/futuresplash' ]
  , [ 'ext' => 'spr', 'mime' => 'application/x-sprite' ]
  , [ 'ext' => 'sprite', 'mime' => 'application/x-sprite' ]
  , [ 'ext' => 'src', 'mime' => 'application/x-wais-source' ]
  , [ 'ext' => 'ssi', 'mime' => 'text/x-server-parsed-html' ]
  , [ 'ext' => 'ssm', 'mime' => 'application/streamingmedia' ]
  , [ 'ext' => 'sst', 'mime' => 'application/vnd.ms-pki.certstore' ]
  , [ 'ext' => 'step', 'mime' => 'application/step' ]
  , [ 'ext' => 'stl', 'mime' => 'application/sla' ]
  , [ 'ext' => 'stl', 'mime' => 'application/vnd.ms-pki.stl' ]
  , [ 'ext' => 'stl', 'mime' => 'application/x-navistyle' ]
  , [ 'ext' => 'stp', 'mime' => 'application/step' ]
  , [ 'ext' => 'sv4cpio', 'mime' => 'application/x-sv4cpio' ]
  , [ 'ext' => 'sv4crc', 'mime' => 'application/x-sv4crc' ]
  , [ 'ext' => 'svf', 'mime' => 'image/vnd.dwg' ]
  , [ 'ext' => 'svf', 'mime' => 'image/x-dwg' ]
  , [ 'ext' => 'svg', 'mime' => 'image/svg+xml' ]
  , [ 'ext' => 'svr', 'mime' => 'application/x-world' ]
  , [ 'ext' => 'svr', 'mime' => 'x-world/x-svr' ]
  , [ 'ext' => 'swf', 'mime' => 'application/x-shockwave-flash' ]
  , [ 'ext' => 't', 'mime' => 'application/x-troff' ]
  , [ 'ext' => 'talk', 'mime' => 'text/x-speech' ]
  , [ 'ext' => 'tar', 'mime' => 'application/x-tar' ]
  , [ 'ext' => 'tbk', 'mime' => 'application/toolbook' ]
  , [ 'ext' => 'tbk', 'mime' => 'application/x-tbook' ]
  , [ 'ext' => 'tcl', 'mime' => 'application/x-tcl' ]
  , [ 'ext' => 'tcl', 'mime' => 'text/x-script.tcl' ]
  , [ 'ext' => 'tcsh', 'mime' => 'text/x-script.tcsh' ]
  , [ 'ext' => 'tex', 'mime' => 'application/x-tex' ]
  , [ 'ext' => 'texi', 'mime' => 'application/x-texinfo' ]
  , [ 'ext' => 'texinfo', 'mime' => 'application/x-texinfo' ]
  , [ 'ext' => 'text', 'mime' => 'application/plain' ]
  , [ 'ext' => 'text', 'mime' => 'text/plain' ]
  , [ 'ext' => 'tgz', 'mime' => 'application/gnutar' ]
  , [ 'ext' => 'tgz', 'mime' => 'application/x-compressed' ]
  , [ 'ext' => 'tif', 'mime' => 'image/tiff' ]
  , [ 'ext' => 'tif', 'mime' => 'image/x-tiff' ]
  , [ 'ext' => 'tiff', 'mime' => 'image/x-tiff' ]
  , [ 'ext' => 'tr', 'mime' => 'application/x-troff' ]
  , [ 'ext' => 'tsi', 'mime' => 'audio/tsp-audio' ]
  , [ 'ext' => 'tsp', 'mime' => 'application/dsptype' ]
  , [ 'ext' => 'tsp', 'mime' => 'audio/tsplayer' ]
  , [ 'ext' => 'tsv', 'mime' => 'text/tab-separated-values' ]
  , [ 'ext' => 'turbot', 'mime' => 'image/florian' ]
  , [ 'ext' => 'uil', 'mime' => 'text/x-uil' ]
  , [ 'ext' => 'uni', 'mime' => 'text/uri-list' ]
  , [ 'ext' => 'unis', 'mime' => 'text/uri-list' ]
  , [ 'ext' => 'unv', 'mime' => 'application/i-deas' ]
  , [ 'ext' => 'uri', 'mime' => 'text/uri-list' ]
  , [ 'ext' => 'uris', 'mime' => 'text/uri-list' ]
  , [ 'ext' => 'ustar', 'mime' => 'application/x-ustar' ]
  , [ 'ext' => 'ustar', 'mime' => 'multipart/x-ustar' ]
  , [ 'ext' => 'uu', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'uu', 'mime' => 'text/x-uuencode' ]
  , [ 'ext' => 'uue', 'mime' => 'text/x-uuencode' ]
  , [ 'ext' => 'vcd', 'mime' => 'application/x-cdlink' ]
  , [ 'ext' => 'vcs', 'mime' => 'text/x-vcalendar' ]
  , [ 'ext' => 'vda', 'mime' => 'application/vda' ]
  , [ 'ext' => 'vdo', 'mime' => 'video/vdo' ]
  , [ 'ext' => 'vew', 'mime' => 'application/groupwise' ]
  , [ 'ext' => 'viv', 'mime' => 'video/vivo' ]
  , [ 'ext' => 'viv', 'mime' => 'video/vnd.vivo' ]
  , [ 'ext' => 'vivo', 'mime' => 'video/vivo' ]
  , [ 'ext' => 'vivo', 'mime' => 'video/vnd.vivo' ]
  , [ 'ext' => 'vmd', 'mime' => 'application/vocaltec-media-desc' ]
  , [ 'ext' => 'vmf', 'mime' => 'application/vocaltec-media-file' ]
  , [ 'ext' => 'voc', 'mime' => 'audio/voc' ]
  , [ 'ext' => 'voc', 'mime' => 'audio/x-voc' ]
  , [ 'ext' => 'vos', 'mime' => 'video/vosaic' ]
  , [ 'ext' => 'vox', 'mime' => 'audio/voxware' ]
  , [ 'ext' => 'vqe', 'mime' => 'audio/x-twinvq-plugin' ]
  , [ 'ext' => 'vqf', 'mime' => 'audio/x-twinvq' ]
  , [ 'ext' => 'vql', 'mime' => 'audio/x-twinvq-plugin' ]
  , [ 'ext' => 'vrml', 'mime' => 'application/x-vrml' ]
  , [ 'ext' => 'vrml', 'mime' => 'model/vrml' ]
  , [ 'ext' => 'vrml', 'mime' => 'x-world/x-vrml' ]
  , [ 'ext' => 'vrt', 'mime' => 'x-world/x-vrt' ]
  , [ 'ext' => 'vsd', 'mime' => 'application/x-visio' ]
  , [ 'ext' => 'vst', 'mime' => 'application/x-visio' ]
  , [ 'ext' => 'vsw', 'mime' => 'application/x-visio' ]
  , [ 'ext' => 'w60', 'mime' => 'application/wordperfect6.0' ]
  , [ 'ext' => 'w61', 'mime' => 'application/wordperfect6.1' ]
  , [ 'ext' => 'w6w', 'mime' => 'application/msword' ]
  , [ 'ext' => 'wav', 'mime' => 'audio/wav' ]
  , [ 'ext' => 'wav', 'mime' => 'audio/x-wav' ]
  , [ 'ext' => 'wb1', 'mime' => 'application/x-qpro' ]
  , [ 'ext' => 'wbmp', 'mime' => 'image/vnd.wap.wbmp' ]
  , [ 'ext' => 'web', 'mime' => 'application/vnd.xara' ]
  , [ 'ext' => 'wiz', 'mime' => 'application/msword' ]
  , [ 'ext' => 'wk1', 'mime' => 'application/x-123' ]
  , [ 'ext' => 'wmf', 'mime' => 'windows/metafile' ]
  , [ 'ext' => 'wml', 'mime' => 'text/vnd.wap.wml' ]
  , [ 'ext' => 'wmlc', 'mime' => 'application/vnd.wap.wmlc' ]
  , [ 'ext' => 'wmls', 'mime' => 'text/vnd.wap.wmlscript' ]
  , [ 'ext' => 'wmlsc', 'mime' => 'application/vnd.wap.wmlscriptc' ]
  , [ 'ext' => 'word', 'mime' => 'application/msword' ]
  , [ 'ext' => 'wp', 'mime' => 'application/wordperfect' ]
  , [ 'ext' => 'wp5', 'mime' => 'application/wordperfect' ]
  , [ 'ext' => 'wp5', 'mime' => 'application/wordperfect6.0' ]
  , [ 'ext' => 'wp6', 'mime' => 'application/wordperfect' ]
  , [ 'ext' => 'wpd', 'mime' => 'application/wordperfect' ]
  , [ 'ext' => 'wpd', 'mime' => 'application/x-wpwin' ]
  , [ 'ext' => 'wq1', 'mime' => 'application/x-lotus' ]
  , [ 'ext' => 'wri', 'mime' => 'application/mswrite' ]
  , [ 'ext' => 'wri', 'mime' => 'application/x-wri' ]
  , [ 'ext' => 'wrl', 'mime' => 'application/x-world' ]
  , [ 'ext' => 'wrl', 'mime' => 'model/vrml' ]
  , [ 'ext' => 'wrl', 'mime' => 'x-world/x-vrml' ]
  , [ 'ext' => 'wrz', 'mime' => 'model/vrml' ]
  , [ 'ext' => 'wrz', 'mime' => 'x-world/x-vrml' ]
  , [ 'ext' => 'wsc', 'mime' => 'text/scriplet' ]
  , [ 'ext' => 'wsrc', 'mime' => 'application/x-wais-source' ]
  , [ 'ext' => 'wtk', 'mime' => 'application/x-wintalk' ]
  , [ 'ext' => 'xbm', 'mime' => 'image/x-xbitmap' ]
  , [ 'ext' => 'xbm', 'mime' => 'image/x-xbm' ]
  , [ 'ext' => 'xbm', 'mime' => 'image/xbm' ]
  , [ 'ext' => 'xdr', 'mime' => 'video/x-amt-demorun' ]
  , [ 'ext' => 'xgz', 'mime' => 'xgl/drawing' ]
  , [ 'ext' => 'xif', 'mime' => 'image/vnd.xiff' ]
  , [ 'ext' => 'xl', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xla', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xla', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xla', 'mime' => 'application/x-msexcel' ]
  , [ 'ext' => 'xlb', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlb', 'mime' => 'application/vnd.ms-excel' ]
  , [ 'ext' => 'xlb', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xlc', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlc', 'mime' => 'application/vnd.ms-excel' ]
  , [ 'ext' => 'xlc', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xld', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xld', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xlk', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlk', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xll', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xll', 'mime' => 'application/vnd.ms-excel' ]
  , [ 'ext' => 'xll', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xlm', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlm', 'mime' => 'application/vnd.ms-excel' ]
  , [ 'ext' => 'xlm', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xls', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xls', 'mime' => 'application/vnd.ms-excel' ]
  , [ 'ext' => 'xls', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xls', 'mime' => 'application/x-msexcel' ]
  , [ 'ext' => 'xlt', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlt', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xlv', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlv', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xlw', 'mime' => 'application/excel' ]
  , [ 'ext' => 'xlw', 'mime' => 'application/vnd.ms-excel' ]
  , [ 'ext' => 'xlw', 'mime' => 'application/x-excel' ]
  , [ 'ext' => 'xlw', 'mime' => 'application/x-msexcel' ]
  , [ 'ext' => 'xm', 'mime' => 'audio/xm' ]
  , [ 'ext' => 'xml', 'mime' => 'application/xml' ]
  , [ 'ext' => 'xml', 'mime' => 'text/xml' ]
  , [ 'ext' => 'xmz', 'mime' => 'xgl/movie' ]
  , [ 'ext' => 'xpix', 'mime' => 'application/x-vnd.ls-xpix' ]
  , [ 'ext' => 'xpm', 'mime' => 'image/x-xpixmap' ]
  , [ 'ext' => 'xpm', 'mime' => 'image/xpm' ]
  , [ 'ext' => 'x-png', 'mime' => 'image/png' ]
  , [ 'ext' => 'xsr', 'mime' => 'video/x-amt-showrun' ]
  , [ 'ext' => 'xwd', 'mime' => 'image/x-xwd' ]
  , [ 'ext' => 'xwd', 'mime' => 'image/x-xwindowdump' ]
  , [ 'ext' => 'xyz', 'mime' => 'chemical/x-pdb' ]
  , [ 'ext' => 'yml', 'mime' => 'application/yaml' ]
  , [ 'ext' => 'yml', 'mime' => 'text/x-yaml' ]
  , [ 'ext' => 'yml', 'mime' => 'text/yaml' ]
  , [ 'ext' => 'z', 'mime' => 'application/x-compress' ]
  , [ 'ext' => 'z', 'mime' => 'application/x-compressed' ]
  , [ 'ext' => 'zip', 'mime' => 'application/x-compressed' ]
  , [ 'ext' => 'zip', 'mime' => 'application/x-zip-compressed' ]
  , [ 'ext' => 'zip', 'mime' => 'multipart/x-zip' ]
  , [ 'ext' => 'zip', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'zoo', 'mime' => 'application/octet-stream' ]
  , [ 'ext' => 'zsh', 'mime' => 'text/x-script.zsh' ]
  ];


  // Get extension for given mime type
  public static function get( $ext ) {
    foreach ( self::$map as $pair ) {
      if ( $ext == $pair['ext'] ) return $pair['mime'];
    }
  }


  // Get mime type for given extension
  public static function ext( $mime ) {
    foreach ( self::$map as $pair ) {
      if ( $mime == $pair['mime'] ) return $pair['ext'];
    }
  }


  // Get the full mime map
  public static function map( $key = 'ext' ) {
    $map = [];

    // detect value key
    $val = $key == 'ext' ? 'mime' : 'ext';

    // gather map
    foreach ( self::$map as $pair ) {
      if ( ! isset( $map[$pair[$key]] )) {
        $map[$pair[$key]] = $pair[$val];
      }
    }

    return $map;
  }


  // Registers a new extenions and mimetype
  public static function register( $ext, $mime ) {
    if ( $added = empty( self::get( $ext )))
      array_push( self::$map, [ 'ext' => $ext, 'mime' => $mime ]);

    return $added;
  }

}