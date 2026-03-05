<?php

namespace App;

class Config
{
    public static string $secretKey;

    public static function init(): void
    {
        self::$secretKey = getenv('SECRET_KEY') ?: $_ENV['SECRET_KEY'] ?? 'your-secret-key-change-this-in-production';
    }
}

Config::init();
