<?php $thisPage="Home"; ?>
<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="GalleryStyle.css">
		<link rel="shortcut icon" href="Images/favicon.png" type="image/png"/>
		<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
		<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	</head>
	<body>
		<?php require_once("Header.php");?>
		<div id="Gallery-Content">
			<span class="img-element Left-Image">
				<a data-fancybox="gallery" href="Images/Gallery/DSC_1082.jpg"><img class="Vertical" src="Images/Gallery/DSC_1082.jpg"/></a>
			</span>
			<span class="img-element Vertical">
				<a data-fancybox="gallery" href="Images/Gallery/DSC_2196.jpg"><img class="Vertical" src="Images/Gallery/DSC_2196.jpg"/></a>
			</span>
			<span class="img-element Vertical">
				<a data-fancybox="gallery" href="Images/Gallery/DSC_6389.jpg"><img class="Vertical" src="Images/Gallery/DSC_6389.jpg"/></a>
			</span>
			<span class="img-element Horizontal">
				<a data-fancybox="gallery" href="Images/Gallery/DSC00077.jpg"><img class="Horizontal Left-Image" src="Images/Gallery/DSC00077.jpg"/></a>
			</span>
			<span class="img-element Horizontal">
				<a data-fancybox="gallery" href="Images/Gallery/DSC_4720.jpg"><img class="Horizontal" src="Images/Gallery/DSC_4720.jpg"/></a>
			</span>
			<span class="img-element Horizontal2">
				<a data-fancybox="gallery" href="Images/Gallery/DSC_5088.jpg"><img class="Horizontal2 Left-Image" src="Images/Gallery/DSC_5088.jpg"/></a>
			</span>
			<span class="img-element Horizontal2">
				<a data-fancybox="gallery" href="Images/Gallery/DSC_5411.jpg"><img class="Horizontal2" src="Images/Gallery/DSC_5411.jpg"/></a>
			</span>
			<span class="img-element Horizontal3">
				<a data-fancybox="gallery" href="Images/Gallery/DSC00090.jpg"><img class="Horizontal3 Left-Image" src="Images/Gallery/DSC00090.jpg"/></a>
			</span>
			<span class="img-element Horizontal3">
				<a data-fancybox="gallery" href="Images/Gallery/DSC00919.jpg"><img class="Horizontal3" src="Images/Gallery/DSC00919.jpg"/></a>
			</span>
			
		</div>

		<div></div>
		<?php require_once("Footer.php");?>
	</body>


</HTML>
