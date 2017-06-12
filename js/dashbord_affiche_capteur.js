/**
 * Created by Nicolas on 12/06/2017.
 */
function showUser(str)
{
    if (str == "")
    {
        document.getElementById("piece").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp= new XMLHttpRequest();
    } else {
        if (window.ActiveXObject)
            try {
                xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    return NULL;
                }
            }
    }

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("piece").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "dashbordSelectPiece.php?q=" + str, true);
    xmlhttp.send();
}

function showUser2(str)
{
    if (str == "")
    {
        document.getElementById("capteurTemp").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        xmlhttp= new XMLHttpRequest();
    } else {
        if (window.ActiveXObject)
            try {
                xmlhttp= new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    return NULL;
                }
            }
    }

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("capteurTemp").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "dashbordAfficheCapteur.php?q=" + str, true);
    xmlhttp.send();
}
