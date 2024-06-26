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
    <title><?php echo $_SESSION['currentUser']->getUserName();?>-Donation</title>
    <link rel="stylesheet" href="../css/donnationPage.css">
    <script src="https://kit.fontawesome.com/cd989df987.js" crossorigin="anonymous"></script>
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
                    echo "<h3>$userName</h3>";
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
                        <ul><a href="homePage.php">Home</a></ul>
                        <ul><a href="#"  style="color: #CD1B1B;">Donate</a></ul>
                        <ul><a href="./moreInfoPage.php">More info</a></ul>
                        <ul><a href="./myAccountPage.php">My account</a></ul>
                    </li>
                </div>
            </div>
        </header>

        <section >
            <div class="donate">
                <form action="../../backEnd/donnation.php" method="POST">
                    <div class="first"> 
                        <h2>choose an amount</h2>
                        <div class="btns">
                            <button type="button" onclick="changeInputValue('100')">100$</button>
                            <button type="button" onclick="changeInputValue('500')">500$</button>
                            <button type="button" onclick="changeInputValue('1000')">1000$</button>
                            <button type="button" onclick="changeInputValue('2000')">2000$</button>
                        </div>
                    </div>
                    <div class="second">
                         <label for="amount"><h2>or enter your own </h2> </label>
                         <input type="number" name="amount" id="amount" placeholder="000000000$" min="1" required>
                         <p>total donations: 
                            <?php
                                echo $_SESSION['currentUser']->getTotalDonations()."$";
                            ?>
                         </p>

                    </div>
                    <div class="third">
                        <button type="reset">RESET</button>
                        <button type="submit" name="donnate">DONNATE</button>

                    </div>
                </form>
            </div>

        </section>


        
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
    <script src="../js/donnationPage.js"></script>
</body>
</html>