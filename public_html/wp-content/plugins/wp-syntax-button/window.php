<?php
$wpconfig = realpath("../../../wp-config.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');
global $wpdb;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>WP-Syntax</title>
<!-- 	<meta http-equiv="Content-Type" content="<?php// bloginfo('html_type'); ?>; charset=<?php //echo get_option('blog_charset'); ?>" /> -->
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/wp-syntax-button/tinymce.js"></script>
	<base target="_self" />
</head>
		<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="wpsb" action="#">
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
			<td nowrap="nowrap"><label for="wpsb_main"><?php _e("Select Language", 'wpsb_main'); ?></label></td>
			<td><select id="wpsb_lang" name="wpsb_main" style="width: 200px">
			<option value="abap"><?php _e("abap", 'wpsb_main'); ?></option>	<option value="actionscript"><?php _e("actionscript", 'wpsb_main'); ?></option>
			<option value="actionscript3"><?php _e("actionscript3", 'wpsb_main'); ?></option> <option value="ada"><?php _e("ada", 'wpsb_main'); ?></option>
			<option value="apache"><?php _e("apache", 'wpsb_main'); ?></option> <option value="applescript"><?php _e("applescript", 'wpsb_main'); ?></option>
			<option value="apt_sources"><?php _e("apt_sources", 'wpsb_main'); ?></option> <option value="asm"><?php _e("asm", 'wpsb_main'); ?></option>
			<option value="asp"><?php _e("asp", 'wpsb_main'); ?></option> <option value="autoit"><?php _e("autoit", 'wpsb_main'); ?></option>
			<option value="avisynth"><?php _e("avisynth", 'wpsb_main'); ?></option> <option value="bash"><?php _e("bash", 'wpsb_main'); ?></option>
			<option value="basic4gl"><?php _e("basic4gl", 'wpsb_main'); ?></option>	<option value="bf"><?php _e("bf", 'wpsb_main'); ?></option>
			<option value="blitzbasic"><?php _e("blitzbasic", 'wpsb_main'); ?></option>	<option value="bnf"><?php _e("bnf", 'wpsb_main'); ?></option>
			<option value="boo"><?php _e("boo", 'wpsb_main'); ?></option> <option value="c"><?php _e("c", 'wpsb_main'); ?></option>
			<option value="c_mac"><?php _e("c_mac", 'wpsb_main'); ?></option> <option value="caddcl"><?php _e("caddcl", 'wpsb_main'); ?></option>
			<option value="cadlisp"><?php _e("cadlisp", 'wpsb_main'); ?></option> <option value="cfdg"><?php _e("cfdg", 'wpsb_main'); ?></option>
			<option value="cfm"><?php _e("cfm", 'wpsb_main'); ?></option> <option value="cil"><?php _e("cil", 'wpsb_main'); ?></option>
			<option value="cobol"><?php _e("cobol", 'wpsb_main'); ?></option> <option value="cpp-qt"><?php _e("cpp-qt", 'wpsb_main'); ?></option>
			<option value="cpp"><?php _e("cpp", 'wpsb_main'); ?></option> <option value="csharp"><?php _e("csharp", 'wpsb_main'); ?></option>
			<option value="css"><?php _e("css", 'wpsb_main'); ?></option> <option value="d"><?php _e("d", 'wpsb_main'); ?></option>
			<option value="delphi"><?php _e("delphi", 'wpsb_main'); ?></option>	<option value="diff"><?php _e("diff", 'wpsb_main'); ?></option>
			<option value="div"><?php _e("div", 'wpsb_main'); ?></option> <option value="dos"><?php _e("dos", 'wpsb_main'); ?></option>
			<option value="dot"><?php _e("dot", 'wpsb_main'); ?></option> <option value="eiffel"><?php _e("eiffel", 'wpsb_main'); ?></option>
			<option value="email"><?php _e("email", 'wpsb_main'); ?></option> <option value="fortran"><?php _e("fortran", 'wpsb_main'); ?></option>
			<option value="freebasic"><?php _e("freebasic", 'wpsb_main'); ?></option> <option value="genero"><?php _e("genero", 'wpsb_main'); ?></option>
			<option value="gettext"><?php _e("gettext", 'wpsb_main'); ?></option> <option value="glsl"><?php _e("glsl", 'wpsb_main'); ?></option>
			<option value="gml"><?php _e("gml", 'wpsb_main'); ?></option> <option value="gnuplot"><?php _e("gnuplot", 'wpsb_main'); ?></option>
			<option value="groovy"><?php _e("groovy", 'wpsb_main'); ?></option> <option value="haskell"><?php _e("haskell", 'wpsb_main'); ?></option>
			<option value="hq9plus"><?php _e("hq9plus", 'wpsb_main'); ?></option> <option value="html4strict"><?php _e("html4strict", 'wpsb_main'); ?></option>
			<option value="idl"><?php _e("idl", 'wpsb_main'); ?></option> <option value="ini"><?php _e("ini", 'wpsb_main'); ?></option>
			<option value="inno"><?php _e("inno", 'wpsb_main'); ?></option> <option value="intercal"><?php _e("intercal", 'wpsb_main'); ?></option>
			<option value="io"><?php _e("io", 'wpsb_main'); ?></option>	<option value="java"><?php _e("java", 'wpsb_main'); ?></option>
			<option value="java5"><?php _e("java5", 'wpsb_main'); ?></option> 
			<option value="javascript"><?php _e("javascript", 'wpsb_main'); ?></option>	<option value="kixtart"><?php _e("kixtart", 'wpsb_main'); ?></option>
			<option value="klonec"><?php _e("klonec", 'wpsb_main'); ?></option>	<option value="klonecpp"><?php _e("klonecpp", 'wpsb_main'); ?></option>
			<option value="latex"><?php _e("latex", 'wpsb_main'); ?></option> <option value="lisp"><?php _e("lisp", 'wpsb_main'); ?></option>
			<option value="lolcode"><?php _e("lolcode", 'wpsb_main'); ?></option> <option value="lotusformulas"><?php _e("lotusformulas", 'wpsb_main'); ?></option>
			<option value="lotusscript"><?php _e("lotusscript", 'wpsb_main'); ?></option> <option value="lscript"><?php _e("lscript", 'wpsb_main'); ?></option>
			<option value="lua"><?php _e("lua", 'wpsb_main'); ?></option> <option value="m68k"><?php _e("m68k", 'wpsb_main'); ?></option>
			<option value="make"><?php _e("make", 'wpsb_main'); ?></option>	<option value="matlab"><?php _e("matlab", 'wpsb_main'); ?></option>
			<option value="mirc"><?php _e("mirc", 'wpsb_main'); ?></option>	<option value="mpasm"><?php _e("mpasm", 'wpsb_main'); ?></option>
			<option value="mxml"><?php _e("mxml", 'wpsb_main'); ?></option>	<option value="mysql"><?php _e("mysql", 'wpsb_main'); ?></option>
			<option value="nsis"><?php _e("nsis", 'wpsb_main'); ?></option>	<option value="objc"><?php _e("objc", 'wpsb_main'); ?></option>
			<option value="ocaml-brief"><?php _e("ocaml-brief", 'wpsb_main'); ?></option> <option value="ocaml"><?php _e("ocaml", 'wpsb_main'); ?></option>
			<option value="oobas"><?php _e("oobas", 'wpsb_main'); ?></option> <option value="oracle11"><?php _e("oracle11", 'wpsb_main'); ?></option>
			<option value="oracle8"><?php _e("oracle8", 'wpsb_main'); ?></option> <option value="pascal"><?php _e("pascal", 'wpsb_main'); ?></option>
			<option value="per"><?php _e("per", 'wpsb_main'); ?></option> <option value="perl"><?php _e("perl", 'wpsb_main'); ?></option>
			<option value="php-brief"><?php _e("php-brief", 'wpsb_main'); ?></option> <option value="php"><?php _e("php", 'wpsb_main'); ?></option>
			<option value="pic16"><?php _e("pic16", 'wpsb_main'); ?></option> <option value="pixelbender"><?php _e("pixelbender", 'wpsb_main'); ?></option>
			<option value="plsql"><?php _e("plsql", 'wpsb_main'); ?></option> <option value="povray"><?php _e("povray", 'wpsb_main'); ?></option>
			<option value="powershell"><?php _e("powershell", 'wpsb_main'); ?></option> <option value="progress"><?php _e("progress", 'wpsb_main'); ?></option>
			<option value="prolog"><?php _e("prolog", 'wpsb_main'); ?></option> <option value="providex"><?php _e("providex", 'wpsb_main'); ?></option>
			<option value="python"><?php _e("python", 'wpsb_main'); ?></option> <option value="qbasic"><?php _e("qbasic", 'wpsb_main'); ?></option>
			<option value="rails"><?php _e("rails", 'wpsb_main'); ?></option> <option value="reg"><?php _e("reg", 'wpsb_main'); ?></option>
			<option value="robots"><?php _e("robots", 'wpsb_main'); ?></option> <option value="ruby"><?php _e("ruby", 'wpsb_main'); ?></option>
			<option value="sas"><?php _e("sas", 'wpsb_main'); ?></option> <option value="scala"><?php _e("scala", 'wpsb_main'); ?></option>
			<option value="scheme"><?php _e("scheme", 'wpsb_main'); ?></option> <option value="scilab"><?php _e("scilab", 'wpsb_main'); ?></option>
			<option value="sdlbasic"><?php _e("sdlbasic", 'wpsb_main'); ?></option>	<option value="smalltalk"><?php _e("smalltalk", 'wpsb_main'); ?></option>
			<option value="smarty"><?php _e("smarty", 'wpsb_main'); ?></option> <option value="sql"><?php _e("sql", 'wpsb_main'); ?></option>
			<option value="tcl"><?php _e("tcl", 'wpsb_main'); ?></option> <option value="teraterm"><?php _e("teraterm", 'wpsb_main'); ?></option>
			<option value="text"><?php _e("text", 'wpsb_main'); ?></option> <option value="thinbasic"><?php _e("thinbasic", 'wpsb_main'); ?></option>
			<option value="tsql"><?php _e("tsql", 'wpsb_main'); ?></option>	<option value="typoscript"><?php _e("typoscript", 'wpsb_main'); ?></option>
			<option value="vb"><?php _e("vb", 'wpsb_main'); ?></option>	<option value="vbnet"><?php _e("vbnet", 'wpsb_main'); ?></option>
			<option value="verilog"><?php _e("verilog", 'wpsb_main'); ?></option> <option value="vhdl"><?php _e("vhdl", 'wpsb_main'); ?></option>
			<option value="vim"><?php _e("vim", 'wpsb_main'); ?></option> <option value="visualfoxpro"><?php _e("visualfoxpro", 'wpsb_main'); ?></option>
			<option value="visualprolog"><?php _e("visualprolog", 'wpsb_main'); ?></option>	<option value="whitespace"><?php _e("whitespace", 'wpsb_main'); ?></option>
			<option value="winbatch"><?php _e("winbatch", 'wpsb_main'); ?></option>	<option value="xml"><?php _e("xml", 'wpsb_main'); ?></option>
			<option value="xorg_conf"><?php _e("xorg_conf", 'wpsb_main'); ?></option> <option value="xpp"><?php _e("xpp", 'wpsb_main'); ?></option>
			<option value="yaml"><?php _e("yaml", 'wpsb_main'); ?></option>	<option value="z80"><?php _e("z80", 'wpsb_main'); ?></option>
            </select></td>
          </tr>
          <tr>
			<td nowrap="nowrap" valign="top"><label for="wpsb_linenumber"><?php _e("Line Number", 'wpsb_main'); ?></label></td>
            <td><input type="text" name="linenumber" id="wpsb_linenumber" size="3" /></td>
          </tr>
        </table>
	<div class="mceActionPanel">
		<div style="float: left">
			    <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'wpsb_main'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
				<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'wpsb_main'); ?>" onclick="insertWPSBcode();" />
		</div>
	</div>
</form>
</body>
</html>