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

		<div class="student-add-form">
			<form class="form-horizontal" action="/" role="form" method="post">
			<fieldset>

			<!-- Form Name -->
			<legend>
				<div class="main-text-label">
					<a href="/">Список абитуриентов :: </a>
					<a href="/">добавить абитуриента</a>
				</div>
			</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name_add">Имя</label>  
			  <div class="col-md-4">
			  <input id="name_add" name="name_add" type="text" placeholder="Введите свое имя" class="form-control input-md" required="" pattern="[А-Яа-яЁё]{2,20}">
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="surname">Фамилия</label>  
			  <div class="col-md-4">
			  <input id="surname" name="surname" type="text" placeholder="Введите свою фамилию" class="form-control input-md" required="" pattern="[А-Яа-яЁё]{2,20}">
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="email">Email</label>  
			  <div class="col-md-4">
			  <input id="email" name="email" type="text" placeholder="Введите свой email" class="form-control input-md" required="" pattern="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$">
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="group_number">Номер группы</label>  
			  <div class="col-md-4">
			  <input id="group_number" name="group_number" type="text" placeholder="Введите номер группы" class="form-control input-md" required="" pattern="[0-9]{1,6}">
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="score">Баллы</label>  
			  <div class="col-md-4">
			  <input id="score" name="score" type="text" placeholder="Введите количество баллов" class="form-control input-md" required="" pattern="[0-9]{2,3}">
			    
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="signup"></label>
			  <div class="col-md-4">
			    <button type="submit" id="signup" name="signup" class="btn btn-success">Добавить</button>
			  </div>
			</div>

			</fieldset>
			</form>
		</div>
	</body>
	<footer>
		<script type="text/javascript" src="libs/jquery-3.1.0/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</footer>
</html>