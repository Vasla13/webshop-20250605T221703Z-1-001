<?php
include("connect.php");
include("check_session.php");

$artikel_arr = array();

for ($i = 0; $i < count($_SESSION["CART"]); ++$i) {
	$sql = "SELECT * FROM artikel, bilder " .
		"WHERE bilder.ARTID=artikel.ARTID " .
		"AND artikel.ARTID=" . $_SESSION["CART"][$i];
	if (!($result = mysqli_query($conn, $sql))) {
		die("<H3>Fehler beim SELECT der Artikel<H3><br>");
	}

	if ($row = mysqli_fetch_array($result)) {
		$artikel_arr[] = $row;
	}
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/wwi_styles.css">
	<script src="../Js/functions.js"></script>
	<meta charset="utf-8">
</head>

<body>
	<h1>Panier</h1>
	<br>
	<table cellpadding="5" cellpadding="0" border="0" width="100%" class="artikelID">
		<tr>
			<td><b>
					<font face="arial" color="blue" size="3">Artikel</font>
				</b></td>
			<td><b>
					<font face="arial" color="blue" size="3">Bezeichnung</font>
				</b></td>
			<td><b>
					<font face="arial" color="blue" size="3">Bild</font>
				</b></td>
			<td width="100%"></td>
		</tr>
		<?php
		for ($i = 0; $i < count($artikel_arr); ++$i) {
			print "<tr>";
			print "<td>" . $artikel_arr[$i]["ARTID"] . "</td>";
			print "<td>" . $artikel_arr[$i]["NAME"] . "</td>";
			print "<td><img src='" . $artikel_arr[$i]["DATEI"] . "' height=\"50px\"></td>";
			print "<td>" . $artikel_arr[$i]["BESCHREIBUNG"] . "</td>";
			print "</tr>";
		}
		?>
	</table>

</body>

</html>