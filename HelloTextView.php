<?php

/** 
 * Plugin Name: Hello-Text-View
 * Description: Выводит текст "Привет" на странице http : // domen/test.
 * Version: 1.0.0
 * Author: Exarun
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Requires PHP: 7.4
 */

defined('ABSPATH') || exit;

$text = "<p class='text'>Привет</p>";

register_activation_hook(__FILE__, 'helloTextView');

function helloTextView(){
	global $wp_version;

	if (version_compare($wp_version, '5.6', '<')) {
		wp_die('This plugin requires WordPress version 5.6 or higher.');
	}
}

add_filter('the_content', 'my_hello');
function my_hello($content){
	global $text;
	if ($GLOBALS['post']->post_name == 'test')
		return $content . $text;
}

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();

delete_option('my_unset');

function my_unset(){
	unset($text);
}
