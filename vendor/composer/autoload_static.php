<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit303b75adc60e8012daac243fb1382f54
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'INBCM\\Preset\\Tainacan\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'INBCM\\Preset\\Tainacan\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit303b75adc60e8012daac243fb1382f54::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit303b75adc60e8012daac243fb1382f54::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit303b75adc60e8012daac243fb1382f54::$classMap;

        }, null, ClassLoader::class);
    }
}
