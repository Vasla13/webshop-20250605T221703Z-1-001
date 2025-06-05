<?php
include("connect.php");


$EDIT_NAME = (isset($_POST['EDIT_NAME'])) ? $_POST['EDIT_NAME'] : 'DefaultName';
$EDIT_TYPE = (isset($_POST['EDIT_TYPE'])) ? $_POST['EDIT_TYPE'] : 'DefaultType';
$AREA_DESC = (isset($_POST['AREA_DESC'])) ? $_POST['AREA_DESC'] : 'DefaultDesc';
$SUBMIT_ADD = (isset($_POST['SUBMIT_ADD'])) ? $_POST['SUBMIT_ADD'] : '';
if ($SUBMIT_ADD) {
	if ($EDIT_NAME) {
		$sql = "INSERT INTO ARTIKEL " .
			"(NAME, KATEGORIE, BESCHREIBUNG) " .
			"VALUES " .
			"('" . $EDIT_NAME . "','" . $EDIT_TYPE . "','" . $AREA_DESC . "')";

		if (!$conn) {
			die("<H3>Es fehlt die Connection bei dem Insert!!</H3><br>");
		}

		if (!mysqli_query($conn, $sql)) {
			die("<H3>Fehler beim INSERT Prozess des Artikels!!!<H3><br>");
		}
	} else {
		die("<H3>Es fehlt der EDIT_NAME bei der &Uuml;bergabe</H3><br>");
	}

	if ($_FILES["FILE_IMG"]) {
		$sUploadDir = "uploads";
		$sTmpFile = $_FILES["FILE_IMG"]["tmp_name"];
		$sFileInfo = pathinfo($_FILES["FILE_IMG"]["name"]);
		$iArtID = mysqli_insert_id($conn);
		$sNewFileName = $iArtID . "." . $sFileInfo["extension"];

		if (move_uploaded_file($sTmpFile, $sUploadDir . $sNewFileName)) {
			$sql = "INSERT INTO bilder" .
				" (ARTID, DATEI, ORIGINALNAME)" .
				" VALUES (" . $iArtID . ", '" . $sUploadDir . $sNewFileName . "', '" . $sFileInfo["basename"] . "');";
			if (!mysqli_query($conn, $sql)) {
				die("<h3>Fehler beim INSERT des ARTIKELS!</h3><br>");
			}


			print "Die Datie wurde geprüft und <b>erfolgreich</b> hochlageladen.<br>";
			print "<img src='" . $sUploadDir . $sNewFileName . "'><br><br>";
			print_r($_FILES);
			print "<br><br>";
		} else {
			die("Datie-Upoad fehlgeschlagen!");
		}
	}
}
?>


<!DOCTYPE HTML>
<html>

<head>
	<title>Ottmarsheim, Online-Shop</title>
	<link rel="stylesheet" type="text/css" href="../css/wwi_styles.css">
	<script src="functions.js"></script>
	<meta charset="utf-8">

</head>

<body>
	<?php
	if ($_POST["EDIT_NAME"]) {
		echo "Der Artikelname war: " . $_POST["EDIT_NAME"] . ".";
	}
	?>
	<br>
	<h1>Artikel - Editor</h1>
	<br>
	<br>
	<form method="post" enctype="multipart/form-data" action="artikel.php" name="FORM_INPUT" target="main">
		<table cellpadding="5" cellspacing="0" border="0" width="100%">
			<tr>
				<td>
					<b>Bezeichnung:</b>
				</td>
				<td>
					<input name="EDIT_NAME" value="<?php echo $_POST["EDIT_NAME"] ?>" size="40">
				</td>
			</tr>
			<tr>
				<td>
					<b>Kategorie:</b>
				</td>
				<td>
					<input name="EDIT_TYPE" value="" <?php echo $_POST["EDIT_NAME"] ?> size="40">
				</td>
			</tr>
			<tr>
				<td>
					<b>Foto:</b>
				</td>
				<td>
					<input type="file" name="FILE_IMG" value="" size="40">
				</td>
			</tr>
			<tr>
				<td>
					<b>Beschreibung:</b>
				</td>
				<td>
					<textarea name="AREA_DESC" rows="5" cols="60"></textarea>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="submit" name="SUBMIT_ADD" value="Hinzufügen">
				</td>
			</tr>
		</table>
	</form>
</body>

</html>