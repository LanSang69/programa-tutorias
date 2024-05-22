<?php
class Database {
    private $con;

    public function __construct($host, $username, $password, $dbname) {
        $this->con = mysqli_connect($host, $username, $password, $dbname);

        if (!$this->con) {
            die('Error al conectar a la base de datos: ' . mysqli_connect_error());
        }
    }

    public function makeQuery($query) {
        $result = mysqli_query($this->con, $query);
        if (!$result) {
            die('Error executing query: ' . mysqli_error($this->con));
        }

        return $result;
    }

    public function fetchAll($query) {
        $result = $this->makeQuery($query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function fetchOne($query) {
        $result = $this->makeQuery($query);
        return mysqli_fetch_assoc($result);
    }

    public function __destruct() {
        mysqli_close($this->con);
    }
}
?>
