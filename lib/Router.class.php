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
                self::$response = Application::db()->info;
                break;
        }
    }

    public static function getResponse()
    {
        return self::$response;
    }
}