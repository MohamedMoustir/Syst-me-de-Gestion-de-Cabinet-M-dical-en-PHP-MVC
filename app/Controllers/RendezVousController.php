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

        $medecin_id = isset($_POST['id_medecin']) ? intval($_POST['id_medecin']) : null;
        $motif = isset($_POST['motif']) ? htmlspecialchars($_POST['motif'], ENT_QUOTES, 'UTF-8') : '';
        $time = isset($_POST['time']) ? htmlspecialchars($_POST['time'], ENT_QUOTES, 'UTF-8') : '';


        $patient_id = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
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

    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'patient') {
      header('Location:index.php');
      exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Consultation'])) {
      if (isset($_POST['date_consultation'], $_POST['treatment'], $_POST['notes'])) {

        $date_consultation = isset($_POST['date_consultation']) ? htmlspecialchars($_POST['date_consultation'], ENT_QUOTES, 'UTF-8') : '';
        $patient_id = isset($_POST['id']) ? intval($_POST['id']) : null;
        $treatment = isset($_POST['treatment']) ? htmlspecialchars($_POST['treatment'], ENT_QUOTES, 'UTF-8') : '';
        $notes = isset($_POST['notes']) ? htmlspecialchars($_POST['notes'], ENT_QUOTES, 'UTF-8') : '';


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
