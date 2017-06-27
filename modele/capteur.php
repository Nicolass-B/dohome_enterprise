<?php
/**
 * Created by IntelliJ IDEA.
 * User: Antoine
 * Date: 05/05/2017
 * Time: 10:12
 */
require_once("init_connexion_bdd.php");

class capteur
{

    public $idcapteur;
    public $idpiece;
    public $idmaison;
    public $id_user;
    public $typecapteur;
    public $valeur_now;
    public $histo_valeur;
    public $histo_date;
    public $nom;

    private $pdo; // pour les acces de l'objet a la base de données


    /**
     * capteur constructor.
     * @param $idcapteur
     * @param PDO $db
     */
    public function __construct($idcapteur, PDO $db)
    {
        $this->idcapteur = $idcapteur;
        $this->pdo = $db;
        $this->get_piece_and_maison($this->idcapteur);
        $this->get_valeur();
    }


// fonction qui cherche les capteurs pour une pièce donnée

    /**
     * A partir de l'ID du capteur, indique l'IDpièce et celui de la maison
     * permet de peupler des variables pour des cas futurs
     * @param $IDcapteur
     */
    private function get_piece_and_maison($IDcapteur)
    {

        $req = $this->pdo->prepare('SELECT ID_piece FROM capteurs WHERE ID_Capteurs=:idcapteur');
        $req->bindParam(':idcapteur', $IDcapteur);
        $req->execute();
        $this->idpiece = $req->fetch();
        $req = $this->pdo->prepare('SELECT nom FROM capteurs WHERE ID_Capteurs=:idcapteur');
        $req->bindParam(':idcapteur', $IDcapteur);
        $req->execute();
        $this->nom = $req->fetch();
        $req2 = $this->pdo->prepare('SELECT ID_maison FROM pieces WHERE ID_pieces=:idpiece');
        $id = $this->idpiece["ID_piece"];
        $req2->execute(array(
            "idpiece" => intval($id)
        ));
        $this->idmaison = $req2->fetch();
        //echo" GOGOOGOGOGO";
    }

    /**
     * permet de récupérer la valeur instantannée du capteur et son type depuis la DB
     */
    public function get_valeur()
    {
        $req = $this->pdo->prepare('SELECT Valeur FROM capteurs WHERE ID_Capteurs=:idcapteur');
        $req->bindParam(':idcapteur', $this->idcapteur);
        $req->execute();
        $this->valeur_now = $req->fetch();
        $req = $this->pdo->prepare('SELECT Type FROM capteurs WHERE ID_Capteurs=:idcapteur');
        $req->bindParam(':idcapteur', $this->idcapteur);
        $req->execute();
        $this->typecapteur = $req->fetch();
    }

    public function get_valeur_history()
    {
        $req = $this->pdo->prepare('SELECT Date_Mesure FROM historique_capteurs WHERE ID_Capteur=:idcapteur ORDER BY Date_Mesure');
        $req->execute(array('idcapteur' => $this->idcapteur));
        $this->histo_date = $req->fetchAll(PDO::FETCH_COLUMN, 0);
        $req = $this->pdo->prepare('SELECT Valeur FROM historique_capteurs WHERE ID_Capteur=:idcapteur ORDER BY Date_Mesure');
        $req->execute(array('idcapteur' => $this->idcapteur));
        $this->histo_valeur = $req->fetchAll(PDO::FETCH_COLUMN, 0);
    }

}
?>