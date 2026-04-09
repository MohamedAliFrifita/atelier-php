<?php
session_start();

// PROTECTION : Si la session n'existe pas, retour au login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Récupération des infos pour l'affichage
$user_name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration Platform</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #4a76a8; /* La couleur bleue de votre capture */
        }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand {
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Students Management System</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="home.php">Home</a>
                <a class="nav-link" href="liste_etudiants.php">Liste des étudiants</a>
                <a class="nav-link" href="liste_sections.php">Liste des sections</a>
                <a class="nav-link text-warning" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Hello, PHP LOVERS!</h1>
                <p class="col-md-8 fs-4">Welcome to your administration Platform, <strong><?php echo $user_name; ?></strong>.</p>
                <hr class="my-4">
                <p>Vous êtes connecté en tant que : <span class="badge bg-info text-dark"><?php echo $_SESSION['role']; ?></span></p>
            </div>
        </div>
    </div>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>