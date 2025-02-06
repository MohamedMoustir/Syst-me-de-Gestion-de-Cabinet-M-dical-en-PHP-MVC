<?php
namespace App\Controllers;
require __DIR__ . '/../../vendor/autoload.php';
use App\Repository\MedecinRepository;
use App\Model\Medecin;


class MedecinController
{
  public function alldata()
  {
    $id = isset($_GET['details']) ? $_GET['details'] : null;
    $med = new Medecin($id, '', '', '', '', '', '', '');
    $medecin = new MedecinRepository();
    $resulte = $medecin->ListMedecin($med);

    if ($_GET['action'] == 'patient') {
      include __DIR__ . '/../View/patients/dashboard.php';
    } else {
      include __DIR__ . '/../View/patients/rendezvous.php';
    }
  }

}
