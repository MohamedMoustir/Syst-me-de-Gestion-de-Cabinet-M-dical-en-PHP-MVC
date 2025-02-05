<?php

if (isset($_GET['action'])) {
  $router = $_GET['action'];
   
  switch ($router) {
    case 'create':

      header('location:../../app/View/auth/login.php');
        break;
        case 'loginsaccses':

          header('location:../../app/View/patients/dashboard.php');
            break;
    
    default:
        # code...
        break;
  }
}

?>