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
                <label for="uname"><b>Delete Users</b></label>
                <table>
                    <?php
                        require_once 'Dao.php';
                        $dao = new Dao();
                        $users = $dao->getAllUsers();
                        foreach($users as $user){
                            $uname = $user['username'];
                            $date = $user['datecreated'];

                            echo "<tr>";
                            echo "<td class='check'><input type='checkbox' name='" . $uname . "' value='" . $uname . "'/></td>";
                            echo "<td class='name'>" . $uname . "</td>";
                            echo "<td class='date'>" . $date . "</td>";
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
                <button type="button" class="cancelbtn" onclick="window.location.href = 'Admin.php';">Cancel</button>
                <button type="submit" class="cancelbtn">Delete Selected</button>
			</div>
		</form>
		
		<div></div>
		<?php require_once("Footer.php");?>
	</body>


</HTML>