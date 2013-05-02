<?php

/*
  Plugin Name: WP-CopyRightPro
  Plugin URI: http://wp-copyrightpro.com/
  Description: WP-CopyRightPro is a plug-in that prevents the copying of texts and images from your blog, if you install this plug-in, your content of wordpress will be protected.
  Version: 2.6
  Author: Andres Felipe Perea V.
  Author URI: http://wp-copyrightpro.com/
 */

/*
  This plug-in was developed by Andrés Perea.
  Copyright 2010  Wp-copyrightPro, IN  (http://wp-copyrightpro.com/)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt

  FOR MORE INFO: info@wp-copyrightpro.com
 */

/* Validar Version */

function validar_version() {
    $version_copyright = "2.6";
    global $wpdb;
    $fivesdrafts = $wpdb->get_results("SELECT*FROM `" . $wpdb->prefix . "copyrightpro` WHERE `Option`='version'");
    foreach ($fivesdrafts as $fivesdraft) {
        $result[0] = $fivesdraft->Value;
    }
    if ($result[0] != $version_copyright) {
        $version = "x";
    } else {
        $version = "ok";
    }
    return $version;
}

function update_basecopy() {
    copyprouninstall();
    copyproinstall();
}

/* INSTALL AND UNISTALL PLUG-IN */

function copyproinstall() {
    global $wpdb;

    $sql = 'CREATE TABLE `' . $wpdb->prefix . 'copyrightpro` (
			`Option` VARCHAR( 20 ) NOT NULL ,
			`Value` VARCHAR( 20 ) NOT NULL
			) ENGINE = MYISAM DEFAULT CHARSET=utf8';

    $wpdb->query($sql);
    $wpdb->query('INSERT INTO `' . $wpdb->prefix . 'copyrightpro` (`Option`, `Value`) VALUES 
	(\'copy_click\', \'y\'),(\'copy_selection\', \'y\'),(\'copy_iframe\', \'n\'),(\'copy_drop\', \'y\'), (\'copy_link\', \'y\'), (\'version\', \'2.6\'), (\'checked_version\', \'\'), (\'version_last_check\', UNIX_TIMESTAMP())');
}

function copyprouninstall() {
    global $wpdb;

    $sql = "DROP TABLE `" . $wpdb->prefix . "copyrightpro`";
    $wpdb->query($sql);
}

/* FUNCIONES DE PROTECCION */

function copyrighthead() {
    include ('script.htm');
}

eval(base64_decode('ZnVuY3Rpb24gY29weXJpZ2h0cHV5ZGkoKSB7DQogICAgZWNobyAnPHNtYWxsPlRoaXMgc2l0ZSBpcyBwcm90ZWN0ZWQgYnkgPGEgaHJlZj0iaHR0cDovL3dwLWNvcHlyaWdodHByby5jb20vIj5XUC1Db3B5UmlnaHRQcm88L2E+PC9zbWFsbD4nOw0KfQ=='));

/* PANEL DE CONTROL */

function update_options($option, $value) {
    global $wpdb;
    $wpdb->query("UPDATE " . $wpdb->prefix . "copyrightpro SET Value = '$value' WHERE `Option`='$option'");
}

function update_copypro($clickpro, $selecpro, $iframepro, $droppro) {
    if ($clickpro == "") {
        $clickpro = "n";
    }
    if ($selecpro == "") {
        $selecpro = "n";
    }
    if ($iframepro == "") {
        $iframepro = "n";
    }
    if ($droppro == "") {
        $droppro = "n";
    }
    $update = update_options('copy_click', $clickpro);
    $update = update_options('copy_selection', $selecpro);
    $update = update_options('copy_iframe', $iframepro);
    $update = update_options('copy_drop', $droppro);
}

function update_link($link) {
    if ($link == "") {
        $link = "n";
    }
    $update = update_options('copy_link', $link);
}

function panel_copypro() {
    include ('panel.php');
}

function config_copypro() {
    add_menu_page('Wp-CopyRightPro Panel', 'Wp-CopyrightPro', 'administrator', 'wp-copyrightpro/panel.php', 'panel_copypro', plugins_url('wp-copyrightpro/images/Computer.gif'));
}

/* Imagen Panel de control */

function img_panelcopy($option) {
    global $wpdb;
    $fivesdrafts = $wpdb->get_results("SELECT*FROM `" . $wpdb->prefix . "copyrightpro` WHERE `Option`='$option'");
    foreach ($fivesdrafts as $fivesdraft) {
        $result[0] = $fivesdraft->Value;
    }
    return $result[0];
}

function upgrade_notice() {
    global $wpdb;
    
    $versionLastCheckTime = $wpdb->get_var($wpdb->prepare("SELECT wpcpr.value FROM " . $wpdb->prefix . "copyrightpro wpcpr where wpcpr.Option = 'version_last_check';"));

    $currentTime = time();
    
    $difference = $currentTime - $versionLastCheckTime;
    
    //Se obtiene la version actual de la base de datos
    $currentVersion = $wpdb->get_var($wpdb->prepare("SELECT wpcpr.value FROM " . $wpdb->prefix . "copyrightpro wpcpr where wpcpr.Option = 'version';"));
    
    //Se obtiene la ultima version verificada (contra el sitio de WPCopyrightPro) de la base de datos
    $checkedVersion = $wpdb->get_var($wpdb->prepare("SELECT wpcpr.value FROM " . $wpdb->prefix . "copyrightpro wpcpr where wpcpr.Option = 'checked_version';"));
    
    if ($difference > 86400 || !trim($checkedVersion)) {
        //Si ha pasado un dia desde la ultima verificacion o si
        //la ultima version chequeada esta vacia (cuando se acaba de instalar el plugin)
        //se debe obtener la version del sitio oficial de WPCopyrightPro
        $wpcopyrightprosite = 'http://wp-copyrightpro.com/version.txt';
        $checkedVersion = file_get_contents($wpcopyrightprosite);
        
        //Se actualiza la ultima version chequeada en la base de datos
        $wpdb->query("UPDATE " . $wpdb->prefix . "copyrightpro SET Value = '$checkedVersion' WHERE `Option`='checked_version'");
        
        $wpdb->query("UPDATE " . $wpdb->prefix . "copyrightpro SET Value = UNIX_TIMESTAMP() WHERE `Option`='version_last_check'");
    }
    
    if (trim($currentVersion) != trim($checkedVersion)) {
        echo '<div id="message_copypro">';
        echo 'Please, download the new version of <b>wp-copyrightpro</b> in the oficial web site <a href="http://wp-copyrightpro.com" target="_blank">Here</a>.';
        echo '</div>';
    }
}

/* Añadir comando wordpress */
register_activation_hook(__FILE__, 'copyproinstall'); //gancho para instalar
register_deactivation_hook(__FILE__, 'copyprouninstall'); //gancho para desinstalar

eval(base64_decode('YWRkX2FjdGlvbignYWRtaW5fbWVudScsICdjb25maWdfY29weXBybycpOw0KYWRkX2FjdGlvbignd3BfaGVhZCcsICdjb3B5cmlnaHRoZWFkJyk7DQoNCi8vUmVnaXN0ZXIgdGhlIG1ldGhvZCB1cGdyYWRlIG5vdGljZSB0byBzaG93IGEgbWVzc2FnZQ0KYWRkX2FjdGlvbignYWxsX2FkbWluX25vdGljZXMnLCAndXBncmFkZV9ub3RpY2UnKTsNCg0KLyogTGluayBGT09URVIgKi8NCiRsaW5rX2NvcHlmb290ZXIgPSBpbWdfcGFuZWxjb3B5KCdjb3B5X2xpbmsnKTsNCmlmICgkbGlua19jb3B5Zm9vdGVyID09ICJ5Iikgew0KICAgIGFkZF9hY3Rpb24oJ3dwX2Zvb3RlcicsICdjb3B5cmlnaHRwdXlkaScpOw0KfQ=='));
?>