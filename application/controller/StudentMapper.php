<?php 
error_reporting(-1);
mb_internal_encoding("utf-8");

class StudentMapper{
	private $PDO;

	public function __construct($PDO){
		$this->PDO = $PDO;
	}

	public function insertStudent(Student $student){
		try {
			$data = [$student->getName(),$student->getSurName(),$student->getGroupNumber(),
				$student->getScore(),$student->getEmail()];
			$STH = $this->PDO->prepare("INSERT INTO students (name, surname, group_number, 
				score, email) values (?,?,?,?,?)");
			$STH->execute($data);

			$STH->closeCursor();
		} catch (PDOException $e) {
			// echo $e->getMessage()."\n";
		}
	}

	public function getByName($name){
		try {
			$arrByName = $this->PDO->query("SELECT name,surname,group_number,score 
				FROM students WHERE name='{$name}'")->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			// echo $e->getMessage()."\n";
		}
		return $arrByName;
	}

	public function getAllByPage($page){
		if ($page == 1) {
			$page = 0;
		}
		$page = $page*10;
		try {
			$arrByPage = $this->PDO->query("SELECT name,surname,group_number,score 
				FROM students LIMIT {$page},10")->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			// echo $e->getMessage()."\n";
		}
		return $arrByPage;
	}

	public function getCountOfPeoples(){
		try {
			$countOfPeoples = $this->PDO->query("SELECT COUNT(*) FROM students")->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			// echo $e->getMessage()."\n";
		}
		return $countOfPeoples[0]["COUNT(*)"];
	}
}