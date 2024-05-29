<?php
    include "currentUser.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_GET["singIn"])) {
        $userName = $_GET["userName"];
        $password = $_GET["password"];  

        $_SESSION['currentUser']=user::getUserByUserName($userName);
        if (is_null($_SESSION['currentUser']) || !$_SESSION['currentUser']->isThePasswordCorrect($password)) {
            gePageHtml("../frontEnd/html/LoginPage.html","the user name or password is wrong",false);
        } else {
            header("Location: ../frontEnd/html/homePage.php");
            exit();
        }
    } else if (isset($_GET["singUp"])) {
        echo "signUp";
    }
?>
