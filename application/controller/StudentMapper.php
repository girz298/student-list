<?php 
error_reporting(-1);
mb_internal_encoding("utf-8");
class StudentMapper{
	private $PDO;

	public function insertStudent(Student $student){
		try {
			$data = [$student->getName(),$student->getSurName(),$student->getGroupNumber(),
				$student->getScore(),$student->getEmail()];
			$STH = $this->PDO->prepare("INSERT INTO students (name, surname, group_number, 
				score, email) values (?,?,?,?,?)");
			$STH->execute($data);

			$STH->closeCursor();
		} catch (PDOException $e) {
			echo $e->getMessage()."\n";
		}
	}

	public function getByName($name){
		try {
			$STH = $this->PDO->query("SELECT * FROM students WHERE name='{$name}'")->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			echo $e->getMessage()."\n";
		}
		return $STH;
	}

	public function __construct($PDO){
		$this->PDO = $PDO;
	}
}