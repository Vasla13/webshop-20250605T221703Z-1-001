<?php
require_once("C:/xampp/htdocs/webshop/xajax/xajax_core/xajax.inc.php");

$xajax = new xajax("cart.server.php");
$xajax->configure('javascript URI', '../xajax/');
$xajax->configure('debug', FALSE);

$xajax->register(XAJAX_FUNCTION, "addtocart");
$xajax->register(XAJAX_FUNCTION, "changePosition");