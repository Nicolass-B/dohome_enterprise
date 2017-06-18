<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href=""/>
    <title>Mdp oublié</title>
</head>
<?php include("haut_de_page.php"); ?>

<body>

<form method="post" action="../controller/traitement_mdp_oubli.php">
    <input type="email" name="recup_mail" placeholder="Entrez votre mail"/><br/>
    <input type="submit" name="envoi" value="Valider"/>
</form>
<?php if (isset($mailError)) {
    echo '<span style="color:red">' . $mailError . '</span>';
} ?>

<body>

</body>


<?php include("bas_de_page.php"); ?>

</html>