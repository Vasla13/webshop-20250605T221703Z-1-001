<?php
include("check_session.php");
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Fc Ottmarsheim</title>
	<link rel="stylesheet" type="text/css" href="../css/wwi_styles.css">
	<script src="../Js/functions.js"></script>
	<meta charset="utf-8">
</head>




<body background="../Bilder/stade_vue_de_haut.jpeg" width="auto" height="auto" style="background-size: cover;background-position: center;">
	<br>
	<div class="photogauche"><img src="../Bilder/sc-ottmarsheim-04f2cd94e9c7414f81961910f0ab33ee.jpg" width="auto" height="auto" align="top" alt="id_labor_image" /></div>
	<script>
		zoomPicByID("id_labor_image", 100)
	</script>

	<h1>Fc Ottmarsheim</h1>
	<hr>
	<h3>Herzlich Willkommen beim Fc Ottmarsheim club!"<?php echo $_SESSION["benutzer"] . " (" . $_SESSION["benutzerTyp"] . " " . $_SESSION["BenutzerIP"] . ")" ?>"!</h3>
	<h3>Die beste Mannschaft der region</h3>


	<hr>

</body>

</html>