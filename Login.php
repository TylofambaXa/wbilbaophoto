<?php $thisPage="Login"; ?>
<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="LoginStyle.css">
		<link rel="shortcut icon" href="Images/favicon.png" type="image/png"/>
	</head>
	<body>
		<?php require_once("Header.php");?>
		<form method="post" action="Login_handler.php">
			<div class="container">
				<div id="note"><b>Note:</b> Please login with credentials provided by email.</div>
				<label for="uname"><b>Username</b></label>
				<input <?php if(isset($_SESSION['login_info']['usrname']))echo "value=" . $_SESSION['login_info']['usrname']; ?> type="text" placeholder="Enter Username" name="usrname" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="pswd" required>
				<?php
				session_start();
				if (isset($_SESSION['messageBad'])) {
					echo "<div class='message bad'>" . $_SESSION['messageBad'] . "</div>";
					unset($_SESSION['messageBad']);
				}elseif(isset($_SESSION['messageGood'])){
					echo "<div class='message good'>" . $_SESSION['messageGood'] . "</div>";
					unset($_SESSION['messageGood']);
				}
				?>
				<button type="submit">Login</button>
			</div>

			<div class="container" id="cancel-container">
				<button type="button" class="cancelbtn" onclick="window.location.href = 'Login.php';">Cancel</button>
				<span class="psw"><a href="#">Forgot password?</a></span>
			</div>
		</form>
		
		<div></div>
		<?php require_once("Footer.php");?>
	</body>


</HTML>