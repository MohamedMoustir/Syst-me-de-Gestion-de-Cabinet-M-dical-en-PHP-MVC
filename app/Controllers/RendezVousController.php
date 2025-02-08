<?php
namespace APP\Controllers;
require __DIR__ . '/../../vendor/autoload.php';
use App\Model\Rendezvous;
use App\Repository\RendezvousRepository;

class RendezVousController
{

  public function Rendezvous()
  {
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'medecin') {
      header('Location:index.php');
      exit;
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Rendezvous'])) {
      if (isset($_POST['id_medecin'], $_POST['motif'], $_POST['time'])) {

        $medecin_id = $_POST['id_medecin'];
        $motif = $_POST['motif'];
        $time = $_POST['time'];

        $patient_id = $_SESSION['id'];
        $Rendezvous = new Rendezvous(0, $patient_id, $medecin_id, $time, $motif, '', '');
        $RendezvousRep = new RendezvousRepository();
        $RendezvousRep->Rendezvou($Rendezvous);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
      }
    }
  }
  public function VeriffeCancelRendezvous()
  {
    session_start();
    $id = isset($_GET['AnnulerID']) ? $_GET['AnnulerID'] : null;
    $MedecinRepository = new RendezvousRepository();
    $result = $MedecinRepository->CancelRendezvous($id);
    include __DIR__ . '/../View/medecins/rendzvousMedcane.php';

    header('location:index.php?action=Utilisater&Annuler&AnnulerID');
  }
  public function VeriffeapprouvedRendezvous()
  {
    session_start();
    $id = isset($_GET['approuvedID']) ? $_GET['approuvedID'] : null;
    $MedecinRepository = new RendezvousRepository();
    $MedecinRepository->approuvedRendezvous($id);
    header('location:index.php?action=Utilisater&approuved&approuvedID');
  }
  public function insertinsertConsultationController()
  {
    session_start();
   
    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'patient' ) {
        header('Location:index.php');
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Consultation'])) {
      if (isset($_POST['date_consultation'], $_POST['treatment'], $_POST['notes'])) {
        $date_consultation = $_POST['date_consultation'];
        $patient_id = $_POST['id'];

        $treatment = $_POST['treatment'];
        $notes = $_POST['notes'];
        $Medecin_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        var_dump($patient_id);
        $med = new Rendezvous(1, $patient_id, $Medecin_id, '', '', '', '');
        $MedecinRepository = new RendezvousRepository();
        $dd = $MedecinRepository->insertConsultation($med, $date_consultation, $treatment, $notes);

      }
    }
    include __DIR__ . '/../View/medecins/ConsConsultation.php';


  }

}
