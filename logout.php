<?php
//on demarre la session pour la manipuler 
session_start();
session_unset();
session_destroy();
header("Location: index.php?logout=success");
exit();
?>