<?php
namespace App\Model;
require_once __DIR__ . '/../../vendor/autoload.php';
// use Core\Database;
use App\Model\Utilisateur;


class Patinet extends Utilisateur{
    private $date_naissance;
    private $numerosociale;
    public  function __construct($id,$nom, $prenom, $email, $mot_de_passe, $role,$date_naissance,$numerosociale) {
        parent::__construct($id, $nom, $prenom, $email, $mot_de_passe, $role);
        $this->date_naissance = $date_naissance;
        $this->numerosociale = $numerosociale;
        // Database::getInstance();
    }
    

    public function getDate_naissance() {
        return $this->date_naissance;
    }

    public function setDate_naissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }

    public function getNumerosociale() {
        return $this->numerosociale;
    }

    public function SetNumerosociale($numerosociale) {
        $this->numerosociale = $numerosociale;
    }
}