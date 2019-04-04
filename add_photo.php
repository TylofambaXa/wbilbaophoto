<?php require_once("Authentication.php");?>
<?php $thisPage="Login"; ?>
<?php $thisPage="Login"; ?>
<HTML>
	<head>
        <link rel="shortcut icon" href="Images/favicon.png" type="image/png"/>
	</head>
		<link rel="stylesheet" type="text/css" href="add_photoStyle.css">
	<body>
		<?php require_once("Header.php");?>
		<form method="post" action="add_photo_handler.php" enctype="multipart/form-data">
			<div class="container">
                <label for="uname"><b>Add photos for user</b></label>
                <table>
                    <?php
                        require_once 'Dao.php';
                        $dao = new Dao();
                        $users = $dao->getAllUsers();
                        foreach($users as $user){
                            $uname = $user['username'];
                            $date = $user['datecreated'];

                            echo "<tr>";
                            echo "<td class='check'><input type='radio' name='radio' value='" . $uname . "'/></td>";
                            echo "<td class='name'>" . $uname . "</td>";
                            echo "<td class='date'>" . $date . "</td>";
                            echo "<tr>";
                        }
                    ?>
                </table>
                <input type="file" name="files[]" accept="image/*" multiple>
                
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
                <button type="submit" class="cancelbtn">Submit</button>
			</div>
		</form>
		
		<div></div>
		<?php require_once("Footer.php");?>
	</body>


</HTML>