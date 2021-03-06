<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1add363854c2201b66772d871b45c890
{
    public static $files = array (
        '8ec4222c68e580a23520eef4abe4380f' => __DIR__ . '/..' . '/shortpixel/shortpixel-php/lib/ShortPixel.php',
        'c93afce03290e70ec0d051b69a50edb0' => __DIR__ . '/..' . '/shortpixel/shortpixel-php/lib/ShortPixel/Exception.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'ShortPixel\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ShortPixel\\' => 
        array (
            0 => __DIR__ . '/..' . '/shortpixel/shortpixel-php/lib/ShortPixel',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'G' => 
        array (
            'Gaufrette' => 
            array (
                0 => __DIR__ . '/..' . '/knplabs/gaufrette/src',
            ),
        ),
        'B' => 
        array (
            'Brizy' => 
            array (
                0 => __DIR__ . '/..' . '/bagrinsergiu/brizy-migration-utils/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1add363854c2201b66772d871b45c890::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1add363854c2201b66772d871b45c890::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit1add363854c2201b66772d871b45c890::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
