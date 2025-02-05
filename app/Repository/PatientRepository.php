<?php
require_once './../Model/Patient.php';
require_once '../../Core/Database.php';


class PatinetRepository{

 private $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance();
    } 
    public function CreateProfilePatinet($utilisateur_id, $Patient) {
    try {
        $query = 'INSERT INTO public.patients( utilisateur_id, date_naissance, numerosociale)
	VALUES ( :utilisateur_id, :date_naissance, :numerosociale)';
     $stmt = $this->pdo->prepare($query);
     $stmt->execute([
        'utilisateur_id' => $utilisateur_id,
        'date_naissance' => $Patient->getDate_naissance(),
        'numerosociale' => $Patient->getNumerosociale()
       
    ]);
    
     return true;

    }  catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
    var_dump($_POST);
    }
}