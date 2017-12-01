<?php

/**
 * Settings.
 *
 * @return array
 * ------------------------------------------------------------------------------------------------------------------ */

function settings() {
	$setting = [
		'e621' => [
			'webhook'  => '',
			'username' => 'E621',
			'message'  => '',
			'url' => 'https://e621.net/post/index.json?tags=anthro',
		],
		'e926' => [
			'webhook'  => '',
			'username' => 'E926',
			'message'  => '',
			'url' => 'https://e926.net/post/index.json?tags=anthro',
		],
	];

	return $setting;
}
