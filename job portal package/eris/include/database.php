<?php
require_once(LIB_PATH . DS . "config.php");

class Database {

    private $conn;
    public $last_query;
    public $sql_string = '';
    public $error_no = 0;
    public $error_msg = '';

    function __construct() {
        $this->open_connection();
    }

    public function open_connection() {

        $this->conn = mysqli_connect(server, user, pass);

        if (!$this->conn) {
            echo "Problem in database connection! Contact administrator!";
            exit();
        }

        $db_select = mysqli_select_db($this->conn, database_name);

        if (!$db_select) {
            echo "Problem selecting database! Contact administrator!";
            exit();
        }
    }

    function setQuery($sql = '') {
        $this->sql_string = $sql;
    }

    function executeQuery() {
        $result = mysqli_query($this->conn, $this->sql_string);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result) {
        if (!$result) {
            $this->error_no = mysqli_errno($this->conn);
            $this->error_msg = mysqli_error($this->conn);
            return false;
        }
        return $result;
    }

    function loadResultList($key = '') {
        $cur = $this->executeQuery();

        $array = [];
        while ($row = mysqli_fetch_object($cur)) {
            if ($key) {
                $array[$row->$key] = $row;
            } else {
                $array[] = $row;
            }
        }
        mysqli_free_result($cur);
        return $array;
    }

    function loadSingleResult() {
        $cur = $this->executeQuery();
        $row = mysqli_fetch_object($cur);
        mysqli_free_result($cur);
        return $row;
    }

    function getFieldsOnOneTable($tbl_name) {
        $this->setQuery("DESC " . $tbl_name);
        $rows = $this->loadResultList();

        $f = [];
        foreach ($rows as $row) {
            $f[] = $row->Field;
        }
        return $f;
    }

    public function fetch_array($result) {
        return mysqli_fetch_array($result);
    }

    public function num_rows($result_set) {
        return mysqli_num_rows($result_set);
    }

    public function insert_id() {
        return mysqli_insert_id($this->conn);
    }

    public function affected_rows() {
        return mysqli_affected_rows($this->conn);
    }

    // ✔ FIXED for PHP 7/8 (get_magic_quotes_gpc removed)
    public function escape_value($value) {
        return mysqli_real_escape_string($this->conn, $value);
    }

    public function close_connection() {
        if (isset($this->conn)) {
            mysqli_close($this->conn);
            unset($this->conn);
        }
    }
}

$mydb = new Database();

?>
