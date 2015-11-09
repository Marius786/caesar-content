<?php
/**
 * Plugin Name: Caesar Content
 * Author: olarmarius
 * Version: 1.0
 * Description: This plugin will use the caesar cipher to change the content.
 * License: GPL v3 or later
 */

class Caesar_Content {
	private $filters = array(
		'wp_title',
		'wp_title_rss',
		'the_title',
		'the_title_rss',
		'the_content',
		'the_content_feed',
		'widget_title',
		'widget_text',
		'get_comment_text',
		'bloginfo',
		'the_excerpt',
	);

	public function __construct() {
		foreach ( $this->filters as $filter_name ) {
			add_filter( $filter_name, array( $this, 'caesar_filer' ), 999, 1 );
		}
	}

	public function caesar_filer( $text ) {
		$offset = 4;
		$out = '';
		for ( $key = 0; $key < strlen( $text ); $key++ ) {
			$char = $text[ $key ];
			if ( $char == ' ' ) {
				$out .= $char;
			} else {
				$out .= chr( ord( $char ) + $offset );
			}
		}
		return $out;
	}
}
new Caesar_Content();
