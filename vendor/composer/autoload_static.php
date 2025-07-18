<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb7dc9f39bcb960172fe3f7e3d1b910ad
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb7dc9f39bcb960172fe3f7e3d1b910ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb7dc9f39bcb960172fe3f7e3d1b910ad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb7dc9f39bcb960172fe3f7e3d1b910ad::$classMap;

        }, null, ClassLoader::class);
    }
}
