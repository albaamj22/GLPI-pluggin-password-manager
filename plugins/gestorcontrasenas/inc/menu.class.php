<?php

class PluginGestorcontrasenasMenu extends CommonGLPI {

    static function getTypeName($nb = 0) { return 'Gestor de contraseñas'; }
    static function getMenuName()        { return 'Gestor de contraseñas'; }

    static function getMenuContent() {
        return [
            'title' => 'Gestor de contraseñas',
            'page'  => Plugin::getWebDir('gestorcontrasenas') . '/front/redirect.php',
            'icon'  => 'ti ti-key',
        ];
    }

    static function canView(): bool {
        return Session::haveRight('config', READ);
    }
}
