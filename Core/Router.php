<?php
namespace Core;
require_once __DIR__ . '/../vendor/autoload.php';
// use App\Controllers\UtilisateurController;
use App\Controllers\MedecinController;

class Router
{
    public function route($action)
    {
        switch ($action) {
            case 'create':
                header('location:../../app/View/auth/login.php');
                break;
            case 'patient':
                $controller = new MedecinController();
                $controller->alldata();
                break;
            case 'medecin':
                header('location:../../app/View/medecins/dashboard.php');
                break;
            case 'details':
                $controller = new MedecinController();
                $controller->alldata();
                break;
            case 'rendezvous':
                $controller = new MedecinController();
                $controller->alldata();
                break;
            default:
                echo "Action ";
                break;
        }
    }
}

