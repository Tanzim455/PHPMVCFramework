<?php 
class Database{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $conn;

  public function connect(){
    try {
      $this->conn = null;
      $this->conn = new PDO("mysql:host=$this->servername;dbname=phpmvc", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $this->conn;
  }
 
}


?>