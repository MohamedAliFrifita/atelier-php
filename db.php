<?php
// les parametres de connexion
$host    = 'localhost';
$db      = 'atelier_php'; 
$user    = 'root';       // Utilisateur par défaut XAMPP
$pass    = '';           
$charset = 'utf8mb4';    

// Construction du DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options pour configurer le comportement de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lance une erreur si la requête SQL échoue
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retourne les données sous forme de tableau associatif
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Utilise les vraies requêtes préparées (Sécurité)
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}