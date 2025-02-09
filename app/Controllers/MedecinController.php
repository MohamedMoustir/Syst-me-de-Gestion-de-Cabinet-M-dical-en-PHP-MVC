<?php
namespace App\Controllers;
require __DIR__ . '/../../vendor/autoload.php';
use App\Repository\MedecinRepository;
use App\Model\Medecin;




class MedecinController
{
  public function alldata()
  {
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'medecin') {
      header('Location:index.php');
      exit;
    }
    $id = isset($_GET['details']) ? htmlspecialchars($_GET['details'], ENT_QUOTES, 'UTF-8') : null;
    $med = new Medecin($id, '', '', '', '', '', '', '');
    $medecin = new MedecinRepository();
    $resulte = $medecin->ListMedecin($med);
    if ($_GET['action'] == 'patient') {
      include __DIR__ . '/../View/patients/dashboard.php';
    } else {
      include __DIR__ . '/../View/patients/rendezvous.php';
    }
  }
  public function getRendezvousMedecin()
  {
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'patient') {
      header('Location:index.php');
      exit;
    }


    $id = isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8') : null;
    $med = new Medecin($id, '', '', '', '', '', '', '');
    $MedecinRepository = new MedecinRepository();
    $result = $MedecinRepository->LstRendezvousMedecin($med);
    include __DIR__ . '/../../app/View/medecins/rendzvousMedcane.php';

  }

  public function statistiques()
  {
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'patient') {
      header('Location:index.php');
      exit;
    }


    $medecin_id = isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8') : null;
    $MedecinRepository = new MedecinRepository();
    $approvedAppointments = $MedecinRepository->getApprovedAppointmentsPerMedecin($medecin_id);
    $cancelledAppointments = $MedecinRepository->getCancelledAppointmentsPerMedecin($medecin_id);
    $newPatientsLast30Days = $MedecinRepository->getNewPatientsLast30Days($medecin_id);
    $getPatientsPerMedecin = $MedecinRepository->getPatientsPerMedecin($medecin_id);
    include __DIR__ . '/../../app/View/medecins/dashboard.php';

  }


}
