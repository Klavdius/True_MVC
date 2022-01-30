<?php
//namespace Tools;

define('DS', DIRECTORY_SEPARATOR);
define('BD', dirname(__DIR__));

spl_autoload_register(function ($className) {
    $filePath = BD . DS . 'Code' . DS . 'Class' . DS . str_replace('\\', DS, trim($className, '\\') . '.php');
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

class App
{
    private static \Core\Model\Db\Connection $dbConnection;

    public static function getDbConnection(): \Core\Model\Db\Connection
    {
        if (!isset(self::$dbConnection)) {
            self::$dbConnection = new \Core\Model\Db\Connection();
        }
        return self::$dbConnection;
    }

    public static function run()
    {
        Route::Run();
    }
}

class Route
{
    public static function Run()
    {
        $dispatcher = new \Core\Controller\Front();
        $dispatcher->dispatch();
//        phpinfo();
    }
}

