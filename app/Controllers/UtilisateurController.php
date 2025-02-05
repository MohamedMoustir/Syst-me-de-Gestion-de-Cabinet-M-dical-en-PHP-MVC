<?php
  require_once "../Repository/UtilisateurRepository.php";
  require_once "../Repository/MedecinRepository.php";
  require_once "../Repository/PatientRepository.php";

 require_once "../../Core/Router.php";

class UtilisateurController { 

public function register(){
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'],  $_POST['role'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); 
            $role = $_POST['role'];

            $utilisateur = new Utilisateur($nom, $prenom, $email, $mot_de_passe, $role);
        
            $utilisateurRepo = new UtilisateurRepository();
         $utilisateurRepo->register($utilisateur);
         if ($role == 'medecin') {
            $Numero_Ordre = $_POST['Numero_Ordre'];
            $specialite = $_POST['Specialite'];
            $medecin = new Medecin($Numero_Ordre, $specialite);
            $MedecinRepository = new MedecinRepository();
            $MedecinRepository->CreateProfileMedecin($utilisateur->getId(),$medecin);
          
         }else{
            $date_naissance = $_POST['date_Naissance'];
            $numerosociale = $_POST['numeroSociale'];
            $Patinet = new Patinet($date_naissance, $numerosociale);
            $PatinetRepository = new PatinetRepository();
            $PatinetRepository->CreateProfilePatinet($utilisateur->getId(),$Patinet); 
         }
        
        }}
        
}


 public function login(){
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
      if (isset( $_POST['email'], $_POST['password'])) {
         $email = $_POST['email'];
         $password = $_POST['password'];

          $utilisateur = new Utilisateur(null, null, $email, $password, null);
      
          $utilisateurRepo = new UtilisateurRepository();
       $utilisateurRepo->login($utilisateur);
             }}
             
}


 public function redirectUser($role) {
   if ($role == 'patient') {
       header('Location: ../Controllers/UtilisateurController.php?action=loginsaccses');
   } elseif ($role == 'medecin') {
       header('Location: ../Formateur/AjouteCours.php');
   }
   exit();
}

 public function initializeSession($user) {
   session_start();
   $_SESSION['id'] = $user->getID();
   $_SESSION['email'] = $user->getEmail();
   $_SESSION['nom'] = $user->getNom();
   $_SESSION['role'] = $user->getRole();
}

}
$register = new UtilisateurController ();
$register->register();
$register->login();


