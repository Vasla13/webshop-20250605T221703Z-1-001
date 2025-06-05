<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="../css/deconection.css" media="screen" type="text/css" />
    <link rel="icon" href="../Bilder/sc-ottmarsheim-04f2cd94e9c7414f81961910f0ab33ee.jpg">
</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="index.php" enctype="multipart/form-data" method="post" target="_parent">
            <h1>Login</h1>

            <label><b>Benutzer</b></label>
            <input type="text" name="EDIT_USER" value="<?php $EDIT_USER ?>">

            <label><b>Passwort</b></label>
            <input type="password" name="EDIT_PASSWD" value="<?php $EDIT_PASSWD ?>">

            <input type="submit" name="SUBMIT_LOGIN" value="LOGIN">
            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
                if ($err == 1 || $err == 2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>
</body>

</html>