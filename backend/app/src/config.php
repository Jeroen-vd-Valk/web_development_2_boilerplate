<?php

namespace App;

class Config
{
    public static string $secretKey;
    public static string $domain;
    public static int $tokenExpirationHours;

    public static function init(): void
    {
        self::$secretKey = getenv('SECRET_KEY') ?: $_ENV['SECRET_KEY'] ?? 'your-secret-key-change-this-in-production';
        self::$domain = getenv('DOMAIN') ?: $_ENV['DOMAIN'] ?? 'http://localhost';
        self::$tokenExpirationHours = (int)(getenv('TOKEN_EXPIRATION_HOURS') ?: $_ENV['TOKEN_EXPIRATION_HOURS'] ?? 24);
    }
}

Config::init();
