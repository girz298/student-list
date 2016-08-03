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
				<form class="form-inline" action="index.php" role="form" method="post">
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

		$dbs = SingletonDatabase::getInstance();
		$pdo = $dbs->getPDOConnection();

		$studentMapper = new StudentMapper($pdo);


		if ($_POST["name"]) {
			$arrOfStudentsByNameSergey = $studentMapper->getByName($_POST["name"]);
		}else{
			$arrOfStudentsByNameSergey = $studentMapper->getAllByPage(1);
		}

		?>
		
	</body>
	<footer>
		<script type="text/javascript" src="libs/jquery-3.1.0/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</footer>
</html>