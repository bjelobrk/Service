<?php
class Database2 {
    private static $dsn = 'mysql:host=localhost;dbname=log';
    private static $username = 'root';
    private static $password = 'bjelobrk';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>