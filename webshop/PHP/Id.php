<?php require("cart.common.php");

?>
<html>

<head scrolling="no">
    <title>Fc Ottmarsheim</title>
    <?php $xajax->printJavascript(); ?>
    <script src="../Js/JAVASCRIPT.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/STYLE.css" />
</head>

<body>

    <script>
        function go_stats(link) {
            window.open(link);
        }
    </script>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 20" onload="makeDraggable(evt)">
        <image x="0" y="0" width="30" height="20" xlink:href="http://localhost/webshop/Bilder/terrain.jpg" class="background"> </image>
        <image x="0" y="0" width="2" height="2" xlink:href="https://scorenco.com/media/club_pictures/2018/09/27/sc-ottmarsheim-04f2cd94e9c7414f81961910f0ab33ee.jpg=s200x200" class="Logo"></image>
        <image id="Elias" x="19.6" y="15.2" width="2" height="2" xlink:href="../svg manschaft/Elias.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Elias.php')"></image>
        <image id=" alexis" x="12.87" y="10.5" width="2" height="2" xlink:href="../svg manschaft/alexis.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Alexis.php')"></image>
        <image id=" Corentin" x="21" y="9" width="2" height="2" xlink:href="../svg manschaft/Corentin.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Corentin.php')"></image>
        <image id=" Elizio" x="19.41" y="2.86" width="2" height="2" xlink:href="../svg manschaft/Elizio.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Elizio.php')"></image>
        <image id="eyoub" x="6.2" y="7.1" width="2" height="2" xlink:href="../svg manschaft/eyoub.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_eyoub.php')"></image>
        <image id="jerry" x="3.1" y="8.99" width="2" height="2" xlink:href="../svg manschaft/jerry.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_jerry.php')"></image>
        <image id="leny" x="6.4" y="3.1" width="2" height="2" xlink:href="../svg manschaft/leny.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_leny.php')"></image>
        <image id="Miguel" x="12.9" y="6" width="2" height="2" xlink:href="../svg manschaft/Miguel.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Miguel.php')"></image>
        <image id="orlan" x="6.6" y="14.7" width="2" height="2" xlink:href="../svg manschaft/orlan.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_orlan.php')"></image>
        <image id="Petersen" x="17.5" y="9" width="2" height="2" xlink:href="../svg manschaft/Petersen.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Petersen.php')"></image>
        <image id="azdine" x="6.1" y="10.3" width="2" height="2" xlink:href="../svg manschaft/azdine.svg" class="draggable" onmouseout="onChangePlayer(this)" ondblclick="go_stats('stats_player/stats_Azdine.php')"></image>
    </svg>
</body>

</html>