<?php

function plugin_version_gestorcontrasenas() {
    return [
        'name'         => 'Gestor de contraseñas',
        'version'      => '1.0.0',
        'author'       => 'Alba Martin',
        'license'      => 'GPLv2+',
        'homepage'     => '',
        'requirements' => ['glpi' => ['min' => '10.0', 'max' => '12.0']],
    ];
}

function plugin_gestorcontrasenas_check_prerequisites() { return true; }
function plugin_gestorcontrasenas_check_config()        { return true; }
function plugin_gestorcontrasenas_install()             { return true; }
function plugin_gestorcontrasenas_uninstall()           { return true; }

function plugin_init_gestorcontrasenas() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['gestorcontrasenas'] = true;
    $PLUGIN_HOOKS['add_javascript']['gestorcontrasenas'] = 'front/newtab.php';

    if (Session::haveRight('config', READ)) {
        $PLUGIN_HOOKS['menu_toadd']['gestorcontrasenas'] = ['admin' => 'PluginGestorcontrasenasMenu'];
    }
}
