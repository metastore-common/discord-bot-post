<?php

/**
 * Settings.
 *
 * @return array
 * ------------------------------------------------------------------------------------------------------------------ */

function settings() {
	$setting = [
		'e926' => [
			'webhook'  => '',
			'username' => 'E926',
			'message'  => '',
			'url' => 'https://e926.net/post/index.json?tags=anthro',
		]
	];

	return $setting;
}