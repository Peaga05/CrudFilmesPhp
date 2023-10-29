<?php
class BancoDeDados
{
    private static $instance = null;
    private $conn;

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
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new BancoDeDados();
        }
        return self::$instance; 
    }

    public function executeSQL($sql_query) {
        $result = $this->conn->query($sql_query);

        if ($result === false) {
            echo "Error executing SQL: " . $this->conn->error;
            return false;
        }
        return true;
    }

    public function executeBusca($sql_query) {
        $result = $this->conn->query($sql_query);
        return $result;
    }

    public function fecharConexao(){
        $this->conn->close();
    }

    private function __clone() {}
}

?>