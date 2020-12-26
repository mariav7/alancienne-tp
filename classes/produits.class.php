<?php
require_once 'database.class.php';

class Produit extends Database
{
    public $id_produit;
    public $nom_produit;
    public $prix_ht;
    public $tva;
    public $stock_commande;
    public $stock_max_dispo;

    public $bdd;

    public function __construct(){
        $this->bdd = $this->getConnexion();
    }

    public function create(){
        $requete = $this->bdd->prepare("INSERT INTO produit (nom_produit, prix_ht, tva, stock_commande, stock_max_dispo) VALUES (:nom_produit, :prix_ht, :tva, :stock_commande, :stock_max_dispo)");
        $requete->bindValue(":nom_produit", $this->nom_produit);
        $requete->bindValue(":prix_ht", $this->prix_ht);
        $requete->bindValue(":tva", $this->tva);
        $requete->bindValue(":stock_commande", $this->stock_commande);
        $requete->bindValue(":stock_max_dispo", $this->stock_max_dispo);
        $resultat = $requete->execute();

        if($resultat) {
            return true;
        } else {
            return false;
        }
    }

    public function find(){
        $requete = $this->bdd->prepare("SELECT * FROM produit WHERE id_produit =:id");
        $requete->execute(['id' => $this->id_produit]);

        $row = $requete->fetch();

        $this->nom_produit = $row['nom_produit'];
        $this->prix_ht = $row['prix_ht'];
        $this->tva = $row['tva'];
        $this->stock_commande = $row['stock_commande'];
        $this->stock_max_dispo = $row['stock_max_dispo'];
    }

    public function findAll(){
        $requete = $this->bdd->query("SELECT * FROM produit");
        $produits = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $produits;
    }

    public function update(){
        $requete = $this->bdd->prepare("UPDATE produit SET nom_produit = :nom_produit, prix_ht = :prix_ht, tva = :tva, stock_commande = :stock_commande, stock_max_dispo = :stock_max_dispo WHERE id_produit = :id_produit");

        $requete->bindValue(":nom_produit", $this->nom_produit);
        $requete->bindValue(":prix_ht", $this->prix_ht);
        $requete->bindValue(":tva", $this->tva);
        $requete->bindValue(":stock_commande", $this->stock_commande);
        $requete->bindValue(":stock_max_dispo", $this->stock_max_dispo);
        $requete->bindValue(":code_postal", $this->code_postal);
        $requete->bindValue(":id_produit", $this->id_produit);
        $resultat = $requete->execute();

        if($resultat){
            return true;
        } else {
            return false;
        }
    }

    public function delete(){
        $requete = $this->bdd->prepare("DELETE FROM produit WHERE id_produit=:id");
        $resultat = $requete->execute(['id' => $this->id_produit]);

        if($resultat == 1) {
            return true;
        }
        else {
            return false;
        }
    }
}