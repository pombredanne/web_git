=== Plugin Name ===
Contributors: Eterneige, homolibere
Tags: wp-syntax, code, syntax, highlighter, tinymce, button
Requires at least: 2.7
Tested up to: 2.8
Stable tag: trunk

This plugin is based on Nick Remeslennikov's CodeColorer TinyMCE Button, which I have only modified to work with WP-Syntax.

== Description ==

This plugin is designed to work with WP-Syntax (http://wordpress.org/extend/plugins/wp-syntax/).
It is in fact a copy/paste of CodeColorer TinyMCE Button adapted for wp-syntax, but it takes in consideration that wp-syntax allows you to specify the first line number.

This plugin also corrects a disagreement when switching editor mode. When you use wp-syntax you have to write in HTML editor since line argument is removed by Visual Editor... This is no longer the case.

Note that now, you "must" write your code in Visual Editor : the plugin automatically adds `escaped="true"` to &lt;pre&gt; tag. If you write your code in HTML editor, you have to encode HTML entities.

== Installation ==

1. Upload plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use new button in TinyMCE panel

== Screenshots ==

1. This is a new button on panel
2. This is what happens if you press it

== TODO ==

1. Make this plugin universal for any syntax highlighter plugin