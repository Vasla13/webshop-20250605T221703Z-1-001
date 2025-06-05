<?php

include("connect.php");
session_start();

$sql = "SELECT DISTINCT KATEGORIE FROM artikel";

if (!($result = mysqli_query($conn, $sql))) {
	die("<H3>Fehler beim SELECT der KATEGORIE<H3><br>");
}

$type_arr = array();
while ($row = mysqli_fetch_array($result)) {
	$type_arr[] = $row["KATEGORIE"];
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta charset="uft-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../NEON BUTTON/style.css" />
	<script src="../Js/functions.js"></script>
	<script>
		var last_menu_td = null;

		function drawmenu(menu_td, sMenuText) {
			var menu_arr = null;
			if (sMenuText == "katalog") {
				menu_arr = new Array('Alle', 'Test1', 'Test2'

					<?php
					for ($i = 0; $i < count($type_arr); ++$i) {
						echo ", '" . $type_arr[$i] . "'";
					}
					?>);
			}

			deleteLastMenu();

			if (!menu_arr) {
				return;
			}

			var new_table = document.createElement("table");
			new_table.cellpadding = 0;
			new_table.cellpadding = 0;

			var new_tr = null;
			var new_td = null;
			var new_a = null;
			var new_text = null;
			var i = 0;
			while (i < menu_arr.length) {
				new_tr = new_table.inserRow(-1);
				new_td = new_tr.inserCell(-1);
				new_a = document.createElement("A");
				new_a.href = "katalog.php?TYPE=" + menu_arr[i];
				new_a.target = "main";
				new_text = document.createTextNode(menu_arr[i]);
				new_a.appendChild(new_text);
				new_td.appendChild(new_a);
				++i;
			}
			menu_td.appendChild(new_table);
			last_menu_td = menu_td;
		}

		function deleteLastMenu() {
			if (last_menu_td) {
				var menu_td_tables = last_menu_td.getElementsByTagName("table");
				if (menu_td_tables.length) {
					last_menu_td.removeChild(menu_td_tables[0]);
				}
			}
		}
	</script>
</head>


<body style="background-color:black">
	<br>
	<table cellpadding="5" cellspacing="0" border="0" width="100%">
		<tr>
			<td>
				<h3><a href="startseite.php" target="main">Startseite</a></h3>
			</td>
		</tr>
		<?php if ($_SESSION["BenutzerTyp"] == "Admin" or True) { ?>
			<tr>
				<td onclick="drawMenu ( this, 'Artikeleingabe' );">
					<h3><a href="artikel.php" target="main">Artikeleingabe</a></h3>
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td>
				<h3><a href="Id.php" target="main">Mannschaft</a></h3>
			</td>
		</tr>
		<tr>
			<td>
				<h3><a href="../tabelle.html" target="main">Spiele</a></h3>
			</td>
		</tr>
		<tr>
			<td>
				<h3><a href="katalog.php" target="main">Katalog</a></h3>
			</td>
		</tr>
		<tr>
			<td>
				<h3><a href="warenkorb.php" target="main">Warenkorb</a></h3>
			</td>
		</tr>
		<tr>
			<td>
				<a href="login.php" target="main" class="neon">Login</a>
			</td>
		</tr>
		<table>
</body>

</html>