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
    
            // var_dump([
            //     'patient_id' => $rendezvous->getPatientId(),
            //     'medecin_id' => $rendezvous->getMedecinId(),
            //     'date_rendezvous' => $rendezvous->getTime(),
            //     'motif' => $rendezvous->getMotif(),
            // ]);
    
            $query = 'INSERT INTO public.rendezvous (patient_id, medecin_id, date_rendezvous, motif)
                      VALUES (:patient_id, :medecin_id, :date_rendezvous, :motif)';
    
            $stmt = $this->pdo->prepare($query);
    
            $date_rendezvous = date('Y-m-d H:i:s', strtotime($rendezvous->getTime()));
    
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
    




}
