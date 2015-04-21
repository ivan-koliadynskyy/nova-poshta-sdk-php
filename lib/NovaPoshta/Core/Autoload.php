<?php

class Autoload
{
    public static function init()
    {
        if (function_exists('__autoload')) {
            spl_autoload_register('__autoload');
        }

        return spl_autoload_register(array('Autoload', 'load'));
    }

    public static function load($className)
    {
        $className = str_replace('Torrent\\', '', $className);
        $className = NOVA_POSHTA_PATH_SDK . $className . '.php';

        if ((file_exists($className) === false) || (is_readable($className) === false)) {
            return false;
        }

        require($className);

        return true;
    }
}