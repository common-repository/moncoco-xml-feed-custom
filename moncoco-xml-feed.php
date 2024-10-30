<?php
/*
Plugin Name: MonCoco XML Feed
Plugin URI: http://moncocopilote.com/
Description: With this plugin you can create a custom Xml feed from your wordpress website. I create this plugin for my wordpress app on CodeCanyon.
Version: 1.3
Author: Paul Favier
Author URI: http://paulfavier.com
License: GPL2
*/

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : contact@moncocopilote.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function do_feed_moncocoxml() {
	load_template(plugin_dir_path( __FILE__ ) . '/moncoco-template-feed.php' );
}


add_action( 'do_feed_moncocoxml', 'do_feed_moncocoxml', 10, 1 );

