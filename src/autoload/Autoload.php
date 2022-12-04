<?php

namespace Autoload;

// je recupere la configuration de l'auto config
require_once('config/autoloadConfig.php');

/**
 * 
 */
class Autoloader
{
    /**
     * this static method allow to register an autoload module
     */
    public static function register(): void
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * statis method pass as callback to the register
     * @param string $class the class i need to tu require
     */
    public static function autoload(string $class): string
    {
        $class = str_replace('\\', '/', $class);

        // i make an array with all the folder with namespace i have
        $paths = array(
            implode(DS, [ROOT, 'controllers']),
            implode(DS, [ROOT, 'utils']),
            implode(DS, [ROOT, 'models']),
            implode(DS, [ROOT, 'factories']),
            implode(DS, [ROOT, 'views']),
            implode(DS, [ROOT])
        );

        // i make a loop for each path
        foreach ($paths as $path) {
            // i create a path to the file and if the file exist i require it
            $file = implode(DS, [$path, $class . '.php']);
            if (file_exists($file)) {
                return require_once($file);
            }
        }
    }
}
