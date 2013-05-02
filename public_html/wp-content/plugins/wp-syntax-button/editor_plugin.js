// Docu : http://wiki.moxiecode.com/index.php/TinyMCE:Create_plugin/3.x#Creating_your_own_plugins

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('wpsb');
	 
	tinymce.create('tinymce.plugins.wpsb', {
		
		init : function(ed, url) {
		// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('wpsb', function() {
				ed.windowManager.open({
					file : url + '/window.php',
					width : 360,
					height : 90,
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('wpsb', {
				title : 'WP-Syntax',
				cmd : 'wpsb',
				image : url + '/cctb_img.png'
			});
			
			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('wpsb', n.nodeName == 'IMG');
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'wpsb',
					author 	  : 'Olivier Cecillon',
					authorurl : 'http://www.blogoolic.fr',
					infourl   : 'http://www.blogoolic.fr',
					version   : "0.1 beta"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('wpsb', tinymce.plugins.wpsb);
})();


