<?php 
namespace App\Model;
require_once __DIR__ . '/../../vendor/autoload.php';
use Core\Database;

class Rendezvous{
    private $patient_id;
    private $medecin_id;
    private $date_rendezvous;
    private $motif;

    public function __construct($patient_id,$medecin_id ,$date_rendezvous,$motif){
    $this->patient_id =$patient_id;
    $this->medecin_id = $medecin_id;
    $this->date_rendezvous = $date_rendezvous;
    $this->motif = $motif;
    Database::getInstance();

    }

    
}