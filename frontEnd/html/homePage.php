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
                    include "../../backEnd/currentUser.php";
                    if(isset($_SESSION['currentUser']))
                    {
                    $userName=$_SESSION['currentUser']->getUserName();
                    echo "<h3>$userName</h3>";
                    }
                    else
                    {
                      header("Location: LoginPage.html");
                    }
                  ?>
                   <!-- Backend should populate this field with the user name --> 
                    <a href="./LoginPage.html"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a> 
                </div>
            </div>
            <div class="navigationbar">
                <div class="leftnav">
                    <a href="#"><img src="../images/1.png" height="100px" alt="Palestine"></a>
                </div>
                <div class="righttnav">
                    <li>
                        <ul><a href="#" style="color: #CD1B1B;">Home</a></ul>
                        <ul><a href="#">Donate</a></ul>
                        <ul><a href="#">Contact us</a></ul>
                        <ul><a href="#">My account</a></ul>
                    </li>
                </div>
            </div>
        </header>
        <div class="topcontent">
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis quod sint, omnis laudantium earum iusto provident temporibus, at eaque libero doloribus est distinctio sapiente officia facilis quo cum obcaecati! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, nesciunt? Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, dolorum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eveniet, exercitationem odit totam quis natus repellendus consequatur aliquam, animi harum sed quod similique eligendi quae quos voluptatem distinctio est! Debitis sed, magnam vel voluptate nihil sint earum omnis distinctio assumenda ipsum adipisci dicta esse ipsa itaque, eum perspiciatis temporibus nam eligendi cumque expedita dolore repudiandae asperiores qui excepturi! Asperiores dolores est fuga corporis. Molestias, expedita maxime, voluptatibus autem tempora quam ut, nisi sint exercitationem tenetur quidem sit natus. Ut, ullam. Doloribus consectetur harum magnam laborum vero deleniti, eos mollitia, minima sit, illum in esse itaque suscipit voluptate optio dolore dicta.</p>
            <button><a href="#">MAKE CHANGE</a></button>
        </div>
        <div class="mid_content">
            <h1>The situation in GAZA</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam cum magnam cumque corrupti facilis eos, nam ex repellat, unde numquam non inventore, recusandae sunt ea quam id quos amet quae eligendi sed dolores? Doloribus corrupti sint libero, aliquid veritatis cum nulla dicta eos praesentium quam vero eius commodi aliquam voluptatum. Officia omnis inventore consectetur molestias corrupti ducimus aliquam sint in. Nostrum iure reprehenderit quam veniam id maxime debitis. Veniam, provident voluptate. Nisi eligendi deleniti nam consequatur saepe voluptatum odio, eaque dignissimos corrupti fugit praesentium nihil, temporibus enim rerum pariatur maiores omnis repudiandae nostrum officiis placeat? Magnam at impedit accusantium, dolore illum ipsam, quibusdam voluptatibus totam ut accusamus porro eum amet inventore delectus ratione! Nihil numquam nisi repudiandae debitis consequatur illo distinctio sunt, eaque neque, voluptas iure! Ab quod numquam fugit libero veritatis soluta aspernatur nihil sit voluptatibus necessitatibus, dignissimos quasi maiores, deleniti, porro voluptates delectus! Excepturi esse quo amet quaerat, laboriosam temporibus voluptatem quia maiores, possimus nobis, eaque iste. Ad excepturi eum delectus similique soluta reiciendis necessitatibus, accusantium, dolor impedit ipsam eaque cupiditate, vitae omnis possimus debitis cum porro veniam voluptates aut! Ab odio doloribus ipsa excepturi, harum dolorem consectetur aspernatur? Iure deleniti hic laborum. Magnam quaerat ducimus eligendi quasi.</p>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quam harum voluptates fuga rem minus saepe doloremque ipsam! Odit, voluptatem.</p>
                </div>
                <div class="num">
                    <h1>85%</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quam harum voluptates fuga rem minus saepe doloremque ipsam! Odit, voluptatem.</p>
                </div>
                <div class="num">
                    <h1>85%</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quam harum voluptates fuga rem minus saepe doloremque ipsam! Odit, voluptatem.</p>
                </div>
            </div>
        </div>

        <div class="boycott">
            <h1>
                Act now against companies profiting from the genocide of the palestinanian people 
            </h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, dignissimos corporis? Cupiditate, ab ut modi consectetur veniam voluptatem, rerum maxime itaque dolores aspernatur excepturi quam magni nulla autem? Consectetur non necessitatibus tempore nesciunt aspernatur molestias, vitae labore, adipisci iusto ducimus corrupti ex, aliquid ipsa neque sapiente quisquam impedit dolorum vel.
            </p>
            <div class="butns">
               <button> SCAN </button>
               <button> BROWSE</button>
            </div>
        </div>

        <div class="donate">
            <h1>EMERRGENCY ALERT </h1>
            <button>DONNATE NOW </button>
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
                <p>Lorem ipsum dolor sit amet consectetur. <br>
                Lorem ipsum dolor sit amet consectetur <br>
                Lorem ipsum dolor sit amet consecteturbr
                <br>
                Lorem ipsum dolor sit amet consectetur
                Lorem <br> ipsum dolor sit amet consectetur
                Lorem ipsum dolor sit amet consectetur
                Lorem ipsum <br> dolor sit amet consectetur
                Lorem ipsum dolor sit <br>amet consectetur.</p>
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
              <h6> Lorem ipsum dolor sit amet.</h6>
              <h6>Lorem ipsum dolor sit amet.</h6>
           </div>
          </footer>


    </div>
    <script src="../js/homePage.js"></script>
</body>
</html>
