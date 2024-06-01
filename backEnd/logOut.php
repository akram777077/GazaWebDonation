<?php
session_start();
if (isset($_POST['logout']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['currentUser']=null;
    header('Location: ../frontEnd/html/LoginPage.html');
    exit();
}
?>
