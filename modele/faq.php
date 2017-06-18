<?php


function getFaq()
{
$req = $this->pdo->prepare('SELECT * FROM faq');
$req->execute();
$data = $req->fetchAll();
return $data;
}