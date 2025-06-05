<?php
session_start();
if( $_SESSION["BenutzerIP"] ){
	if( $_SESSION["BenutzerIP"] != $_SERVER["REMOTE_ADDR"] ){
		session_destroy();
		die( "Die Session gehört zu einem anderen Host und wurde deshalb beendet" );
    } 
}

$_SESSION["BenutzerIP"] = $_SERVER["REMOTE_ADDR"];

if( !$_SESSION["benutzer"] ){
	$_SESSION["benutzer"] = "Host";
	$_SESSION["benutzerTyp"] = "Gast";
}
?>
