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
    <title>HomePage</title>
    <link rel="stylesheet" href="../css/homePage.css">
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
                        <ul><a href="#" style="color: #CD1B1B;">Home</a></ul>
                        <ul><a href="donnationPage.php">Donate</a></ul>
                        <ul><a href="#">Contact us</a></ul>
                        <ul><a href="#">My account</a></ul>
                    </li>
                </div>
            </div>
        </header>
        <div class="topcontent">
            <h1>Gaza has been under occupation since the past</h1>
            <p>Gaza, a Palestinian territory, faces ongoing conflict due to historical disputes and the Israeli blockade. Governed by Hamas since 2007, it experiences periodic violence with Israel, resulting in humanitarian crises due to restrictions on movement and goods. Efforts to resolve the situation have been challenging amid international calls for peace and humanitarian aid.</p>
            <button><a href="#">MAKE CHANGE</a></button>
        </div>
        <div class="mid_content">
            <h1>The situation in GAZA</h1>
            <p>In the war, Gaza experiences intense violence characterized by airstrikes from Israel and rocket attacks from Palestinian factions, primarily Hamas. Civilians, including women and children, often bear the brunt of the casualties and destruction. The densely populated area exacerbates the impact, leading to widespread displacement, damage to infrastructure, and loss of life. Humanitarian organizations work to provide aid amidst the chaos, but the situation remains dire, with both sides often accused of violating international humanitarian law.</p>
        </div>
        <div class="img-slider">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slide-1" src="../images/img slider/1.jpg" alt="3e" />
                    <img id="slide-2" src="../images/img slider/2.jpg" alt="" />
                    <img id="slide-3" src="../images/img slider/war-6303912_1280.jpg" alt="">
                    <img id="slide-4" src="../images/img slider/3.jpg" alt="">
                </div>
                <div class="slider-nav">
                    <a href="#slide-1" class="nav-circle"></a>
                    <a href="#slide-2" class="nav-circle"></a>
                    <a href="#slide-3" class="nav-circle"></a>
                    <a href="#slide-4" class="nav-circle"></a>
                </div>
                <!-- Arrows for navigation -->
                <div class="arrow left-arrow" onclick="moveSlide(-1)">&#10094;</div>
                <div class="arrow right-arrow" onclick="moveSlide(1)">&#10095;</div>
            </div>
        </div>
        <div class="stats">
            <h1 id="numoo">In numbers</h1>
            <div class="numbers">
                <div class="num">
                    <h1>85%</h1>
                    <p>The bombing targets residential areas, resulting in the destruction of homes and buildings. Entire neighborhoods are in ruins, leaving families homeless.</p>
                </div>
                <div class="num">
                    <h1>100%</h1>
                    <p>Of the people without safety anywhere, there is no shelter or sufficient food</p>
                </div>
                <div class="num">
                    <h1>85%</h1>
                    <p>Targeting citizens and killing innocent children, pregnant women and ordinary citizens</p>
                </div>
            </div>
        </div>

        <div class="boycott">
            <h1>
                Act now against companies profiting from the genocide of the palestinanian people 
            </h1>
            <p>
            Consider boycotting the products or services offered by these companies and encouraging others to do the same.
Participate in advocacy efforts to pressure governments and international bodies to hold these companies accountable for their actions.
Donate now and help the children..
            </p>
            <div class="butns">
               <button onclick="window.open('https://bdnaash.com', '_blank')"> SCAN </button>
               <button onclick="window.open('https://boycott.thewitness.news', '_blank')"> BROWSE</button>
            </div>
        </div>

        <div class="donate">
            <h1>EMERRGENCY ALERT </h1>
            <button onclick="window.open('./donnationPage.php', '_self')">DONNATE NOW </button>
        </div>

        <div class="imghover">
            <h1>WHAT HAPPENS WHEN YOU DONATE </h1>
            <div class="row">
              <div class="clmn">
                <div class="img-container">
                  <img src="../images/img hover/Untitled design (5).png" alt="">
                  <h2>img 1</h2>
                </div>
              </div>
              <div class="clmn">
                <div class="img-container">
                  <img src="../images/img hover/Untitled design (6).png" alt="">
                  <h2>img 2</h2>
                </div>
              </div>
              <div class="clmn">
                <div class="img-container">
                  <img src="../images/img hover/Untitled design (7).png" alt="">
                  <h2>img 3</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="clmn">
                <div class="img-container">
                  <img src="../images/img hover/Untitled design (8).png" alt="">
                  <h2>img 4</h2>
                </div>
              </div>
              <div class="clmn">
                <div class="img-container">
                  <img src="../images/img hover/Untitled design (9).png" alt="">
                  <h2>img 5</h2>
                </div>
              </div>
              <div class="clmn">
                <div class="img-container">
                  <img src="../images/img hover/Untitled design (10).png" alt="">
                  <h2>img 6</h2>
                </div>
              </div>
            </div>
          </div>




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
    <script src="../js/homePage.js"></script>
</body>
</html>
