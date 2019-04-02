<html>
	<head>
		<title>WBilbao Photos</title>
		
		<link rel="stylesheet" type="text/css" href="HeadStyles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="Icons.css">
	</head>
	<body>
		<?php session_start(); ?>
		<div class = "banner">
			<div class="logo">
				<a href="index.php"><img id="logo-img" src="Images/logo.png"/></a>
			</div>
			<div class="navigation">
				<ul id="links">
					<li>
						<a href="index.php" <?php if ($thisPage=="Home") 
						echo " id=\"currentpage\""; ?>>Gallery</a>
					</li>
					<li>
						<a href="About.php" <?php if ($thisPage=="About") 
						echo " id=\"currentpage\""; ?>>About</a>
					</li>
					<li>
						<a href="Contact.php" <?php if ($thisPage=="Contact") 
						echo " id=\"currentpage\""; ?>>Contact</a>
					</li>
					<li>
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true){ ?>
                            <a href="Admin.php" <?php if ($thisPage=="Login") 
						    echo " id=\"currentpage\""; ?>>Admin</a>
                        <?php }else if (isset($_SESSION['admin']) && $_SESSION['admin'] == false){ ?>
                            <a href="User.php" <?php if ($thisPage=="Login") 
						    echo " id=\"currentpage\""; ?>>Your photos</a>
                        <?php }else{ ?>
                            <a href="Login.php" <?php if ($thisPage=="Login") 
						    echo " id=\"currentpage\""; ?>>Login</a>
                        <?php } ?>
					</li>
					<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ ?>
						<li>
							<a href="Logout_handler.php">Logout</a>
						</li>
					<?php } ?>
				</ul>
				
				<ul id="icons">
					<li id="icon-element"><a href="https://www.instagram.com/bilbaowhitneyphoto/" class="fa fa-instagram"></a></li>
					<li id="icon-element"><a href="https://www.facebook.com/bilbaowhitneyphoto/" class="fa fa-facebook"></a></li>
					<li id="icon-element"><a href="https://twitter.com/BilbaoWhitney?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="fa fa-twitter"></a></li>
				</ul>
			</div>
		</div>	
	

	</body>

</html>
