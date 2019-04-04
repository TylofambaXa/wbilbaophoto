<?php require_once("Authentication.php");?>
<?php $thisPage="Login"; ?>
<?php $thisPage="Login"; ?>
<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="userStyle.css">
		<link rel="shortcut icon" href="Images/favicon.png" type="image/png"/>
	</head>
	<body>
		<?php require_once("Header.php");?>
		<form method="post" action="delete_user_handler.php">
			<div class="container">
                <label for="uname"><b>Download Photos</b></label>
                <table>
                    <?php
                        require_once 'Dao.php';
                        $dao = new Dao();
						$user = $_SESSION['login_info']['usrname'];
						$images = $dao->getImages($user);
						

                        foreach($images as $image){
							$filepath = $image['filepath'];

                            echo "<tr>";
                            echo "<td class='check'><input type='checkbox' name='" . $filepath . "' value='" . $filepath . "'/></td>";
                            echo "<td class='name'><img class='small_image' src='." . $filepath ."'></td>";
                            echo "<tr>";
                        }
                    ?>
				</table>
            </div>
            
            <?php
				session_start();
				if (isset($_SESSION['messageGood'])) {
					echo "<div class='message good'>" . $_SESSION['messageGood'] . "</div>";
					unset($_SESSION['messageGood']);
				}else if (isset($_SESSION['messageBad'])) {
					echo "<div class='message bad'>" . $_SESSION['messageBad'] . "</div>";
					unset($_SESSION['messageBad']);
				}
				?>

			<div class="container" id="cancel-container">
                <!-- <button type="button" class="cancelbtn" onclick="window.location.href = 'Admin.php';">Cancel</button> -->
                <!-- <button type="submit" class="cancelbtn">Download Selected</button> -->
			</div>
		</form>
		
		<div></div>
		<?php require_once("Footer.php");?>
	</body>


</HTML>