<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58725bff8f1ca07327a494d9848dde52
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DesignPatterns\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DesignPatterns\\' => 
        array (
            0 => __DIR__ . '/../..' . '/DesignPatterns',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit58725bff8f1ca07327a494d9848dde52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58725bff8f1ca07327a494d9848dde52::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
