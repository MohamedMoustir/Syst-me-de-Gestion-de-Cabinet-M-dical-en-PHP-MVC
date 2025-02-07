<?php
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Model\Medecin;
use App\Model\Patinet;
use App\Model\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Repository\MedecinRepository;
use App\Repository\PatinetRepository;


class UtilisateurController
{

   public function register()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
         if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'], $_POST['role'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $role = $_POST['role'];
            $utilisateur = new Utilisateur($id=null,$nom,$prenom,$email,$mot_de_passe,$role);
            
            $utilisateurRepo = new UtilisateurRepository();
            $idUtilisateur=$utilisateurRepo->register($utilisateur);
            
            $utilisateur->setId($idUtilisateur);

            if ($role == 'medecin') {
               $Numero_Ordre = $_POST['Numero_Ordre'];
               $specialite = $_POST['Specialite'];
               $medecin = new Medecin('','','','','','',$Numero_Ordre, $specialite);
               $MedecinRepository = new MedecinRepository();
               $resulte = $MedecinRepository->CreateProfileMedecin($utilisateur->getId(), $medecin);
            
            }elseif($role == 'patient'){
               $date_naissance = $_POST['date_Naissance'];
               $numerosociale = $_POST['numeroSociale'];
               $Patinet = new Patinet('','','','','','',$date_naissance, $numerosociale);
               $PatinetRepository = new PatinetRepository();
               $PatinetRepository->CreateProfilePatinet($utilisateur->getId(), $Patinet);
            }
            $this->redirectUser('create');
         }
           
      }

   }


   public function login()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
         if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $utilisateur = new Utilisateur(null, null, $email, $password, null);
            $utilisateurRepo = new UtilisateurRepository();
            $utilisateurRepo->login($utilisateur);
           
          
         }
      } 

      
   }


    function redirectUser($role)
   {
       header('Location: /cabinet_Medical/public/index.php?action=' . $role);
       exit();
   }


   public   function initializeSession($user)
   {
      var_dump($user);
      session_start();
      $_SESSION['id'] = $user->getId();
      $_SESSION['email'] = $user->getEmail();
      $_SESSION['nom'] = $user->getNom();
      $_SESSION['role'] = $user->getRole();
   }

}



// $Rendezvous = new RendezVousController();
// $Rendezvous->Rendezvous();






