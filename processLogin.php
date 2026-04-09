<?php
session_start();

// Connexion à la base de données
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupération des donnees du formulaire
    $username = trim($_POST['username']); 
    $password = trim($_POST['password']);

    // Double sécurité : on verifie que les champs ne sont pas vides en PHP
    // (Au cas où le JavaScript aurait été désactivé)
    if (empty($username) || empty($password)) {
        header("Location: index.php?error=empty");
        exit();
    }

    try {
        //prepared statement pour chercher l utilisateur dans la table 'user' 
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :user");
        $stmt->execute(['user' => $username]);
        $user = $stmt->fetch();

        // verification des credentials
        if ($user && $password === $user['password']) {
            
            // authentification reussie 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // redirection vers la page home apes authentifcation 
            header("Location: home.php");
            exit();

        } else {
            // !!!: Identifiants incorrects
            // renvoi vers l'index avec un parametre d'erreur
            header("Location: index.php?error=1");
            exit();
        }

    } catch (PDOException $e) {
        // En cas de problème technique avec la base
        die("Erreur de base de données : " . $e->getMessage());
    }

} else {
    // Si quelqu'un tente d'accéder au fichier directement via l'URL
    header("Location: index.php");
    exit();
}