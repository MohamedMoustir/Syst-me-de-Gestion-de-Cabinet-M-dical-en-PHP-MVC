<?php
namespace App\Repository;

use Core\Database;
use PDO;
use App\Model\Medecin;
use PDOException;
use App\Model\Patinet;
use App\Model\Utilisateur;
use App\Model\Rendezvous;
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

    public function LstRendezvousMedecin($data)
    {


        $id = $data->getId();

        try {
            $query = "SELECT 
                r.id AS rendezvous_id, r.date_rendezvous, r.statut, r.motif, r.date_creation,
                u.nom AS patient_nom, 
                t.nom AS medecin_nom,
                m.specialite,
                p.id as patient_id,
                m.id as medecin_id
            FROM rendezvous r
            JOIN patients p ON r.patient_id = p.id
            JOIN utilisateurs u ON p.utilisateur_id = u.id
            JOIN medecins m ON r.medecin_id = m.id
            JOIN utilisateurs t ON m.utilisateur_id = t.id
            WHERE m.id = :id";


            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_OBJ);

            if ($results) {
                $appointments = [];
                foreach ($results as $result) {
                    $patient = new Patinet(
                        $result->patient_id,
                        $result->patient_nom,
                        '',
                        '',
                        '',
                        '',
                        '',
                        ''
                    );

                    $medecin = new Medecin(
                        '',
                        $result->medecin_nom,
                        '',
                        '',
                        '',
                        '',
                        '',
                        $result->specialite
                    );

                    $rendezvous = new Rendezvous(
                        $result->rendezvous_id,
                        $result->rendezvous_id,
                        $result->medecin_id,
                        $result->date_rendezvous,
                        $result->motif,
                        $result->date_creation,
                        $result->statut
                    );
                    $Utilisateur = new Utilisateur(
                        $result->rendezvous_id,
                        $result->medecin_id,
                        $result->date_rendezvous,
                        $result->motif,
                        $result->date_creation
                    );

                    $appointments[] = [$patient, $medecin, $rendezvous, $Utilisateur];
                }

                return $appointments;
            } else {
                return "No appointments found.";
            }

        } catch (PDOException $e) {
            error_log("Error listing appointments: " . $e->getMessage());
            return null;
        }
    }


    function getPatientsPerMedecin($medecin_id) {
        $sql = "SELECT  COUNT(DISTINCT patient_id) AS total_patients
                FROM rendezvous
                WHERE statut = 'approuved' AND medecin_id = :medecin_id
                GROUP BY medecin_id";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':medecin_id', $medecin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();  
 
    }
    
    function getApprovedAppointmentsPerMedecin($medecin_id) {
        $sql = "SELECT  COUNT(*) AS total_rendezvous
                FROM rendezvous
                WHERE statut = 'approuved' AND medecin_id = :medecin_id
                GROUP BY medecin_id";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':medecin_id', $medecin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();  
    }
    
    function getCancelledAppointmentsPerMedecin($medecin_id) {
        $sql = "SELECT  COUNT(*) AS total_annulations
                FROM rendezvous
                WHERE statut = 'rejected' AND medecin_id = :medecin_id
                GROUP BY medecin_id";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':medecin_id', $medecin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();  
 
    }
    
    function getNewPatientsLast30Days($medecin_id) {
        $sql = "SELECT COUNT(DISTINCT r.patient_id) AS total_new_patients
                FROM rendezvous r
                JOIN patients p ON r.patient_id = p.id
                JOIN utilisateurs u ON p.utilisateur_id = u.id
                WHERE r.medecin_id = :medecin_id 
                AND u.date_creation >= NOW() - INTERVAL '30 days'";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':medecin_id', $medecin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();  
  
    }
    
}