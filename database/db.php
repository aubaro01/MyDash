<?php
class DB {
    private $conn;

    // Conecta ao banco de dados
    public function connect() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conn = new mysqli("localhost", "root", "", "pcauto");
        $this->conn->set_charset("utf8mb4");
        if ($this->conn->connect_error) {
            die($this->conn->connect_error);
        }
    }

    // Envia uma consulta ao banco de dados
    public function send2db($sql, array $args = []) {
        try {
            $this->connect();
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception('Erro ao preparar a consulta: ' . $this->conn->error);
            }

            if (!empty($args)) {
                $types = '';
                $params = [];
                foreach ($args as $arg) {
                    if (is_float($arg)) {
                        $types .= 'd';
                    } elseif (is_integer($arg)) {
                        $types .= 'i';
                    } elseif (is_string($arg)) {
                        $types .= 's';
                    } else {
                        $types .= 'b';
                    }
                    $params[] = $arg;
                }

                // Associa os parâmetros da consulta
                $bind_names[] = $types;
                for ($i = 0; $i < count($params); $i++) {
                    $bind_name = 'bind' . $i;
                    $$bind_name = $params[$i];
                    $bind_names[] = &$$bind_name;
                }

                call_user_func_array([$stmt, 'bind_param'], $bind_names);
            }

            // Executa a consulta
            if (!$stmt->execute()) {
                throw new Exception('Erro ao executar a consulta: ' . $stmt->error);
            }

            // Retorna o resultado dependendo do tipo de consulta
            if (stripos($sql, 'select') !== false) {
                return $stmt->get_result();
            } elseif (stripos($sql, 'insert') !== false) {
                return $this->conn->insert_id; 
            } else {
                return $stmt->affected_rows;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Erro: ' . $e->getMessage());
        }
    }
}
?>
