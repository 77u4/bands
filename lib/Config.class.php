<?php

class Config
{
    private static $config;

    public function load()
    {
        $baseDir = dirname(__FILE__);
        $configFilePath = $baseDir . '/../etc/config.php';
        if (file_exists($configFilePath)) {
            include($configFilePath);
        } else {
            $msg = 'config not found. please copy etc/config.dist.php to etc/config.php and change it accordingly.';
            throw new Exception($msg, 2);
        }
        self::$config = $config;
    }

    public function get($key, $default = false)
    {
        $config = self::$config;
        if (\array_key_exists($key, $config)) {
            return $config[$key];
        }
        return $default;
    }
}