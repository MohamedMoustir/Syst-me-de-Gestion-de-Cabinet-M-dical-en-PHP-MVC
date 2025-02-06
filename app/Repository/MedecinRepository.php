<?php
namespace App\Repository;

use Core\Database;
use PDO;
use App\Model\Medecin;
use PDOException;

class MedecinRepository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function CreateProfileMedecin($utilisateur_id, $medecin)
    {
        try {
            $query = 'INSERT INTO public.medecins(utilisateur_id, specialite, numero_ordre)
                    VALUES (:utilisateur_id, :specialite, :numero_ordre)';

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'utilisateur_id' => $utilisateur_id,
                'specialite' => $medecin->getSpecialite(),
                'numero_ordre' => $medecin->getNumero_ordre()
            ]);
            return true;

        } catch (PDOException $e) {
            // It's better to log errors than echo them
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        }
    }

    public function ListMedecin($data)
    {
       
        $id = $data->getId();
        
        try {
            $query = "SELECT m.id as ad ,m.specialite,m.numero_ordre, u.* 
                      FROM public.medecins m
                      JOIN utilisateurs u ON m.utilisateur_id = u.id WHERE role = 'medecin'";
            
            if ($id) {
                $query = "SELECT m.id as ad ,m.utilisateur_id ,m.specialite,m.numero_ordre, u.*
                          FROM public.medecins m
                          JOIN utilisateurs u ON m.utilisateur_id = u.id
                          WHERE m.id = :id AND role = 'medecin'";
            }
    
            $stmt = $this->pdo->prepare($query);
            
            if ($id) {
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }
    
            $stmt->execute();
            
            $result = ($id) ? $stmt->fetch(PDO::FETCH_OBJ) : $stmt->fetchAll(PDO::FETCH_OBJ);
            if ($id) {
                return $result;  
            }
    
            $medecins = [];
            foreach ($result as $row) {
                $medecins[] = new Medecin(
                    $row->ad,
                    $row->nom,
                    $row->prenom,
                    $row->email,
                    $row->mot_de_passe,
                    $row->role,
                    $row->numero_ordre,
                    $row->specialite
                );
            }
    
            return $medecins;
    
        } catch (PDOException $e) {
            error_log("Error listing medecins: " . $e->getMessage());
            return null; 
        }
    }
    
}