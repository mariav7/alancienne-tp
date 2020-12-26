<?php
function utilisateurEstConnecte()
{ 
    if(!isset($_SESSION['membre'])) return false;
    else return true;
}

function utilisateurEstConnecteEtEstAdmin()
{
    if(utilisateurEstConnecte() && $_SESSION['membre']['statut'] == 1) return true;
    else return false;
}

/* if(utilisateurEstConnecteEtEstAdmin()){
    header('location: admin/editer-catalogue.php');
} */

function tva($prix_ht, $tva){
    return ($prix_ht/100)* $tva;
}

function ttc($prix_ht, $tva){
    return $prix_ht + tva($prix_ht, $tva);
}