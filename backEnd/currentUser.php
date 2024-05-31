<?php
include "clsUser.php";

class currentUser
{
    public static  $user;
    public static function setUser($user)
    {
         currentUser::$user = $user;
    }
}
?>