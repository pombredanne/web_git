function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertWPSBcode() {

	var tagtext;
	var langname_ddb = document.getElementById('wpsb_lang');
	var langname = langname_ddb.value;
	var linenumber = document.getElementById('wpsb_linenumber').value;
	var inst = tinyMCE.getInstanceById('content');
	var html = inst.selection.getContent();
	tagtext = '<pre lang="' + langname + '" escaped="true" ';
	if (linenumber) {
		tagtext = tagtext + 'line="' + linenumber + '" ';
	}
	
	window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext+'>'+html+'</pre>');
	tinyMCEPopup.editor.execCommand('mceRepaint');
	tinyMCEPopup.close();
	return;
}
