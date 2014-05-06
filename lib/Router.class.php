<?php

class Router
{
    private static $response;

    public static function parse($route)
    {
        switch ($route) {
            case '/':
            case 'home':
                self::$response = 'jay! ' . $route;
                break;
            case 'info':
                self::$response = 'MySQL Client Version: ' . Application::db()->client_info;
                break;
        }
    }

    public static function getResponse()
    {
        return self::$response;
    }
}