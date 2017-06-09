<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 04/06/2017
 * Time: 03:02
 */

$header="MIME-Version: 1.0\r\n";
$header.='From:"test.com"<support@test.com>'."\n";
$header.='Content-Type:texte/html charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message = "
<html>
    <body>
        <div align=\"center\">
        j'ai envoyé ce mail avec PHP !
        <br/>
        </div>
    </body>
</html>
";

mail("nicolas.benmennad@gmail.com",'salut test',$message,$header);
?>