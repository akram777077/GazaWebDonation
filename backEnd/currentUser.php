<?php
include "clsUser.php";
session_start();

class currentUser
{
    public static  $user;
    public static function setUser($user)
    {
         currentUser::$user = $user;
    }
}
?>