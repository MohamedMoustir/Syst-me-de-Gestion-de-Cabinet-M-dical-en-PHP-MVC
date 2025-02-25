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
            'create' => function () {
                $register = new UtilisateurController();
                $register->register();
                exit;
            },
            'patient' => function () {
                $controller = new MedecinController();
                $controller->alldata();
            },
            'login' => function () {

                $controller = new UtilisateurController();
                $controller->login();
            },
            'users' => function () {

                $role = $_SESSION['role'] ?? 'default_role';
                $register = new UtilisateurController();
                $register->redirectUser($role);
                exit;
            },
            'getRendezvous' => function () {
                $Rendezvous = new RendezVousController();
                $Rendezvous->Rendezvous();
                $PatientController = new PatientController();
                $PatientController->getRendezvous();
                exit;
            },
            'rendezvous' => function () {

                $controller = new MedecinController();
                $controller->alldata();
            },
            'medecin' => function () {
                $statistiques = new MedecinController();
                $statistiques->statistiques();

            },
            'logout' => function () {
                session_start();
                $logout = new UtilisateurController();
                $logout->logout();
                exit;

            },
            'register' => function () {
                require('../app/View/auth/register.php');
                exit;

            },

            'Utilisater' => function () {
                $MedecinController = new MedecinController();
                $MedecinController->getRendezvousMedecin();
            },
            'Annuler' => function () {

                $Annuler = new RendezVousController();
                $Annuler->VeriffeCancelRendezvous();

            },
            'approuved' => function () {
                $approuved = new RendezVousController();
                $approuved->VeriffeapprouvedRendezvous();
            }
            ,
            'Consultation' => function () {
                $Consultation = new RendezVousController();
                $Consultation->insertinsertConsultationController();
            },
            '404' => function () {
                require_once '404.php';
            }
        ];
    }

    public function dispatch()
    {
        $action = $_GET['action'] ?? 'login';
        if (isset($this->routes[$action])) {
            call_user_func($this->routes[$action]);
        } else {
            call_user_func($this->routes['404']);
        }
    }
}

