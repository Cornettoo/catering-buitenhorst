<?php
$dir   = __DIR__ . '/';
$files = scandir($dir);
foreach( $files as $file ) {
    if ( $file == '.' || $file == '..' || $file == basename(__FILE__) || $file == '.DS_Store' ) {
        continue;
    }
    require_once( __DIR__ . '/' . $file );
}

$dir   = __DIR__ . '/../partials/';
if ( file_exists( $dir ) ) {
    $files = scandir($dir);
    foreach( $files as $file ) {
        if ( $file == '.' || $file == '..' || $file == basename(__FILE__) || $file == '.DS_Store' ) {
            continue;
        }

        require_once( __DIR__ . '/../partials/' . $file );
    }
}