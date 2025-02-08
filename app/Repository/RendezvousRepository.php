<?php
namespace App\Repository;
require_once __DIR__ . '/../../vendor/autoload.php';
use Core\Database;
use PDOException;
use PDO;

class RendezvousRepository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function Rendezvou($rendezvous)
    {
        try {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $query = 'INSERT INTO public.rendezvous (patient_id, medecin_id, date_rendezvous, motif)
                      VALUES (:patient_id, :medecin_id, :date_rendezvous, :motif)';
    
            $stmt = $this->pdo->prepare($query);
            if (!empty($rendezvous->getTime())) {
                $date_rendezvous = date('Y-m-d H:i:s', strtotime($rendezvous->getTime()));
            } else {
                $date_rendezvous = date('Y-m-d H:i:s');
            }
            $stmt->bindValue(':patient_id', $rendezvous->getPatientId(), PDO::PARAM_INT);
            $stmt->bindValue(':medecin_id', $rendezvous->getMedecinId(), PDO::PARAM_INT);
            $stmt->bindValue(':date_rendezvous', $date_rendezvous, PDO::PARAM_STR);
            $stmt->bindValue(':motif', $rendezvous->getMotif(), PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                echo 'yes';
                return true;
            }
    
            return false;
    
        } catch (PDOException $e) {
            echo "error " . $e->getMessage();
            return false;
        }
    }
    



    public function CancelRendezvous($id) {
        try {
           
            $checkQuery = $this->pdo->prepare("SELECT COUNT(*) FROM public.rendezvous WHERE id = :id");
            $checkQuery->bindParam(':id', $id, PDO::PARAM_INT);
            $checkQuery->execute();
            $exists = $checkQuery->fetchColumn();
    
            if ($exists == 0) {
                return "error";
            }
    
            $query = $this->pdo->prepare("UPDATE public.rendezvous SET statut = 'rejected' WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    
        public function approuvedRendezvous($id) {
       
            try {
                $query = $this->pdo->prepare("UPDATE public.rendezvous SET statut ='approuved' WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
               
            } catch (PDOException $e) {
                return "Erreur : " . $e->getMessage();
            }
          
        }

        function insertConsultation($date ,$date_consultation,$treatment,$notes) {
            try {
                
                
                $query = "INSERT INTO  public.consultations (patient_id, medecin_id, date_consultation, treatment, notes) 
                          VALUES (:patient_id, :medecin_id, :date_consultation, :treatment, :notes)";
                $stmt = $this->pdo->prepare($query);
        
                $stmt->bindValue(':patient_id', $date->getPatientId());
                $stmt->bindValue(':medecin_id', $date->getMedecinId());
                $stmt->bindValue(':date_consultation', $date_consultation);
                $stmt->bindValue(':treatment', $treatment);
                $stmt->bindValue(':notes', $notes);
        
                $stmt->execute();
                echo "Consultation ajoutée avec succès !";
          return true;
                
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
}
