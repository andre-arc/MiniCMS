<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46e2c1b1c544a5c4a3aa15ac0eb77ae7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46e2c1b1c544a5c4a3aa15ac0eb77ae7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46e2c1b1c544a5c4a3aa15ac0eb77ae7::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit46e2c1b1c544a5c4a3aa15ac0eb77ae7::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}