<?php
    include "clsUser.php";
    session_start();
if (isset($_POST["editAccount"])) {
    $currentPassword = $_POST["current-password"];
    $newEmail = $_POST["email"]; 
    $newCountry=$_POST["country"];
    if ($_SESSION["currentUser"]->isThePasswordCorrect($currentPassword)) {
        $_SESSION["currentUser"]->update($newEmail,$newCountry);
        if($_SESSION["currentUser"]->save())
        {
        gePageHtml("../frontEnd/html/myAccountPage.php","your infromation is update",false);
        exit();
        }
        else
        {
            gePageHtml("../frontEnd/html/myAccountPage.php","somthing wrong",false);
            exit();
        }
    } else {
        gePageHtml("../frontEnd/html/myAccountPage.php","the current password is wrong",false);
        exit();
    }
}
else if(isset($_POST["DeleteAccount"]))
{
    $currentPassword = $_POST["current-password"];
    if ($_SESSION["currentUser"]->isThePasswordCorrect($currentPassword)) {
        
        if(User::remove($_SESSION["currentUser"]->getUserName()))
        {
            $_SESSION["currentUser"]=null;
        gePageHtml("../frontEnd/html/LoginPage.html","your account is deleted",false);

        exit();
        }
        else
        {
            gePageHtml("../frontEnd/html/myAccountPage.php","somthing wrong",false);
            exit();
        }
    } else {
        gePageHtml("../frontEnd/html/myAccountPage.php","the current password is wrong",false);
        exit();
    }
}
?>