<?php

namespace METASTORE\DiscordBotPost;

use \Discord\Webhook;
use \Discord\Embed;

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
		$this->webhook_e621 = new Webhook( $this->setting['e621']['webhook'] );
		$this->webhook_e926 = new Webhook( $this->setting['e926']['webhook'] );
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

	public function sendE621Image() {
		$username = $this->webhook_e621->setUsername( $this->setting['e621']['username'] );
		$output   = $username->setMessage( self::getJSON( $this->setting['e621']['url'] ) )->send();

		return $output;
	}


	public function sendE926Image() {
		$username = $this->webhook_e926->setUsername( $this->setting['e926']['username'] );
		$output   = $username->setMessage( self::getJSON( $this->setting['e926']['url'] ) )->send();

		return $output;
	}
}
