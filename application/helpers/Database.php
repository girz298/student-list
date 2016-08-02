<?php
class Database{
	private $username = "root";
	private $password = "root";
	private $dbname = "student_list";
	private $host = "localhost";
	private $pdo;

	public function getPDOConnection(){
		try{
			$this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", 
			$this->username, $this->password);
		} catch (PDOException $e) {
			echo $e->getMessage()."\n";
		}
		$this->setConfiguration();
		
		return $this->pdo;
	}

	private function setConfiguration(){
		try{
			$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch(PDOException $e){
			echo $e->getMessage()."\n";
		}
	}

	public function closeConnection(){
		try{
			$this->pdo = null;
		} catch(PDOException $e) {
			echo $e->getMessage()."\n";
		}
	}

}