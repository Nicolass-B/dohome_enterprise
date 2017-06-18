<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../css/mdp_oubli.css"/>
    <title>Mdp oublié</title>
    <script  type="text/javascript"  src="../js/mdp_oubli.js"></script>
</head>

<header>
    <section1>
        <div class="container">
            <img class="logo" src="../vue/img/fond_transparent3.png" alt="logo de l'entreprise"/>
            <nav>
                <ul>
                    <div class="menu">
                        <li><a href="">FR</a></li>
                        <li><a href="">EN</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </section1>
</header>


<body>


<div class="ajaxMail">
    <input type="email" name="recup_mail" id="recup_mail" placeholder="Entrez votre mail" oninput="showUser(this.value)"/><br/>
    <div id="questionSecrete">


    </div>
</div>

</body>


<?php include("bas_de_page.php"); ?>
</html>