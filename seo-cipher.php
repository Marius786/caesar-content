<?php
/**
 * Plugin Name: SEO Cipher
 * Version: 1.0
 * Description: Caesar Cipher for SEO purposes. efidfghjdkf
 */

add_filter( 'the_content', 'seo_cipher', 999, 1 );
add_filter( 'the_title', 'seo_cipher', 999, 1 );
add_filter( 'widget_title', 'seo_cipher', 999, 1 );
add_filter( 'get_comment_text', 'seo_cipher', 999, 1 );
add_filter( 'widget_text', 'seo_cipher', 999, 1 );
function seo_cipher( $text ) {
	$offset = 7;
	$out = '';
	for ( $key = 0; $key < strlen( $text ); $key++ ) {
		if ( ord( $text[ $key ] ) == 32 ) { $out .= $text[ $key ]; /* except the spaces */   }
		$out .= chr( ord( $text[ $key ] ) + $offset );
	}
	return $out;
}

