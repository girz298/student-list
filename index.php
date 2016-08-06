<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="libs/bootstrap-3.3.7-dist/css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="libs/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<!-- Require JQuerry !!! -->
	<!-- <link rel="stylesheet" type="text/css" href="libs/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css"> -->

</head>
<body>
	<div class="container">
		<div class="row second-row">
			<div class="main-text-label col-md-4 ">
				<a href="/">Список абитуриентов</a>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form class="form-inline" action="/" role="form" method="get">
					<div class="form-group">
						<label for="search-by-name">Поиск:</label>
						<input type="text" name ="name" class="form-control" id="search-by-name">
					</div>
					<button type="submit" class="btn btn-default">Найти</button>
				</form>
			</div>
		</div>
		
		<?php
		error_reporting(-1);
		mb_internal_encoding("utf-8");
		
		include("application/model/Student.php");
		include("application/controller/StudentMapper.php");
		include("application/helpers/SingletonDatabase.php");
		include("application/helpers/Pagination.php");

		$dbs = SingletonDatabase::getInstance();
		$pdo = $dbs->getPDOConnection();

		$studentMapper = new StudentMapper($pdo);

		if (isset($_POST["name_add"])){
			$new_student = new Student($_POST["name_add"],$_POST["surname"],
				(int)$_POST["group_number"],(int)$_POST["score"],$_POST["email"]);
			$studentMapper->insertStudent($new_student);
		}

		if (isset($_GET["name"])) {
			$arrOfStudentsByNameSergey = $studentMapper->getByName($_GET["name"]);
		}else{
			$arrOfStudentsByNameSergey = $studentMapper->
			getAllByPage(isset($_GET["page"])?(int)$_GET["page"]:1);
		}

		?>
		<div class="row">
			<div class="col-md-1">
				<a href="add.php">
					<button type="submit" class="btn btn-primary btn-add-student">
						Добавить
					</button>
				</a>
			</div>
			<!-- <div class="col-md-1">
				<button type="submit" class="btn btn-danger btn-add-student">
					<a href="delete.php">Удалить</a>
				</button>
			</div> -->
			<div class="col-md-10 student-table">
				<table class="table table-striped" cellpadding="5" cellspacing="0" width="100%" align="center">
					<th style="text-align: center;">Имя</th>
					<th style="text-align: center;">Фамилия</th>
					<th style="text-align: center;">Номер группы</th>
					<th style="text-align: center;">Баллы</th>
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
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-9"></div>
			<div class="col-md-2">
		
			<form class="form-inline" action="/" role="form" method="get">
			<?php
			if (!isset($_GET["name"])) {
				$paginator  = new Paginator();
				$paginator->makePager(isset($_GET["page"])?$_GET["page"]:1,
					$studentMapper->getCountOfPages(),1,$studentMapper->getCountOfPages()-2);
			}
			?>
			</form>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	</body>
	<footer>
		<script type="text/javascript" src="libs/jquery-3.1.0/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</footer>
</html>