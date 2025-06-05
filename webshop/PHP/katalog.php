<?php
require("cart.common.php");
include("connect.php");

$TYPE = (isset($_GET['TYPE'])) ? $_GET['TYPE'] : '';
$sql = "SELECT * FROM artikel, bilder WHERE bilder.ARTID = artikel.ARTID";
if ($TYPE != "Alle" && $TYPE != '') {
	$sql .= " AND KATEGORIE='" . $TYPE . "'";
}

if (!($result = mysqli_query($conn, $sql))) {
	die("<h3>Fehler beim SELECT der KATEGORIE " . $TYPE . " </h3><br>" .
		"<h3>SQL Statement: </h3>" . $sql . "<br>");
}

$artikel_arr = array();
while ($row = mysqli_fetch_array($result)) {
	$artikel_arr[] = $row;
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/wwi_styles.css">
	<script src="../Js/functions.js"></script>
	<?php $xajax->printJavascript(); ?>
</head>

<body style="margin:0; padding:0;">
	<br>
	<table cellpadding="5" cellspacing="0" border="0" width="100%" class="artikelTabelle">
		<tr>
			<td><b>Artikel</b></td>
			<td><b>Bezeichnung</b></td>
			<td><b>Bild</b></td>
			<td width="100%"></td>
			<td><b>Kaufen</b></td>
		</tr>
		<?php
		for ($i = 0; $i < count($artikel_arr); ++$i) {
			print "<tr>";
			print "<td>" . $artikel_arr[$i]["ARTID"] . "</td>";
			print "<td>" . $artikel_arr[$i]["NAME"] . "</td>";
			print "<td><img src='" . $artikel_arr[$i]["DATEI"] . "' height=\"50px\"></td>";
			print "<td>" . $artikel_arr[$i]["BESCHREIBUNG"] . "</td>";
			print "<td><input type=\"button\" onclick=\"javascript:xajax_addtocart( " . $artikel_arr[$i]["ARTID"] . " ); void(0);\" value=\"+\"></input></td>";
			print "</tr>";
		}
		?>
	</table>

</body>

</html>