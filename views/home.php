<?php
//Start User Session
session_start();
?>
<!-- THIS IS A HOME PAGE, FOR REGISTER USERS -->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Home</title>
</head>
<body>
	<h3>
		WELLCOME
		<?php echo strtoupper($_SESSION['account']);?>
	</h3>
	<h2>HOME</h2>
	<ul>
		<li><a href="consult.php">Calculate</a>
		</li>
		<li><a href="../test/test.php">Clean Data (only for test)</a></li>
		<li><a href="../test/test_distances.php">Distances (only for test)</a></li>
	</ul>


	<form name="logout" action="../index.php" method="post">
		<input name="logout_inp" type="submit" value="logout" />
	</form>
</body>
</html>