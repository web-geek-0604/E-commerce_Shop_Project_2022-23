<?php
class DB{
    private $db;
    public function connect(){
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->db=@mysqli_connect("localhost", "root", "", "gwarehouse_db");
        if(!$this->db){
            echo "Greška prilikom konekcije na bazu!!!<br>";
            echo mysqli_connect_errno().": ".mysqli_connect_error()."<br>";
            return false;
        }
        $this->query("SET NAMES utf8");
        return $this->db;
    }

    public function query($sql){
        return mysqli_query($this->db, $sql);
    }
    public function error(){
        if(mysqli_error($this->db))return mysqli_errno($this->db).": ".mysqli_error($this->db);
        else return false;
    }
}
?>