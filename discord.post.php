<?php

require_once( __DIR__ . '/src/Webhook.php' );
require_once( __DIR__ . '/src/Embed.php' );
require_once( __DIR__ . '/src/PostImage.php' );
require_once( __DIR__ . '/settings/settings.php' );

// Loading class.
$PostImage = new \METASTORE\DiscordBotPost\PostImage();

// CMD options.
$cmdOpt = getopt( 'p:' );

if ( isset( $cmdOpt['p'] ) ) {
	switch ( $cmdOpt['p'] ) {
		case 'e621':
			$PostImage->sendE621Image();
			break;
		case 'e926':
			$PostImage->sendE926Image();
			break;
		default:
			return false;
	}
} else {
	return false;
}
