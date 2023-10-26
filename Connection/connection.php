<?php
class BancoDeDados
{
    // Instância da classe
    private static $instance = null;
    private $conn;

    // Construtor privado: só a própria classe pode invocá-lo
    private function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pswd = "root";
        $db = "cinema";

        try {
            $this->conn = new mysqli($host, $user, $pswd, $db);
            $this->conn->set_charset('utf8');
        } catch (Exception $e) {
            die("Erro na conexão com MySQL! " . $e->getMessage());
        }
    }

    // método estático
    public static function getInstance()
    {
        // Já existe uma instância?
        if (self::$instance == null) {
            self::$instance = new BancoDeDados();   // Não existe, cria a instância 
        }
        return self::$instance;                     // Já existe, simplesmente retorna
    }

    public function executeSQL($sql_query) {
        $result = $this->conn->query($sql_query);

        if ($result === false) {
            echo "Error executing SQL: " . $this->conn->error;
            return false;
        }

        return true; // For successful non-SELECT queries
    }

    // Previne o uso de clone
    private function __clone() {}
}

?>