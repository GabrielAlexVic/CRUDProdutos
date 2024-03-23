<?php

class usePDO {

  private $servername = "localhost";
  private $username = "root";
  private $password = "root";
  private $dbname = "CRUDProdutos";
  private $instance;

  function getInstance() {
    if(empty($instance)){
			$instance = $this->connection();
		}
		return $instance;
  }
  
  private function connection(){
		try {
			$pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username,$this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage() . "<br>";
			if(strpos($e->getMessage(), "Unknown database 'meubanco'")){
				echo "Conexão nula, criando o banco pela primeira vez". "<br>";
				$conn = $this->createDB();
				return $conn;
			}
			else
				die("Connection failed: " . $e->getMessage() . "<br>");
		}
	}
  
	function createDb(){
		try{
			$cnx = new PDO("mysql:host=$this->servername", $this->username,$this->password);
    		$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
			$cnx->exec($sql);
			return $cnx;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}
  
	function createTable(){
		try{
			$cnx = $this->getInstance();
			$sql = "CREATE TABLE IF NOT EXISTS user (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				userName VARCHAR(50) NOT NULL,
				fullName VARCHAR(50) NOT NULL,
				email VARCHAR(50) NOT NULL,
				passwordHash VARCHAR(50) NOT NULL
			)";

			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

}

?>