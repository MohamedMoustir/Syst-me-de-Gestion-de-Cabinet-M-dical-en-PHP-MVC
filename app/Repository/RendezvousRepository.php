<?php
namespace App\Repository;
use Core\Database;
use PDOException;
class RendezvousRepository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function Rendezvous($rendezvous)
    {
        try {
            $query = 'INSERT INTO public.rendezvous(patient_id, medecin_id, date_rendezvous, motif)
	VALUES (:patient_id, :medecin_id, :date_rendezvous, :motif)';

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'patient_id' => $rendezvous->getpatient_id(),
                'medecin_id' => $rendezvous->getmedecin_id(),
                'date_rendezvous' => $rendezvous->getdate_rendezvous(),
                'motif' => $rendezvous->getmotif()
            ]);
            return true;

        } catch (PDOException $e) {
            error_log("Error creating medecin profile: " . $e->getMessage());
            return false;
        }
    }



}