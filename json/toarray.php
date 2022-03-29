<?php

$mahasiswa = file_get_contents( 'try.json' );

$result = json_decode( $mahasiswa, true );
var_dump( $result );
echo $result[0]['jurusan'];

?>