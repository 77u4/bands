<?php

/**
 * Description of newPHPClass
 *
 * @author tsia
 */
class Application
{
    private static $db;

    public static function run()
    {
        Config::load();
        self::connectDb();

        $route = '/';
        if (\array_key_exists('q', $_GET)) {
            $route = $_GET['q'];
        }
        Router::parse($route);

        $response = Router::getResponse();

        return $response;
    }

    private static function connectDb()
    {
        //get db connection settings from config
        $host = Config::get('dbhost');
        $username = Config::get('dbuser');
        $passwd = Config::get('dbpass');
        $dbname = Config::get('dbname');
        $port = Config::get('dbport');
        $socket = Config::get('dbsocket');

        //load default port and socket if not set in config
        if ($port === false) {
            $port = ini_get("mysqli.default_port");
        }

        if ($socket === false) {
            $socket = ini_get("mysqli.default_socket");
        }

        $db = new \mysqli($host, $username, $passwd, $dbname, $port, $socket);
        if ($db->connect_error) {
            $msg = 'could not connect to database: "' . $db->connect_error . '" (' . $db->connect_error . ')';
            throw new Exception($msg, '3');
        }

        self::$db = $db;
    }

    public static function db()
    {
        return self::$db;
    }
}