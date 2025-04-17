<?php

namespace App\Config;

class Config
{
    private static array $config = [];
    
    public static function load(): void
    {
        self::$config = require __DIR__ . '../config/database.php';
    }

    public static function get(string $key): string
    {
        return self::$config[$key] ?? null;
    }
}