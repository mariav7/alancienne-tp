<?php

Class Database
{
    private $hote = "localhost";
    private $bdd = "alancienne-test-technique";
    private $user = "root";
    private $mdp = "";

    public $connexion;

    public function getConnexion(){
        try{
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            $this->connexion = new PDO("mysql:host=" . $this->hote . ";dbname=" . $this->bdd, $this->user, $this->mdp, $options);
        } catch (Exception $e) {
            echo "<div class='alert alert-danger container text-center'>". $e->getMessage() . "<br>";
            die("<h2>Erreur lors de la connexion à la base de données</h2></div>");
        }
        return $this->connexion;
    }
}

