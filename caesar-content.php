<?php
/**
 * Plugin Name: Caesar Content
 * Author: olarmarius
 * Version: 1.0
 * Description: This plugin will use the caesar cipher to change the content.
 * License: GPL v3 or later
 */

class Caesar_Content {
	public function __construct() {
		add_filter( 'wp_title', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'wp_title_rss', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'the_title', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'the_title_rss', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'the_content', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'the_content_feed', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'widget_title', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'widget_text', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'get_comment_text', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'bloginfo', array( $this, 'caesar_filer' ), 999, 1 );
		add_filter( 'the_excerpt', array( $this, 'caesar_filer' ), 999, 1 );
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
