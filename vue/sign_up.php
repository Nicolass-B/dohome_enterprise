<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_sign_up.css"/>
    <title>Inscription</title>
</head>

<header>
    <section1>
        <div class="container">
            <img class="logo" src="../Vue/img/fond_transparent3.png" alt="logo de l'entreprise"/>
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





<section>
    <div class="information">
        <form method="post" action="../controller/traitementInscription.php">
            <fieldset>
                <legend>Inscription</legend>
                <div class="test">
                    <div class="test1">
                        <p>
                        <label for="nom">Nom </br></label>
                        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom"  required/>
                        </p>

                        <label for="prenom">Prénom </br></label>
                        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" required/>
                        </br></br>
                        <label for="E-mail">E-mail </br></label>
                        <input type="email" name="E-mail" id="E-mail" placeholder="Entrez votre adresse mail" required/>
                        </br></br>
                        <label for="pass">Mot de passe </br></label>
                        <input type="text" name="pass" id="pass" placeholder="Entrez votre mot de passe" required/>
                        </br></br>
                        <label for="confirmePasse">Confirmation du mot de passe </br></label>
                        <input type="text" name="confirmePasse" id="confirmePasse" placeholder="Confirmation mot de passe" required/>
                        </br></br>
                        <label for="adresse">Adresse </br></label>
                        <input type="text" name="adresse" id="adresse" placeholder="Adresse/Code postal/Ville" required/>
                        </br></br>

                    </div>

                    <div class="test2">
                        <p>
                            <label for="sexe">Sexe</label><br />
                            <select name="sexe" id="sexe"  >
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                            </select>
                        </p>

                        <p>

                            <label for="date">Date de naissance</label><br />
                            <select name="jour" id="jour"  >
                                <option value="01">01</option><option value="02">02</option>
                                <option value="03">03</option><option value="04">04</option><option value="05">05</option>
                                <option value="06">06</option><option value="07">07</option><option value="08">08</option>
                                <option value="09">09</option><option value="10">10</option><option value="11">11</option>
                                <option value="12">12</option><option value="13">13</option><option value="14">14</option>
                                <option value="15">15</option><option value="16">16</option><option value="17">17</option>
                                <option value="18">18</option><option value="19">19</option><option value="20">20</option>
                                <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                                <option value="24">24</option><option value="25">25</option><option value="26">26</option>
                                <option value="27">27</option><option value="28">28</option><option value="29">29</option>
                                <option value="30">30</option>
                            </select>

                            <select name="mois" id="mois"  >
                                <option value="01">Janvier</option><option value="02">février</option>
                                <option value="03">Mars</option><option value="04">Avril</option>
                                <option value="05">Mai</option><option value="06">Juin</option>
                                <option value="07">Juillet</option><option value="08">Aout</option>
                                <option value="09">Septembre</option><option value="10">Octobre</option>
                                <option value="11">Novembre</option><option value="12">Décembre</option>
                            </select>

                            <select name="année" id="année"  >
                                <option value="1898">1898</option><option value="1899">1899</option><option value="1900">1900</option>
                                <option value="1901">1901</option><option value="1902">1902</option><option value="1903">1903</option>
                                <option value="1904">1904</option><option value="1905">1905</option><option value="1906">1906</option>
                                <option value="1907">1907</option><option value="1908">1908</option><option value="1909">1909</option>
                                <option value="1910">1910</option><option value="1911">1911</option><option value="1912">1912</option>
                                <option value="1919">1919</option><option value="1913">1913</option><option value="1914">1914</option>
                                <option value="1915">1915</option><option value="1916">1916</option><option value="1917">1917</option>
                                <option value="1918">1918</option><option value="1920">1920</option><option value="1921">1921</option>
                                <option value="1922">1922</option><option value="1923">1923</option><option value="1924">1924</option>
                                <option value="1925">1925</option><option value="1926">1926</option><option value="1927">1927</option>
                                <option value="1928">1928</option><option value="1929">1929</option><option value="1930">1930</option>
                                <option value="1931">1931</option><option value="1932">1932</option><option value="1933">1933</option>
                                <option value="1934">1934</option><option value="1935">1935</option><option value="1936">1936</option>
                                <option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option>
                                <option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option>
                                <option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option>
                                <option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option>
                                <option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option>
                                <option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option>
                                <option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option>
                                <option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option>
                                <option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option>
                                <option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option>
                                <option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option>
                                <option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option>
                                <option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option>
                                <option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option>
                                <option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option>
                                <option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option>
                                <option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option>
                                <option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option>
                                <option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option>
                                <option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option>
                                <option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option>
                                <option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option>
                                <option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option>
                                <option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option>
                                <option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option>
                                <option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option>
                                <option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option>
                            </select>

                        </p>

                        <p>
                            <label for="tel">Numéro de téléphone </br></label>
                            <input type="tel" name="tel" id="tel" placeholder="Entrez votre numéro de téléphone" required/>
                        </p>
                        </br>

                         <p> <input type="radio" name="memo" id="memo"/>
                            <label for="memo">J'ai lu et j'accepte les conditions d'utilisation</label>
                         </p>

                        <input class="bouton1" type="submit" name="envoi" value="Créer mon compte" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</section>




</body>
<?php include("bas_de_page.php"); ?>

</html>