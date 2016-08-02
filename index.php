<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
	<div style="text-align: center">
		<h2>Hello WORLD!</h2>
	</div>
	<?php
	error_reporting(-1);
	mb_internal_encoding("utf-8");
	
	include("application/model/Student.php");
	include("application/controller/StudentMapper.php");
	include("application/helpers/SingletonDatabase.php");

	$dbs = SingletonDatabase::getInstance();
	$pdo = $dbs->getPDOConnection();

	$studentMapper = new StudentMapper($pdo);

	$first_student = new Student("Sergey", "Rodionov", 321702, 242,"girz298@gmail.com");

	$second_student = new Student("Vanya", "Rodionov", 321702, 242,"vanya298@gmail.com");
	// $second_student = new Student("Vanya", "Rodionov", 32170200, 242,"vanya298@gmail.com");

	$studentMapper->insertStudent($first_student);
	$studentMapper->insertStudent($second_student);

	$arrOfStudentsByNameSergey = $studentMapper->getByName("Sergey");
	?>
	<br>
	<table cellpadding="5" cellspacing="0" border="2" width="100%" frame="border" align="center" ">
		<caption>Список студентов</caption>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Номер группы</th>
		<th>Баллы</th>
		<?php 
		foreach ($arrOfStudentsByNameSergey as $key => $value) {
		?>
			<tr>
				<td><?php echo $value["name"] ?></td>
				<td><?php echo $value["surname"] ?></td>
				<td><?php echo $value["group_number"] ?></td>
				<td><?php echo $value["score"] ?></td>
			</tr>
		<?php  	
		}
		?>
	</table>
	

	<div class="main-text">
		<ul>
		 		<li>
		 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim dolorem necessitatibus ad iste, harum commodi veniam magni vero, iure temporibus laudantium, inventore in numquam maxime sunt repudiandae id nesciunt doloremque!</p>
		 		</li>
		 		<li>
		 			<p>Magnam sunt cumque beatae adipisci libero atque, ipsa, voluptatem distinctio qui ex in tempora! Quibusdam voluptatem consequatur quod accusantium, officia facilis doloremque reprehenderit sunt velit! Incidunt error dignissimos ullam voluptatum.</p>
		 		</li>
		 		<li>
		 			<p>Fugit expedita quaerat iure reprehenderit voluptates minus repudiandae odit repellat mollitia, quas amet, commodi veniam vitae fuga. Eos voluptate voluptatem, fuga impedit pariatur earum nulla nemo. Beatae blanditiis corporis illum.</p>
		 		</li>
		 		<li>
		 			<p>Optio, minus? Pariatur autem provident deserunt inventore porro vitae, in doloribus perspiciatis facere amet dicta modi, repellat aperiam molestiae explicabo, veritatis. Sapiente vitae rerum reprehenderit officiis ea, totam accusantium qui.</p>
		 		</li>
		 		<li>
		 			<p>Officia a voluptate cum at, voluptatem quo fugiat sequi pariatur, maiores nobis culpa labore, dolore praesentium blanditiis eaque maxime itaque ipsa exercitationem illo mollitia atque, cumque ullam unde accusamus? Expedita?</p>
		 		</li>
		 		<li>
		 			<p>Magnam ab, distinctio quidem dicta magni deserunt laborum ullam illum nulla ad incidunt tempora minima, a, maxime obcaecati ipsum id officiis quia tempore odit. Modi nihil exercitationem maiores et ducimus.</p>
		 		</li>
		 		<li>
		 			<p>Deleniti aspernatur vitae consequatur distinctio, architecto incidunt ullam repudiandae placeat ipsum, consectetur veniam sunt nihil, voluptate necessitatibus, quam. Excepturi tenetur vitae ratione ullam explicabo atque, odit nam laboriosam harum accusamus.</p>
		 		</li>
		 		<li>
		 			<p>Porro molestiae eaque, illum? Praesentium similique, assumenda, impedit eum veniam cum doloribus dolore facilis est exercitationem fugiat dolorem quo expedita amet maiores voluptatum perspiciatis dignissimos nostrum soluta temporibus quas debitis!</p>
		 		</li>
		 		<li>
		 			<p>Voluptas, inventore. Animi quas neque doloremque vitae eum quis! In aliquam maxime at minima, laboriosam optio accusamus soluta quaerat, facere incidunt inventore ad error est! Ipsum laboriosam voluptates exercitationem molestias?</p>
		 		</li>
		 		<li>
		 			<p>Facilis corporis necessitatibus quaerat placeat ea at quam aliquid magnam, praesentium exercitationem harum dolorem laboriosam assumenda facere vero ex veritatis rem eveniet amet, pariatur commodi consequuntur explicabo illo. Distinctio, iure.</p>
		 		</li>
		 	</ul> 	
	</div>
	</body>
</html>