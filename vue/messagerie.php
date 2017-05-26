
<?php include("haut_de_page.php"); ?>

<body>
<div>
    <H1> Rédiger un message</H1>

</div>
<div>
    <div class="table-responsive-vertical shadow-z-1">
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>Expéditeur</th>
                <th>Destinataire</th>
                <th>Titre</th>
            <tr>
            </thead>
            <tbody>
            <?php
            //TODO quand on aura les POST bien mis, modifier le tableau pour aller taper dans un controleur piece qui présente les capteurs d'une pice si post et tout si rien
            foreach ($messages as $row) {
                var_dump($row);
                ?>
                <tr>
                    <td data-title="Expéditeur"><?php echo $row[''] ?></td>
                    <td data-title="Titre">
                        <a href="../controller/messagerie.php?msg=<?php echo $row['ID_Message'] ?>"> <?php echo $row['Titre'] ?> </a>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>


<?php include("bas_de_page.php"); ?>
