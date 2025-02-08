<?php
namespace App\Repository;
require_once __DIR__ . '/../../vendor/autoload.php';
use Core\Database;
use PDOException;
use PDO;
use App\Model\Patinet;
use App\Model\Medecin;
use App\Model\Rendezvous;




class PatinetRepository
{

    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function CreateProfilePatinet($utilisateur_id, $Patient)
    {
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

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }

    }

    public function LstRendezvous($data)
{
   
  
        // if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'medecin' ) {
        //     header('Location:../public/index.php');
        //     exit;
        //   }
        
    $id = $data->getId();

    try {
        $query = "SELECT DISTINCT 
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
        WHERE p.id = :id";


        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($results) {
            $appointments = [];
            foreach ($results as $result) {
                $patient = new Patinet(
                    $result->patient_id ?? null,
                    $result->patient_nom ?? '',
                    '', '', '', '', '', ''
                );
        
                $medecin = new Medecin(
                    '', 
                    $result->medecin_nom ?? '',
                    '', '', '', '', '', $result->specialite ?? ''
                );
        
                $rendezvous = new Rendezvous(
                    $result->rendezvous_id,
                    $result->rendezvous_id ?? null,
                    $result->medecin_id ?? null, 
                    $result->date_rendezvous ?? '',
                    $result->motif ?? '',
                    $result->date_creation ?? '',
                    $result->statut ?? ''
                );
        
                if (!in_array([$patient, $medecin, $rendezvous], $appointments)) {
                    $appointments[] = [$patient, $medecin, $rendezvous];
                }
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


}