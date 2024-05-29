<?php
    include "currentUser.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_POST["singIn"])) {
        $userName = $_POST["userName"];
        $password = $_POST["password"];  

        $_SESSION['currentUser']=user::getUserByUserName($userName);
        if (is_null($_SESSION['currentUser']) || !$_SESSION['currentUser']->isThePasswordCorrect($password)) {
            gePageHtml("../frontEnd/html/LoginPage.html","the user name or password is wrong",false);
        } else {
            header("Location: ../frontEnd/html/homePage.php");
            exit();
        }
    } else if (isset($_POST["singUp"])) {
        
    }
?>
