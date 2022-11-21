<?php

namespace Framework\Config;

class Config
{
    public static function get(string $configName = null): mixed
    {
        $configPath = dirname(__DIR__) . '/../../config';
        $allFiles = [
            self::glob($configPath . '/*.php'),
            self::glob($configPath . '/*.local.php')
        ];

        $config = [];
        foreach ($allFiles as $files) {
            foreach ($files as $file) {
                $data = include $file;

                if (is_array($data)) {
                    $config = array_merge($config, $data);
                }
            }
        }
    
        return $configName === null ? $config : $config[$configName] ?? null;
    }

    public static function glob(string $pattern, int $flags = 0)
    {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
        { 
            $files = array_merge($files, self::glob($dir.'/'.basename($pattern), $flags));
        }

        return $files;
    }
}
