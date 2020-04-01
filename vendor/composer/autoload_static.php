<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit55dd6a1fc547a295547122e01b0a9f4b
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tools\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tools',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit55dd6a1fc547a295547122e01b0a9f4b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit55dd6a1fc547a295547122e01b0a9f4b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
