<?php

interface UserRepositoryInterface {
    public function register($nom, $prenom, $email, $mot_de_passe, $role);
    
    // public function getUserById($id);
}
