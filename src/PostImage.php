<?php

namespace METASTORE\DiscordBotPost;

use \DiscordWebhooks\Client;
use \DiscordWebhooks\Embed;

class PostImage {

	private $setting;
	private $webhook_e621;
	private $webhook_e926;
	private $embed;

	/**
	 * Discord_PostImage constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		$this->setting      = settings();
		$this->webhook_e621 = new Client( $this->setting['e621']['webhook'] );
		$this->webhook_e926 = new Client( $this->setting['e926']['webhook'] );
		$this->embed        = new Embed();
	}

	public function getJSON( $url ) {
		$getData   = json_decode( file_get_contents( $url ), true );
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

	public function sendE621Image() {
		$username = $this->webhook_e621->username( $this->setting['e621']['username'] );
		$output   = $username->message( self::getJSON( $this->setting['e621']['url'] ) )->send();

		return $output;
	}

	/**
	 * Send Discord messages.
	 *
	 * @return mixed
	 * -------------------------------------------------------------------------------------------------------------- */

	public function sendE926Image() {
		$username = $this->webhook_e926->username( $this->setting['e926']['username'] );
		$output   = $username->message( self::getJSON( $this->setting['e926']['url'] ) )->send();

		return $output;
	}
}
