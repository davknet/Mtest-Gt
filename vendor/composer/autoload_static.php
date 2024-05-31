<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdc41842525a9cbe048b2354850091a82
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\Trai\\' => 9,
            'Inc\\Intr\\' => 9,
            'Inc\\Cls\\' => 8,
            'Inc\\Abs\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\Trai\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/Trai',
        ),
        'Inc\\Intr\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/Intr',
        ),
        'Inc\\Cls\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/Cls',
        ),
        'Inc\\Abs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/Abs',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdc41842525a9cbe048b2354850091a82::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdc41842525a9cbe048b2354850091a82::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdc41842525a9cbe048b2354850091a82::$classMap;

        }, null, ClassLoader::class);
    }
}