<?php
namespace APP\Controllers;
session_start();
require __DIR__ . '/../../vendor/autoload.php';
// use Core\Router;
use App\Model\Rendezvous;
use App\Repository\RendezvousRepository;

class RendezVousController
{

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Rendezvous'])) {
            if (isset($_POST['id_medecin'], $_POST['motif'], $_POST['time'])) {
                $medecin_id = $_POST['id_medecin'];
                $motif = $_POST['motif'];
                $time = $_POST['time'];
                $patient_id = $_SESSION['id'];

                $Rendezvous = new Rendezvous($patient_id, $medecin_id, $time, $motif);
                $RendezvousRep = new RendezvousRepository();
                $RendezvousRep->Rendezvous($Rendezvous);

            }

        }

    }
}