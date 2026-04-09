<?php 
  $showError = isset($_GET['error']); 
?>
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
    <div id="error-alert" class="alert alert-danger alert-dismissible fade show" style="Display :<?php echo $showError ? 'block' : 'none'; ?>;">
        Veuillez verifier vos credentials
        <button type="button" class="btn-close" onclick="hideLoginError()"></button>
    </div>
    <form id="loginForm" action="ProcessLogin.php" method="post"  enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="monusername" class="form-label">username</label>
        <input type="username" name="username" class="form-control" id="monusername" aria-describedby="emailHelp" placeholder="Enter Username">
        <div class="form-text">we ll never share your username with anyone else </div>
    </div>
    <div class="mb-3">
        <label for="monPassword" class="form-label">Pasword</label>
        <input type="password" name="password" class="form-control" id="monPassword" placeholder="Enter Password">
    </div>
    <button type="submit" class=" btn btn-primary" >Login</button>  
    </form>
    </div>
    <script src="alert.js"></script>
</body>
</html>