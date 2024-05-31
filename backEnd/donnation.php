<?php
include "clsUser.php";
session_start();
if (isset($_POST["donnate"])) {
    $result=$_SESSION['currentUser']->donation($_POST["amount"]);
    if ($result) {
    gePageHtml("../frontEnd/html/donnationPage.php","you donate ".$_POST["amount"]." thanks ".$_SESSION['currentUser']->getuserName()." for your help",false);
    }
    else
    {
    gePageHtml("../frontEnd/html/donnationPage.php","somthing wrong",false);
    }

} 
?>