<?php 

class DBManager {
    private $bdd;

    public function __construct() {
        try {
            $this->bdd = new PDO (
                'mysql:host=localhost;dbname=shop;charset=utf8',
                'root',
                'root'
            );
            echo('Test');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getConnexion() {
        return $this->bdd;
    }
}

?>