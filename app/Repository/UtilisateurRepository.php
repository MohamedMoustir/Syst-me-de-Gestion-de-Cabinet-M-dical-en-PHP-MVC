<?php
require_once './../Model/utilisateurs.php';
require_once '../../Core/Database.php';


class UtilisateurRepository{
 private $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance();
    } 

    public function register( $utilisateur) {
    try {
        $query = 'INSERT INTO public.utilisateurs( nom, prenom,email, mot_de_passe, role)
	VALUES (:nom,:prenom, :email, :mot_de_passe, :role);';

     $stmt = $this->pdo->prepare($query);
     $stmt->execute([
        'nom' => $utilisateur->getNom(),
        'prenom' => $utilisateur->getPrenom(),
        'email' => $utilisateur->getEmail(),
        'mot_de_passe' => $utilisateur->getMotDePasse(),
        'role' => $utilisateur->getRole(),
       
    ]);
    $lastInsertId = $this->pdo->lastInsertId();
    $utilisateur->setId($lastInsertId);
     return true;

    }  catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
    
    }
    


    public function login( $users)
        {
            
           try {
               $query = "SELECT id, nom, prenom, email, mot_de_passe, role FROM public.utilisateurs WHERE email = :email";
               $stmt = $this->pdo->prepare($query);
               $email = $users->getEmail();
               $stmt->bindParam(':email', $email, PDO::PARAM_STR);
               $stmt->execute();
     
               $user = null;
               
               while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                   $user = new Utilisateur($row->nom, $row->prenom, $row->email, $row->mot_de_passe, $row->role );
                   break;
               }
                 
                   $register = new UtilisateurController ();

                    $register->initializeSession($user);
                    $register->redirectUser($user->getRole());
               
            //    if ($user) {
     
            //        if (password_verify($users->getMotDePasse(), $user->getMotDePasse())) {
     
            //            $_SESSION['id'] = $user->getID();
            //            $_SESSION['email'] = $user->getEmail();
            //            $_SESSION['nom'] = $user->getNom();
            //            $_SESSION['role'] = $user->getRole();
     
            //            if ($user->getRole() == 'patient' ) {
            //                header('Location:../Controllers/UtilisateurController.php?action=loginsaccses');
            //                exit();
            //            } elseif ($user->getRole() == 'medecin' ) {
            //                header('Location: ../Formateur/AjouteCours.php');
            //                exit();
            //            } 
            //        } else {
            //            return "Incorrect password.";
            //        }
            //    } else {
            //        return "No user found with this email.";
            //    }
               return $user;
           } catch (PDOException $e) {
               return "Error: " . $e->getMessage();
           }
       }
       
    
       }

     