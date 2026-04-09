<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container">
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show" style="Display :none;">
        Veuillez verifier vos credentials
        <button type="button" class="btn-close" onclick="hideLoginError()"></button>
    </div>
    <form action="ProcessLogin.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="monEmail" class="form-label">username</label>
        <input type="email" name="email" class="form-control" id="monEmail" aria-describedby="emailHelp" placeholder="Enter Email">
        <div class="form-text">we ll never share your username with anyone else </div>
    </div>
    <div class="mb-3">
        <label for="monPassword" class="form-label">Pasword</label>
        <input type="password" name="password" class="form-control" id="monPassword" placeholder="Enter Password">
    </div>
    <button type="button" class=" btn btn-primary" onclick="showLoginError()">Login</button>  
    </form>
    </div>
    <script src="alert.js"></script>
</body>
</html>