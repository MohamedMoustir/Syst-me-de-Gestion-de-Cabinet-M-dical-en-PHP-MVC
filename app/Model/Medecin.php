
<?php
// require_once './../Model/utilisateurs.php';
require_once '../../Core/Database.php';
class Medecin{
    private $specialite;
    private $Numero_Ordre;

    public function __construct($Numero_Ordre, $specialite) {
        $this->Numero_Ordre = $Numero_Ordre;
        $this->specialite = $specialite;
        Database::getInstance();
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
 