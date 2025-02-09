<?php
namespace App\Controllers;
require __DIR__ . '/../../vendor/autoload.php';
use App\Repository\PatinetRepository;
use App\Model\Patinet;


class PatientController
{
  public function getRendezvous()
  {

    if (!isset($_SESSION['role']) || $_SESSION['role'] === '' || $_SESSION['role'] == 'medecin') {
      header('Location:index.php');
      exit;
    }
    $id = isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8') : null;
    $med = new Patinet($id, '', '', '', '', '', '', '');
    $PatinetRepository = new PatinetRepository();
    $resulte = $PatinetRepository->LstRendezvous($med);
    include __DIR__ . '/../View/patients/table-Rendez-vous.php';

  }


}