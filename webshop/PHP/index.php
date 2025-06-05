<?php
include("connect.php");

session_start();
$_SESSION["benutzer"] = "Gast";
$_SESSION["benutzerTyp"] = "Gast";

$SUBMIT_LOGIN = (isset($_POST['SUBMIT_LOGIN'])) ? $_POST['SUBMIT_LOGIN'] : '';
$EDIT_USER = (isset($_POST['EDIT_USER'])) ? $_POST['EDIT_USER'] : '';
$EDIT_PASSWD = (isset($_POST['EDIT_PASSWD'])) ? $_POST['EDIT_PASSWD'] : '';
//echo "jetzt";
if ($SUBMIT_LOGIN) {
	//echo "drin";
	$sql = "SELECT * FROM benutzer";
	if (!($result = mysqli_query($conn, $sql))) {
		die("<H3>Fehler beim SELECT des Benutzers</h3><br>");
	}

	while ($row = mysqli_fetch_array($result)) {
		if ($EDIT_USER == $row["LOGIN"]) {
			//echo "EIngabe: ".$EDIT_PASSWD." - ".md5($EDIT_PASSWD)." - DB:".$row["PASSWORT"];
			if (md5($EDIT_PASSWD) == $row["PASSWORT"]) {
				$_SESSION["benutzer"] = $row["LOGIN"];
				$_SESSION["benutzerTyp"] = $row["TYPE"];

				//echo session_id();
			}
		}
	}
}
?>


<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/wwi_styles.css">
	<title>S.C. Ottmarsheim</title>
	<link rel="icon" href="../Bilder/sc-ottmarsheim-04f2cd94e9c7414f81961910f0ab33ee.jpg">

</head>
<frameset rows="200,*,50" border="1">
	<frame src="../heure/index.html" scrolling="no" noresize>

		<frameset cols="200,*">
			<frame src="menu.php" scrolling="no">
				<frame src="startseite.php?" name="main">
		</frameset>
		<frame src="../html/fusszeile.html" >
</frameset>

</html>