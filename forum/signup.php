<?pfp require('action/signupAction.php') ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="web.css"/>
		<?php include 'includes/head.php'; ?>
		
		<title>Portfolio de BRABEZ Mehdi - Forum</title>
	</head>

	<body>
		<br/>
		<br/>
		<form class="container" method="POST">

			<?php
				if(isset($errorMsg)){
				echo '<p>'.$errorMsg.'</p>';
				}
			?>

			<div class="mb-3">
				<label for="exampleInputEmail" class="form-label">
					Pseudo
				</label>
				<input type="text" class="form-control" name="pseudo">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail" class="form-label">
					Lastname
				</label>
				<input type="text" class="form-control" name="lastname">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail" class="form-label">
					Firstname
				</label>
				<input type="text" class="form-control" name="firstname">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail" class="form-label">
					Password
				</label>
				<input type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
		</form>
	</body>
</html>