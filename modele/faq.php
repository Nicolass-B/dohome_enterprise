<?php


function getFaq($bdd)
{
    $req = $bdd->prepare('SELECT * FROM faq');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}