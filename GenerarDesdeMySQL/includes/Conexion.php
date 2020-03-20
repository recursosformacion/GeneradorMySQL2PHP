<?php



class Conexion
{

    private static $instance;

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = self::connect();
        }
        return self::$instance;
    }

    public static function connect()
    {
        
        try {
            $dsn = "mysql:host={$_SESSION['host']};";
            $pdo = new PDO($dsn, $_SESSION['usuario'], $_SESSION['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <--Activa exception
            $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // <--. Fuerza a los nombres de las columnas a may�sculas o min�sculas, CASE_UPPER).
        } catch (Exception $e) {
            die("No se pudo conectar: " . $e->getMessage());
        }
        return $pdo;
    }

    static function disConnect()
    {
        self::$instance = null;
    }
    function acceder(PDOStatement $stmt):array
    {
        $stmt->setFetchMode(PDO::FETCH_CLASS ,  $this->modelo );
        $stmt->execute();
        return $stmt->fetchAll();
    }


}









