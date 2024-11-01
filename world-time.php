<?php 
/**
 * Plugin Name: World Time
 * Plugin URI:
 * Description: Ever wondered what the time was all the way across the world? Now you don't have to. This plugin will display the time in the four cities and place these times in your footer. It's perfect for the international traveler's blog or, as in our case, the flight attendant's personal blog. More cities coming soon!
 * Author: Lauren Porter
 * Version: 1.0.0
 */

require_once dirname(__FILE__).'/src/wt-main.php';

WT_Main::init();
