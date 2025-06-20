<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite816e30ca46e96f5db7156632df11dc2
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Symfony\\Component\\HttpFoundation' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/http-foundation',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInite816e30ca46e96f5db7156632df11dc2::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite816e30ca46e96f5db7156632df11dc2::$classMap;

        }, null, ClassLoader::class);
    }
}
