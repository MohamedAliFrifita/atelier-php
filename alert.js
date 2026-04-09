function showLoginError(){
    let alertbox=   document.getElementById("error-alert");
    alertbox.style.display='block';
}

function hideLoginError(){
    let alertbox=   document.getElementById("error-alert");
    alertbox.style.display='none';
}
// cette fonction est pour gerer les inputs vides cote client
function validateForm() {
    const user = document.getElementById('monusername').value;
    const pass = document.getElementById('monPassword').value;

    if (user.trim() === "" || pass.trim() === "") {
        showLoginError();
        return false; // Empêche l'envoi du formulaire vers PHP
    }
    return true; // Autorise l'envoi vers processLogin.php
}