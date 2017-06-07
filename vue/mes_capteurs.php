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
</head>
<body>
<div>
    <?php
    /*highlight_string("<?php\n\$data =\n" . var_export($Capteur, true) . ";\n?>");
    That's debug for ya babe
    */
    ?>
    <div class="joli-form" style="height 150px  ">
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
                        label: "Valeur Capteur",
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
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }

                        }]
                    }
                }
            });
        </script>
    </div>


</div>
</body>

<?php include("bas_de_page.php"); ?>

