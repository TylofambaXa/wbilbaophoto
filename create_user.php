<?php $thisPage="Login"; ?>
<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="create_userStyle.css">
		<link rel="shortcut icon" href="Images/favicon.png" type="image/png"/>
	</head>
	<body>
		<?php require_once("Header.php");?>
		<form method="post" action="create_user_handler.php">
			<div class="container">
				<label for="uname"><b>Username</b></label>
				<input <?php if(isset($_SESSION['create_info']['usrname']))echo "value=" . $_SESSION['create_info']['usrname']; ?> type="text" placeholder="Enter Username" name="usrname" required>
                <?php
				session_start();
				if (isset($_SESSION['messageBad_Username'])) {
					echo "<div class='message bad'>" . $_SESSION['messageBad_Username'] . "</div>";
					unset($_SESSION['messageBad_Username']);
				}
				?>

                <label for="email"><b>Email Address</b></label>
				<input <?php if(isset($_SESSION['create_info']['email']))echo "value=" . $_SESSION['create_info']['email']; ?> type="email" placeholder="Enter Email" name="email" required>
                <?php
				session_start();
				if (isset($_SESSION['messageBad_Email'])) {
					echo "<div class='message bad'>" . $_SESSION['messageBad_Email'] . "</div>";
					unset($_SESSION['messageBad_Email']);
				}
				?>
                <div id="top_pswd"></div>
				<label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pswd" required>

                <label for="psw"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="cpswd" required>
				<?php
				session_start();
				if (isset($_SESSION['messageBad'])) {
					echo "<div class='message bad'>" . $_SESSION['messageBad'] . "</div>";
					unset($_SESSION['messageBad']);
				}
				?>
				<button type="submit">Create user</button>
			</div>

			<div class="container" id="cancel-container">
				<button type="button" class="cancelbtn" onclick="window.location.href = 'Admin.php';">Cancel</button>
			</div>
		</form>
		
		<div></div>
		<?php require_once("Footer.php");?>
	</body>


</HTML>