=== Plugin Name ===
Contributors: scottsm
Donate link: http://scott.sherrillmix.com/blog/
Tags: ping, trackback, comments, hack, fix, lose
Requires at least: 1.5
Tested up to: 2.3.1
Stable tag: 0.4

Prevents WordPress from eating pings that come too quickly in succession (i.e. a single post linking to more than one of your pages).

== Description ==

For a while, I've been a bit annoyed with WordPress losing pings (those automatic links on your blog when someone links to you) anytime someone links to more than one of my posts. It turns out Wordpress's comment flood prevention is getting in the way. This plugin prevents Wordpress from discarding these pings.

== Installation ==

1. Unzip `wp_pingpreserver.zip`. 
1. Upload `wp_pingpreserver.php` to `wp-content/plugins`.
1. Activate in the Plugins menu. 

== Frequently Asked Questions ==

= Does this increase vulnerability to comment floods? =

Possibly but I think only slightly. The increased risk should be minor as pings are still limited to 5 pings in 75 seconds (Wordpress default is 1 comment per 15 seconds).

