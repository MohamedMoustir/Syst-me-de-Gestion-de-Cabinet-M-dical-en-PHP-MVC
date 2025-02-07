<?php
namespace Core;
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controllers\MedecinController;
use App\Controllers\UtilisateurController;
use App\Controllers\RendezVousController;
use App\Controllers\PatientController;





class Router
{
    private $routes = [];

    public function __construct()
    {

        $this->routes = [

            'register' => function () {
                header('location:../app/View/auth/register.php');
                exit;
            },
            'create' => function () {
                $register = new UtilisateurController();
                $register->register();
                require_once 'location:../../../app/View/auth/login.php';
                exit;
            },
            'patient' => function () {
                $controller = new MedecinController();
                $controller->alldata();
            },
            'users' => function () {
                session_start();
                $role = $_SESSION['role'] ?? 'default_role';
                $register = new UtilisateurController();
                $register->login();
                $register->redirectUser($role);
                exit;
            },
            'getRendezvous' => function () {
                $Rendezvous = new RendezVousController();
                $Rendezvous->Rendezvous();
                $PatientController = new PatientController();
                $PatientController->getRendezvous();
                require_once '../app/View/patients/table-Rendez-vous.php';
                exit;
            },
            'rendezvous' => function () {

                $controller = new MedecinController();
                $controller->alldata();
            },
            'medecin' => function () {
                require_once '../app/View/medecins/dashboard.php';

            }
        ];
    }

    public function dispatch()
    {
        $action = $_GET['action'] ?? 'register';

        if (isset($this->routes[$action])) {
            call_user_func($this->routes[$action]);
        } else {
            echo "404 - Page Not Found";
        }
    }
}

