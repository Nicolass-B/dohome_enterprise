<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 21/05/2017
 * Time: 16:08
 */
// IL S'AGIT DED LA PAGE QUI AFFICHE UN CAPTEUR DONNE EN FONCCTION DU GET PASSE AU CONTROLLER
include 'haut_de_page.php';
?>
<head>
    <script src="../js/Chart.bundle.js"></script>
    <link rel="stylesheet" href="../css/capteur.css">
</head>

<body>
<div class="title">
    <p>Historique et mesure instantanée du capteur </p>
</div>
<section class="container">

    <div class="one">
        <?php
        /*highlight_string("<?php\n\$data =\n" . var_export($Capteur, true) . ";\n?>");
        That's debug for ya babe
        */
        ?>
        <div class="joli-chart">
            <canvas id="chart_capteur"></canvas>
            <script>
                var ctx = document.getElementById("chart_capteur").getContext('2d');
                <?php echo "var val_array_bad = " . $dataval . ";"?>

                var val_array = val_array_bad.map(function (item) {
                    return parseInt(item, 10);
                });
                <?php echo "var date_array = " . $datadate . ";\n"?>
                var couleur = '#FFFFFF';
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: date_array,
                        datasets: [{
                            label: "HCapteur",
                            backgroundColor: '#3aff55',
                            borderColor: '#3aff55',
                            data: val_array,
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                color: 'rgba(255,255,255,0.1)',
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Mesure'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                },
                                color: couleur,
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Valeur'
                                }

                            }]
                        }
                    }
                });
            </script>
        </div>


    </div>
    <div class="two">
        <?php
        highlight_string("<?php\n\$data =\n" . var_export($Capteur, true) . ";\n?>");
        ?>
    </div>

</section>
</body>

<?php include("bas_de_page.php"); ?>

