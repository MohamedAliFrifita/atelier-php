<?php
// 1. Démarrage de la session pour stocker les infos de l'utilisateur
session_start();

// 2. Inclusion de la connexion à la base de données
require_once 'db.php';

// 3. Vérification que les données ont bien été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupération et nettoyage des données (protection XSS de base)
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);

    // Vérification que les champs ne sont pas vides
    if (!empty($username) && !empty($password)) {
        
        try {
            // 4. Préparation de la requête pour trouver l'utilisateur
            // On utilise un marqueur nommé :user pour éviter les injections SQL
            $query = "SELECT * FROM user WHERE username = :user";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['user' => $username]);
            
            $user = $stmt->fetch();

            // 5. Vérification de l'utilisateur et du mot de passe
            // Note : Ici on compare en clair car vos données SQL sont en clair
            if ($user && $password === $user['password']) {
                
                // Succès ! On stocke les informations importantes en session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirection vers la page d'accueil
                header("Location: home.php");
                exit();
                
            } else {
                // Identifiants incorrects
                header("Location: index.php?error=1");
                exit();
            }

        } catch (PDOException $e) {
            die("Erreur technique : " . $e->getMessage());
        }
    } else {
        // Champs vides
        header("Location: index.php?error=empty");
        exit();
    }
} else {
    // Si on tente d'accéder au fichier sans passer par le formulaire
    header("Location: index.php");
    exit();
}