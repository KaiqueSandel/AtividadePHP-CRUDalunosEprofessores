<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad7b3967c524fd8f7e2417576a3e8e9a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Andres\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Andres\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitad7b3967c524fd8f7e2417576a3e8e9a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad7b3967c524fd8f7e2417576a3e8e9a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad7b3967c524fd8f7e2417576a3e8e9a::$classMap;

        }, null, ClassLoader::class);
    }
}
