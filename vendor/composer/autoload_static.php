<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit992d4809be16768367e9d8ade8df8c9e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Api\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit992d4809be16768367e9d8ade8df8c9e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit992d4809be16768367e9d8ade8df8c9e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit992d4809be16768367e9d8ade8df8c9e::$classMap;

        }, null, ClassLoader::class);
    }
}
