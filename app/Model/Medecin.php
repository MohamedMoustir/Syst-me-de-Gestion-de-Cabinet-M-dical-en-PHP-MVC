<?php
namespace App\Model;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Utilisateur;

class Medecin extends Utilisateur{
    private $specialite;
    private $Numero_Ordre;

    public function __construct($id,$nom, $prenom, $email, $mot_de_passe, $role,$Numero_Ordre, $specialite) {
        parent::__construct($id, $nom, $prenom, $email, $mot_de_passe, $role);
        $this->Numero_Ordre = $Numero_Ordre;
        $this->specialite = $specialite;
       
    }

   
    public function getSpecialite() {
        return $this->specialite;
    }

    
    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

    public function getNumero_ordre() {
        return $this->Numero_Ordre;
    }

    
    public function setNumero_ordre($Numero_Ordre) {
        $this->Numero_Ordre = $Numero_Ordre;
    }

    
}
 