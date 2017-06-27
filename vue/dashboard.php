<?php
if (!isset($_SESSION)) {
    session_start();
}
?>


<!DOCTYPE html>
<html xmlns:justify>

<head>
    <link rel="stylesheet" href="../css/dashboard_css.css"/>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script type="text/javascript" src="../js/dashbord_affiche_capteur.js"></script>

</head>

<?php include("haut_de_page.php"); ?>
<body>

<section>
    <HD>
        <section1>
            <div class="information">
                <div class="alarme">
                    <p>Alarme</p>
                    <label class="switch">
                        <input type="checkbox">
                        <div class="slider round"></div>
                    </label>
                </div>

                <div class="mode">
                    <p>Mode</p>
                    <form method="post" action="mode.php">
                        <select name="mode" id="mode">
                            <option value="nuit">Nuit</option>
                            <option value="jour">Jour</option>
                            <option value="vacances">Vacances</option>
                        </select>
                    </form>
                </div>

                <div class="température" id="temperature">
                    <p>Capteur</p>

                    <select id="température" name="maison" onchange="showUser(this.value)">
                        <option selected="selected" value="Choissisez votre maison">Choissisez votre maison</option>
                        <?php include('../controller/dashbordSelectMaison.php') ?>
                    </select>

                    <br>
                    <br>
                    <?php if(!isset($_POST['maison'])&& $_POST['maison']!='Choissisez votre maison'){

                    ?>
                    <div id="piece">

                    </div>

                    <br><br>

                    <div id="capteurTemp">
                    </div>
                    <?php }?>

                </div>
            </div>
        </section1>

        <section2>
            <div class="information">
                <div class="volets">
                    <p>Volets</p>
                    <script type="text/javascript">
                        function Ouverture() {
                            currentvalue = document.getElementById('Ouverture').value;
                            if (currentvalue == "Ouvrir") {
                                document.getElementById("Ouverture").value = "Fermer";
                            }
                            else {
                                document.getElementById("Ouverture").value = "Ouvrir";
                            }
                        }
                    </script>
                    <input type="button" value="Ouvrir" id="Ouverture" onclick="Ouverture();">
                </div>

                <div class="lumiere">
                    <p>Lumières</p>
                    <script type="text/javascript">
                        function Allumage() {
                            currentvalue = document.getElementById('Allumage').value;
                            if (currentvalue == "Allumer") {
                                document.getElementById("Allumage").value = "Eteindre";
                            }
                            else {
                                document.getElementById("Allumage").value = "Allumer";
                            }
                        }
                    </script>
                    <input type="button" value="Allumer" id="Allumage" onclick="Allumage();">
                </div>
            </div>

        </section2>

        <section3>
            <div class="meteo">
                <div id="cont_NzUwNTZ8NHwyfDR8MnxGRkZGRkZ8MXw2NjY2NjZ8Y3wx">
                    <div id="spa_NzUwNTZ8NHwyfDR8MnxGRkZGRkZ8MXw2NjY2NjZ8Y3wx">
                        <a id="a_NzUwNTZ8NHwyfDR8MnxGRkZGRkZ8MXw2NjY2NjZ8Y3wx"
                           href="http://www.meteocity.com/france/paris_v75056/" target="_blank"
                           style="color:#333;text-decoration:none;">
                            Météo Paris</a> ©
                        <a href="http://www.meteocity.com">meteocity.com</a>
                    </div>
                    <script type="text/javascript"
                            src="http://widget.meteocity.com/js/NzUwNTZ8NHwyfDR8MnxGRkZGRkZ8MXw2NjY2NjZ8Y3wx">
                    </script>
                </div>
            </div>
        </section3>

        <section4>
            <div class="information">
                <div class="video">
                    <p>Vidéosurveillance</p>
                    <video src="../vue/video/doubleration.mp4" controls poster="../img/fond-decran-page2.jpg"
                           width="200">
                    </video>
                    <p>Salon</p>
                    <video src="../vue/video/doubleration.mp4" controls poster="../img/fond-decran-page2.jpg"
                           width="200">
                    </video>
                    <p>Chambre parents</p>
                </div>
            </div>
        </section4>
    </HD>

    <BD>
        <section5>
            <div class="information">
                <div class="date_heure">
                    <div class="heure">
                        <?php
                        $heure = date("H:i");
                        Print("$heure");
                        echo '<br>';
                        ?>
                    </div>
                    <div class="date">
                        <?php
                        $date = date("D-d-M-Y");
                        Print("$date");
                        ?>
                    </div>
                </div>
            </div>
        </section5>
    </BD>

</section>

</body>

<?php include("bas_de_page.php"); ?>


</html>