<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit513c4fd91acfe8b43dfa2768c23e8835
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit513c4fd91acfe8b43dfa2768c23e8835::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit513c4fd91acfe8b43dfa2768c23e8835::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}