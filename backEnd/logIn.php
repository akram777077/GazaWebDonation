<?php
    include "clsUser.php";
        session_start();
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
    } else if (isset($_POST["signUp"])) {
        $user=new User(true,$_POST["userName"],$_POST["password"],$_POST["email"],$_POST["country"]);
        $result = $user->save();
        if($result==-2)
        {
            gePageHtml("../frontEnd/html/LoginPage.html","the user name is in the system",false);
        }
        else if($result == 0)
        {
            gePageHtml("../frontEnd/html/LoginPage.html","somthing wrong ...",false);
        }
        else
        {
            gePageHtml("../frontEnd/html/LoginPage.html","your account add in the system",false);
        }
    }
?>
