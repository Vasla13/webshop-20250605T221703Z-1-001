<?php
include("check_session.php");

function addtocart($iArtID)
{
	$_SESSION["CART"][] = $iArtID;

	$objResponce = new xajaxresponse();
	$objResponce->script("alert('Artikel wurde in den Warenkord gelegt');");

	return $objResponce;
}

function changePosition($id, $x, $y)
{
	include("connect.php");
	$objResponce = new xajaxresponse();
	//$objResponce->script("alert('X:".$x." Y:".$y."');" );

	$sSQLSelect = "SELECT COUNT(*) as count FROM mannschaft WHERE NAME='" . $id . "'";
	if (!$conn) {
		$objResponce->script("alert('Es Fehlt die Connection für das Select');");
	}
	$oCount = mysqli_query($conn, $sSQLSelect, MYSQLI_STORE_RESULT);
	$Count_arr = $oCount->fetch_array();
	$lCount = $Count_arr["count"];
	$objResponce->script("console.log('" . $lCount . "');");
	/*if (!$lCount) {
		$objResponce->script("alert('Count ist fehlgeschlagen');");
	}*/
	if ($lCount == 0) {
		$objResponce->script("alert('Count ist 0');");
		$sSQL = "INSERT INTO mannschaft ( NAME, Y, X ) VALUES ( '" . $id . "', " . $y . ", " . $x . ")";
	} else {
		$objResponce->script("alert('Update soll ausgeführt werden');");
		$sSQL = "UPDATE mannschaft Y=" . $y . ", X " . $x . " WHERE NAME='" . $id . "'";
	}
	$objResponce->script("alert('" . $sSQL . "');");
	/*if (!mysqli_query($conn, $sSQL)) {
		$objResponce->script("alert('Fehler bei SQL Statement');");
	}*/

	return $objResponce;
}

require("cart.common.php");
$xajax->processRequest();
