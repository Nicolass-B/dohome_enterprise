/**
 * Created by Nicolas on 17/06/2017.
 */

function showUser(str) {
    if (str == "") {
        document.getElementById("questionSecrete").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject)
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    return NULL;
                }
            }
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("questionSecrete").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../controller/affiche_question_secrete.php?mail=" + str, true);
    xmlhttp.send();
}