<?php
require_once './../Model/Medecin.php';
require_once '../../Core/Database.php';


class MedecinRepository{

 private $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance();
    } 

    public function CreateProfileMedecin($utilisateur_id, $medecin) {
    try {
        $query = 'INSERT INTO public.medecins( utilisateur_id, specialite, numero_ordre)
	VALUES (:utilisateur_id, :specialite, :numero_ordre);';

     $stmt = $this->pdo->prepare($query);
     $stmt->execute([
        'utilisateur_id' => $utilisateur_id,
        'specialite' => $medecin->getSpecialite(),
        'numero_ordre' => $medecin->getNumero_ordre()
       
    ]);
    if ($query) {
        header('location: UtilisateurController.php?action=create');
    }
     return true;

    }  catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    };
    }
}