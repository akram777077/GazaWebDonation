<?php
include "../../backEnd/clsUser.php";
session_start();
if(is_null($_SESSION["currentUser"]))
{
  header("Location: LoginPage.html");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myAccount</title>
    <link rel="stylesheet" href="../css/moreInfoPage.css">
    <script src="https://kit.fontawesome.com/cd989df987.js" crossorigin="anonymous"></script>
    <!--for icons -->
</head>
<body>
    <div class="container">
    <header>
            <div class="topheader">
                <div class="left-topheader">
                    <h2>DONATION PORTAL</h2>
                    <h6>where hope finds a way</h6>
                </div>
                <div class="middle-topheader">
                   <a href="#"><i class="fa-brands fa-square-facebook" style="color: #ffffff; font-size: 2em;"></i></a> 
                   <a href="#"><i class="fa-brands fa-square-instagram" style="color: #ffffff; font-size: 2em;"></i></a> 
                   <a href="#"><i class="fa-brands fa-square-youtube" style="color: #ffffff; font-size: 2em;"></i></a> 
                   <a href="#"><i class="fa-brands fa-square-x-twitter" style="color: #ffffff; font-size: 2em;"></i></a> 
                </div>
                <div class="right-topheader">
                  <?php
                      $userName=$_SESSION['currentUser']->getUserName();
                      echo "<h3>". $userName."</h3>";
                  ?>
                   <!-- Backend should populate this field with the user name --> 
                   <form action="../../backEnd/logOut.php" method="post" id="logoutForm">
                        <input type="hidden" name="logout" value="1">
                        <a href="#" onclick="document.getElementById('logoutForm').submit();">
                            <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                        </a>
                    </form>
                </div>
            </div>
            <div class="navigationbar">
                <div class="leftnav">
                    <a href="#"><img src="../images/1.png" height="100px" alt="Palestine"></a>
                </div>
                <div class="righttnav">
                    <li>
                        <ul><a href="./homePage.php">Home</a></ul>
                        <ul><a href="donnationPage.php">Donate</a></ul>
                        <ul><a href="#" style="color: #CD1B1B;">More info</a></ul>
                        <ul><a href="./myAccountPage.php">My account</a></ul>
                    </li>
                </div>
            </div>
        </header>


        <footer>
           <div class="top">
            <div class="left">
                <h3>More about us </h3>
                <p>We always seek humanitarian work <br>and 
                  help those affected by this war <br>by
                   gathering the largest number <br>
                  of helpers and donors together <br>
                  to change the tragic situation of innocent people.
                <br>
                </p>
            </div>
             <div class="right">
                <img src="../images/ine.png" alt="">
                <h3>follow us on social media</h6>
                <div class="socialmedia">
                    <a href="#"><i class="fa-brands fa-square-facebook" style="color: #ffffff; font-size: 2em;"></i></a> 
                    <a href="#"><i class="fa-brands fa-square-instagram" style="color: #ffffff; font-size: 2em;"></i></a> 
                    <a href="#"><i class="fa-brands fa-square-youtube" style="color: #ffffff; font-size: 2em;"></i></a> 
                    <a href="#"><i class="fa-brands fa-square-x-twitter" style="color: #ffffff; font-size: 2em;"></i></a> 

                </div>
             </div>
           </div>
           <hr>
           <div class="buttom">
              <h6> Do what you can </h6>
              <h6> gaza.help@gmail.com </h6>
           </div>
          </footer>
    </div>
</body>
</html>