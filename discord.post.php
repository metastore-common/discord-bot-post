<?php

require_once( __DIR__ . '/vendor/autoload.php' );
require_once( __DIR__ . '/src/PostImage.php' );
require_once( __DIR__ . '/settings/settings.php' );

// Loading class.
$Discord_PostImage = new \METASTORE\DiscordBotPost\PostImage();

// CMD options.
$cmdOpt = getopt( 'p:' );

if ( isset( $cmdOpt['p'] ) ) {
	switch ( $cmdOpt['p'] ) {
		case 'e621':
			$Discord_PostImage->sendE621Image();
			break;
		case 'e926':
			$Discord_PostImage->sendE926Image();
			break;
		default:
			return false;
	}
} else {
	return false;
}
