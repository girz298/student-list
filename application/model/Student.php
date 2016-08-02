<?php 
class Student{
	private $name;
	private $surname;
	private $group_number;
	private $score;
	private $email;

	function __construct($name, $surname , $group_number, $score, $email){
		$this->setName($name);
		$this->setSurName($surname);
		$this->setGroupNumber($group_number);
		$this->setScore($score);
		$this->setEmail($email);
	}

	public function setName($name){
		if(mb_strlen($name) > 20){
			throw new Exception("\nОШИБКА: Слишком длинное Имя!");		
		}elseif (mb_strlen($name) == 0) {
			throw new Exception("\nОШИБКА: Имя не может быть пустым!");
		}
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function echoName(){
		echo "{$this->name} \n";
	}

	public function setSurName($surname){
		if(mb_strlen($surname) > 20){
			throw new Exception("\nОШИБКА: Слишком длинная Фамилия!");		
		}elseif (mb_strlen($surname) == 0) {
			throw new Exception("\nОШИБКА: Фамилия не может быть пустой!");
		}
		$this->surname = $surname;
	}

	public function getSurName(){
		return $this->surname;
	}

	public function echoSurName(){
		echo "{$this->surname} \n";
	}

	public function setGroupNumber($group_number){
		if (!is_integer($group_number)){
			throw new Exception("\nОШИБКА: Номер группы должен быть целым числом!");
		}elseif ($group_number < 0) {
			throw new Exception("\nОШИБКА: Номер группы не может быть отрицательным!");	
		}elseif ($group_number > 999999) {
			throw new Exception("\nОШИБКА: Слишком большой номер группы!");
		}
		$this->group_number = $group_number;
	}

	public function getGroupNumber(){
		return $this->group_number;
	}

	public function setScore($score){
		if (!is_integer($score)){
			throw new Exception("\nОШИБКА: Количетво баллов должено быть целым числом!");
		}elseif ($score < 0) {
			throw new Exception("\nОШИБКА: Количетво баллов не может быть отрицательным!");	
		}elseif ($score > 400) {
			throw new Exception("\nОШИБКА: Слишком большое количество баллов!");
		}
		$this->score = $score;
	}

	public function getScore(){
		return $this->score;
	}

	public function setEmail($email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new  Exception("Некорректный EMAIL");
		}
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}
}
