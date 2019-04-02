<?php require_once("Authentication.php");?>
<?php $thisPage="Login"; ?>
<HTML>
	<head>
        <link rel="stylesheet" type="text/css" href="AdminStyle.css">
        <link rel="shortcut icon" href="Images/favicon.png" type="image/png"/>
	</head>
	<body>
		<?php require_once("Header.php");?>
            <div id="admin_container">
                <?php
				session_start();
				if (isset($_SESSION['messageGood'])) {
					echo "<div class='message good'>" . $_SESSION['messageGood'] . "</div>";
					unset($_SESSION['messageGood']);
				}
				?>
                <button class="action_button" onclick="window.location.href = 'create_user.php';">Create user</button>
                <button class="action_button" onclick="window.location.href = 'delete_user.php';">delete user</button>
                <button class="action_button" onclick="window.location.href = 'add_photo.php';">add photos</button>
            </div>

		<?php require_once("Footer.php");?>
	</body>


</HTML>