<?php
require_once '../../Core/Database.php';

class Patinet{
    private $date_naissance;
    private $numerosociale;
    public  function __construct($date_naissance,$numerosociale) {
        $this->date_naissance = $date_naissance;
        $this->numerosociale = $numerosociale;
        Database::getInstance();
    }
    

    public function getDate_naissance() {
        return $this->date_naissance;
    }

    public function setDate_naissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }

    public function getNumerosociale() {
        return $this->numerosociale;
    }

    public function SetNumerosociale($numerosociale) {
        $this->numerosociale = $numerosociale;
    }
}