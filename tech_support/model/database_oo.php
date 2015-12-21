<?php
class Database{
    private static $dsn = 'mysql:host=localhost;dbname=tech_support';
    private static $username = 'ts_user';
    private static $password = 'pa55word';
    private static $db;
    
    private function __construct(){}
    public static function getDB(){
        try {
        self::$db = new PDO(self::$dsn, self::$username, self::$password);
        return self::$db;
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
        }
        
    }
        
    
}
?>

