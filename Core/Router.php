<?php
// namespace Core;
// require_once __DIR__ . '/../vendor/autoload.php';
// use App\Controllers\MedecinController;

// class Router
// {
//     public function route($action)
//     {
//         switch ($action) {
//             case 'create':
//                 header('location:../../app/View/auth/login.php');
//                 break;
//             case 'patient':
//                 $controller = new MedecinController();
//                 $controller->alldata();
//                 break;
//             case 'medecin':
//                 header('location:../../app/View/medecins/dashboard.php');
//                 break;
//             case 'getRendezvous':
              
//                header('location:../../app/View/patients/table-Rendez-vous.php');
//                 break;
//             case 'rendezvous':
//                 $controller = new MedecinController();
//                 $controller->alldata();
//                 break;
//             default:
//                 echo "Action ";
//                 break;
//         }
//     }
// }
namespace Core;
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\MedecinController;

class Router
{
    private $routes = [];

    public function __construct()
    {
      
        $this->routes = [
            'create' => function () {
                header('location:../../app/View/auth/login.php');
                exit;
            },
            'patient' => function () {
                $controller = new MedecinController();
                $controller->alldata();
            },
            'medecin' => function () {
                header('location:../../app/View/medecins/dashboard.php');
                exit;
            },
            'getRendezvous' => function () {
                header('location:../../app/View/patients/table-Rendez-vous.php');
                exit;
            },
            'rendezvous' => function () {
                $controller = new MedecinController();
                $controller->alldata();
            }
        ];
    }

    public function dispatch()
    {
        $action = $_GET['action'] ?? 'default';
        
        if (isset($this->routes[$action])) {
            call_user_func($this->routes[$action]);
        } else {
            echo "404 - Page Not Found";
        }
    }
}

