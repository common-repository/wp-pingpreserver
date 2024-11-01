<?php
/*
Plugin Name: WP_PingPreserver
Version: 0.4
Plugin URI: http://scott.sherrillmix.com/blog/programmer/web/WP_PingSaver/
Description: This plugin prevents WordPress from eating pings that come too quickly in succession (i.e. a single post linking to more than one of your pages).
Author: Scott Sherrill-Mix
Author URI: http://scott.sherrillmix.com/blog/
*/


add_filter('comment_flood_filter','pingpreserver_comment_flood_fixer',10,3);
remove_action('comment_flood_filter','wp_throttle_comment_flood');

function pingpreserver_comment_flood_fixer($block, $time_lastcomment, $time_newcomment) {
	global $wpdb;
	if ( $block ) // a plugin has already blocked... we'll let that decision stand
		return $block;
	if ( ($time_newcomment - $time_lastcomment) < 15 ){
		if(strpos($_SERVER['PHP_SELF'],"xmlrpc.php")!==false){
			$pings=$wpdb->get_var("SELECT COUNT(comment_date_gmt) FROM $wpdb->comments WHERE comment_author_IP = '".$_SERVER['REMOTE_ADDR']."' AND TIME_TO_SEC(TIMEDIFF(now(),comment_date_gmt)) < 75");
			if($pings>5) return true;
		} else return true;
	}
	return false;
}

?>