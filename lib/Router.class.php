<?php

class Router
{
    private static $response;

    public static function parse($route)
    {
        self::$response = 'jay! ' . $route;
    }

    public static function getResponse()
    {
        return self::$response;
    }
}