<?php
require_once 'database.class.php';

Class Membre extends Database
{
    public $mdp;
    public $nom;
    public $prenom;
    public $email;
    public $ville;
    public $code_postal;
    public $adresse;
    public $statut;

    private $bdd;

    public function __construct(){
        $this->bdd = $this->getConnexion();
    }

    public function create(){
        $requete = $this->bdd->prepare("INSERT INTO membres (mdp, nom, prenom, email, ville, code_postal, adresse) VALUES (:mdp, :nom, :prenom, :email, :ville, :code_postal, :adresse)");
        $requete->bindparam(":mdp", $this->mdp);
        $requete->bindparam(":nom", $this->nom);
        $requete->bindparam(":prenom", $this->prenom);
        $requete->bindparam(":email", $this->email);
        $requete->bindparam(":ville", $this->ville);
        $requete->bindparam(":code_postal", $this->code_postal);
        $requete->bindparam(":adresse", $this->adresse);
        $resultat = $requete->execute();

        return $resultat;
    }

    public function login($email, $mdp)
    {
        $requete = $this->bdd->prepare("SELECT * FROM membres WHERE email=:email");
        $requete->execute(array(':email'=>$email));
        $membreRow=$requete->fetch(PDO::FETCH_ASSOC);
        if($requete->rowCount() > 0){
            if(password_verify($mdp, $membreRow['mdp'])){
                $_SESSION['membre'] = $membreRow['id_membre'];
                return true;  
            } else {
                $_SESSION['messageErreur'] = 'Mot de passe incorrect';
                return false;
            }
        } else {
            $_SESSION['messageErreur'] = 'Email pas trouvé';
        }
    }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['membre']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        if(isset($_SESSION['membre']) || isset($_SESSION['admin'])){
        session_destroy();
        unset($_SESSION['membre']);
        return true;
        }
   }



    public function find($id_membre){
        $requete = $this->bdd->prepare("SELECT * FROM membres WHERE id_membre =:id_membre");
        $requete->execute(array(":id_membre"=>$id_membre));

        $row = $requete->fetch(PDO::FETCH_ASSOC);

        $this->mdp = $row['mdp'];
        $this->nom = $row['nom'];
        $this->prenom = $row['prenom'];
        $this->email = $row['email'];
        $this->ville = $row['ville'];
        $this->code_postal = $row['code_postal'];
        $this->adresse = $row['adresse'];
        $this->statut = $row['statut'];

    }

    public function findAll(){
        $requete = $this->bdd->query("SELECT * FROM membres");
        $membres = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $membres;
    }

    public function update(){
        $requete = $this->bdd->prepare("UPDATE membres SET mdp = :mdp, nom = :nom, prenom = :prenom, email = :email, ville = :ville, code_postal = :code_postal, adresse = :adresse WHERE id_membre = :id_membre");

        $requete->bindValue(":mdp", $this->mdp);
        $requete->bindValue(":nom", $this->nom);
        $requete->bindValue(":prenom", $this->prenom);
        $requete->bindValue(":email", $this->email);
        $requete->bindValue(":ville", $this->ville);
        $requete->bindValue(":code_postal", $this->code_postal);
        $requete->bindValue(":adresse", $this->adresse);
        $requete->bindValue(":id_membre", $this->id_membre);
        $resultat = $requete->execute();

        if($resultat){
            return true;
        } else {
            return false;
        }
    }

    public function delete(){
        $requete = $this->bdd->prepare("DELETE FROM membres WHERE id_membre=:id");
        $resultat = $requete->execute(['id' => $this->id_membre]);

        if($resultat == 1) {
            return true;
        }
        else {
            return false;
        }
    }
}