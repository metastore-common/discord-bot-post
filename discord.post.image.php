<?php

require_once( __DIR__ . '/engine/vendor/autoload.php' );
require_once( __DIR__ . '/settings/settings.php' );

use \DiscordWebhooks\Client;
use \DiscordWebhooks\Embed;

class Discord_PostImage {

	private $set;       // Settings.
	private $webhook;   // Discord webhook.
	private $embed;     // Discord embed.

	/**
	 * Discord_PostImage constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		$this->set     = settings();
		$this->webhook = new Client( $this->set['e926']['webhook'] );
		$this->embed   = new Embed();
	}

	/**
	 * Get E926 images.
	 *
	 * @return string
	 * -------------------------------------------------------------------------------------------------------------- */

	public function getE926Image() {
		$getData   = json_decode( file_get_contents( $this->set['e926']['url'] ), true );
		$randData  = array_rand( $getData );
		$queryData = $getData[ $randData ];
		$getAuthor = $queryData['author'];
		$getURL    = $queryData['file_url'];

		$output = '**' . $getAuthor . '** - ' . $getURL;

		return $output;
	}

	/**
	 * Send Discord messages.
	 *
	 * @return mixed
	 * -------------------------------------------------------------------------------------------------------------- */

	public function sendMessage() {
		$output = $this->webhook->username( $this->set['e926']['username'] )->message( self::getE926Image() )->send();

		return $output;
	}
}

// Loading class.
$Discord_PostImage = new Discord_PostImage();

// Send message.
$Discord_PostImage->sendMessage();
