<?php
namespace App\Repository;
require_once __DIR__ . '/../../vendor/autoload.php';
use Core\Database;
use PDOException;
use PDO;
use App\Model\Utilisateur;
use App\Controllers\UtilisateurController;

class UtilisateurRepository
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function register($utilisateur)
    {
   
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

        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }

    }

    public function login($users)
    {
        try {
            $query = "SELECT p.id as p, u.nom, u.prenom, u.email, u.role, 
                      m.specialite, p.date_naissance
                      FROM utilisateurs u
                      LEFT JOIN medecins m ON u.id = m.utilisateur_id
                      LEFT JOIN patients p ON u.id = p.utilisateur_id
                      WHERE u.email = :email";
                      
            $stmt = $this->pdo->prepare($query);
            $email = $users->getEmail();
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_OBJ);
    
            if ($row) {
                $user = new Utilisateur($row->p, $row->nom, $row->prenom, $row->email, $row->mot_de_passe, $row->role);
            } else {
                $user = null;
            }
    
            if ($user) {
                $register = new UtilisateurController();
                $register->initializeSession($user);
                $register->redirectUser($user->getRole());
            }
    
            return $user;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    


}




