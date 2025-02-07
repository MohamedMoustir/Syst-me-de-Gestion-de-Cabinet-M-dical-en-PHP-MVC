<?php
namespace App\Controllers;
require __DIR__ . '/../../vendor/autoload.php';
use App\Repository\PatinetRepository;
use App\Model\Patinet;


class PatientController
{
  public function getRendezvous()
  {
    
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    $med = new Patinet($id, '', '', '', '', '', '', '');
    $PatinetRepository = new PatinetRepository();
    $resulte = $PatinetRepository->LstRendezvous($med);
      include __DIR__ . '/../View/patients/table-Rendez-vous.php';
     
  }

}