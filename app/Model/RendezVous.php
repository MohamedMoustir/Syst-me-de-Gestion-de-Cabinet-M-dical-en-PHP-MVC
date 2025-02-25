<?php 
namespace App\Model;
require_once __DIR__ . '/../../vendor/autoload.php';
use Core\Database;
namespace App\Model;

class Rendezvous
{
    private int $id;

    private int $patient_id;
    private int $medecin_id;
    private string $time;
    private string $motif;
    private string $date_creation;
    private string $statut;



    public function __construct($id, $patient_id,  $medecin_id,  $time, $motif,$date_creation,$statut)
    {  $this->id = $id;
        $this->patient_id = $patient_id;
        $this->medecin_id = $medecin_id;
        $this->time = $time;
        $this->motif = $motif;
        $this->date_creation = $date_creation;
        $this->statut = $statut;
      



    }

    // Getters
    public function getPatientId(): int
    {
        return $this->patient_id;
    }

    public function getMedecinId(): int
    {
        return $this->medecin_id;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getMotif(): string
    {
        return $this->motif;
    }
    public function getDate_creation(): string
    {
        return $this->date_creation;
    } public function getstatut(): string
    {
        return $this->statut;
    }
    public function getIDR(): string
    {
        return $this->id;
    }
    // Setters
    public function setPatientId( $patient_id): void
    {
        $this->patient_id = $patient_id;
    }

    public function setMedecinId( $medecin_id): void
    {
        $this->medecin_id = $medecin_id;
    }

    public function setTime( $time): void
    {
        $this->time = $time;
    }

    public function setMotif( $motif): void
    {
        $this->motif = $motif;
    }
    public function setDate_creation( $date_creation): void
    {
        $this->date_creation = $date_creation;
    } public function setStatut( $statut): void
    {
        $this->statut = $statut;
    }
    public function setIDR( $id): void
    {
        $this->id = $id;
    }

}
