<?php
namespace fifteen_four;

/*

Plugin Name: Fifteen Four Launchpad

Plugin URI: http://www.fifteenfour.com

Description: Provides basic functionality that is used throughout every Fifteen Four theme.

Version: 0.1.0

Author: Fifteen Four

Author URI: http://www.fifteenfour.com

Contributors: Nick Patterson

License: GPL2

Copyright 2018 Fifteen Four  (email : web@15four.com)

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

// If the plugin class doesn't exist, create it
if ( !class_exists( '\fifteen_four\Fifteen_Four_Launchpad' ) ) {

	// Plugin class
	class Fifteen_Four_Launchpad	{

		/**
		* Construct the plugin object
		*/
		public function __construct()	{
				
			// Include helpers
			require __DIR__ . '/inc/helpers/helpers.php';

			// Include filters
			require __DIR__ . '/inc/filters/filters.php';

			// Include shortcodes
			require __DIR__ . '/inc/shortcodes/shortcodes.php';
		}
	}
}

// If the class exists, instantiate it
if ( class_exists( '\fifteen_four\Fifteen_Four_Launchpad' ) ) {

	// Instantiate the plugin class
	$fifteen_four_launchpad = new Fifteen_Four_Launchpad();
}

?>
