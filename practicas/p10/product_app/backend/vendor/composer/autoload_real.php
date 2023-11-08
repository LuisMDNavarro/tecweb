<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit32cc7dfd3d2861b54fb5e14ae96d87b6
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit32cc7dfd3d2861b54fb5e14ae96d87b6', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit32cc7dfd3d2861b54fb5e14ae96d87b6', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit32cc7dfd3d2861b54fb5e14ae96d87b6::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
