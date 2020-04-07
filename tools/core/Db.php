<?php

namespace tools\core;

class Db
{
    private static $instance;

    private function __construct(){}
    private function __clone(){}

    public static function instance()
    {
        if (self::$instance === null) {
            $dsn = 'sqlite:'.DATABASE;
            $opt = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => true,
            ];
            self::$instance = new \PDO($dsn, null, null, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array([self::instance(), $method], $args);
    }

    public static function run($sql, $args = [])
    {
        if (!$args) {
            return self::instance()->query($sql);
        }
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
