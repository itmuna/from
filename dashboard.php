<?php 
	session_start();
	echo '<h1>Welcome '.$_SESSION['user_id'].' </h1>';
?>
<p><a href="logout.php">Log Out</a></p>