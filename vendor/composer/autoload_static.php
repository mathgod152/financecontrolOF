<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit84b59579f6ce789a3ade55a91ff8aea8
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FinanceControl\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FinanceControl\\' => 
        array (
            0 => __DIR__ . '/../..' . '/FinanceControl',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit84b59579f6ce789a3ade55a91ff8aea8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit84b59579f6ce789a3ade55a91ff8aea8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit84b59579f6ce789a3ade55a91ff8aea8::$classMap;

        }, null, ClassLoader::class);
    }
}