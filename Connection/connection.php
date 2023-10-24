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
            echo "deu bom";
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

    // Previne o uso de clone
    private function __clone() {}
}

?>