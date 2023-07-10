<?php
	session_start();
	
	$conn = new mysqli('localhost','root','','myworlddb');
	
	$unsuccessfulmsg = '';

	if(isset($_POST['submit'])){
		$users_email 			= $_POST['users_id'];
		$users_password 		= $_POST['users_password'];
		$passwordmd5 	= md5($users_password);
		
		if(empty($users_id)){
			$idmsg = 'Enter an id.';
		}else{
			$idmsg = '';
		}
		
		if(empty($users_password)){
			$passmsg = 'Enter your password.';
		}else{
			$passmsg = '';
		}
		
		if(!empty($users_id) && !empty($users_password)){
			$sql = "SELECT * FROM users WHERE users_id ='$users_id' AND users_password = '$passwordmd5'";
			$query = $conn->query($sql);
			
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				$users_email = $row['users_email'];
				
				
				$_SESSION['users_email'] = $users_email;
				
				header('location:dashboard.php');
			}else{
				$unsuccessfulmsg = 'Wrong email or Password!';
			}
		}
	}
?>




!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container">
			<div class="container" style="margin-top:50px">
				<h3 class="text-center">Login System</h3>
				<p class="text-center text-success">
				<?php if(!empty($_SESSION['signupmsg'])){ echo $_SESSION['signupmsg']; } ?></p>
                <div class="hero">
        <div class="from-box">
            <div class="button-box">
                <div id="btn"></div>
               <button type="button" class="toggle-btn" onclick="login()">Log in</button>
               <button type="button" class="toggle-btn"onclick="register()">Register</button>
               

            </div>
            <div class="social-icons">
                <img src="fb.png">
                <img src="tw.png">
                <img src="gp.png">
            </div>
            <p class="text-center text-success">
				<?php if(!empty($_SESSION['signupmsg'])){ echo $_SESSION['signupmsg']; } ?></p>
            <form id="login" class="input-group">
               <div> <input type="text" class="input-field" placeholder="user Id" recuiredvalue="<?php if(isset($_POST['submit'])){echo $users_id; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $idmsg; }?></span></div>
               <div> <input type="text" class="input-field" placeholder="Enter Password"
                 recuired><span class="text-danger"><?php if(isset($_POST['submit'])){ echo $passmsg; }?></span>
</div>
                 <br>
                <input type="checkbox" class="chech-box" ><span>Remember Password</span>
               
               
               
                
               
                
                
                <button type="submit" class="submit-btn">Log in</button>
            </form>
	</body>
</html>