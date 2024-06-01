<?php
include "../../backEnd/clsDonations.php";
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
    <title><?php echo $_SESSION['currentUser']->getUserName();?>-More info</title>
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
        <h1>Hello, <?php echo $_SESSION["currentUser"]->getUserName();?></h1>
        <p>
            On behalf of everyone involved in our mission, I want to extend a heartfelt thank you for choosing our platform to contribute towards the humanitarian efforts in Gaza. Your generosity and compassion are truly commendable. With your support, we are able to make a meaningful difference in the lives of those affected by the ongoing crisis in Gaza.
        </p>
        <p>
            Your donation not only provides essential aid but also sends a powerful 
            message of solidarity and hope to the people enduring unimaginable hardships.
             Every contribution, no matter the size, plays a crucial role in bringing relief
              and support to those in need. Thank you for standing with us in this critical time
               and for being a beacon of kindness and empathy. Together, we can make a positive impact
                and work towards a brighter future for Gaza and its inhabitants.
        </p>
        <p>
            Thank you once again for your generosity and for choosing to be part of our mission.
        </p>
        <h1>Site Numbers</h1>
        <p>
            Since its inception, our website has been a beacon of hope,
             uniting individuals like you in a shared mission of compassion and support. 
             Thanks to your unwavering dedication, our total donations have reached a staggering
              <?php echo "<b>".Donation::getTotalDonatins()."$"."</b>";?>, an astounding testament to the power of collective generosity. 
        </p>
        <p>
            But beyond the numbers lies a deeper impact—a tangible difference in the 
            lives of countless families. Through your contributions, over XXX families in Gaza have 
            received vital assistance, ranging from shelter and medical care to food and education. Each number
             represents a story of resilience and hope, made possible by your remarkable kindness.
        </p>
        <p>
            As we continue our journey together, let us take pride in these 
            achievements and remain steadfast in our commitment to building a brighter future 
            for all. Thank you for being an integral part of our community and for making these numbers
             not just statistics, but symbols of transformation and compassion.
        </p>
        <h1>Privacy</h1>
        <p>
            At [GAZA DONATION], safeguarding your personal information is our top priority. 
            We understand the importance of privacy and are committed to maintaining the confidentiality
             and security of all data entrusted to us. We employ industry-leading encryption technologies
              to protect your information from unauthorized access, ensuring that your data remains safe and secure.
        </p>
        <p>
            Additionally, we adhere to strict privacy policies and protocols to govern the collection,
             use, and storage of your data, giving you peace of mind knowing that your information is handled with the
             utmost care and responsibility. We continuously monitor and update our security measures to stay ahead of
              emerging threats, so you can confidently engage with our platform knowing that your privacy is always our foremost concern.
        </p>
        <p>
            With sincere gratitude,<br>
            [team HAS]
        </p>
        <h1>Leaderboard</h1>
        <h2>1.countries</h2>
        <p>
            
            Arab countries have historically maintained a strong bond with Gaza,
             demonstrating solidarity and offering assistance during times of need. The relationship
              between Arab nations and Gaza extends beyond mere geographical proximity; it embodies a s
              hared cultural heritage and a sense of kinship. When crises strike Gaza, such as conflicts 
              or humanitarian emergencies, Arab countries often step up to provide crucial support. Their contributions
               encompass various forms of aid, including financial assistance, medical supplies, and infrastructure development.

            The solidarity shown by Arab nations towards Gaza is not only commendable but also essential for
             alleviating the suffering of its people and rebuilding the region. Through their continuous support, 
             Arab countries contribute significantly to the reconstruction efforts and the improvement of living conditions in Gaza.<br>

            A dedicated website serves as a platform to express gratitude and 
            appreciation to these benevolent nations for their unwavering support. This site 
            highlights the generosity of Arab countries, showcasing the top three contributors based on
             the amount of donations provided. By acknowledging their contributions publicly, the website aims
              to foster greater awareness and encourage further assistance from other nations. In doing so, it 
              emphasizes the importance of collective action in addressing the challenges faced by Gaza and promoting
             stability and prosperity in the region.
        </p>
        <table border="1">
        <thead>
            <tr>
                <th>Country</th>
                <th>Amount Donated ($)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $topCountries=Donation::getTop3CountriesWithTotalDonations();
                foreach ($topCountries as $country => $totalDonations) {
                    echo "<tr>";
                    echo "<td>" . $country . "</td>";
                    echo "<td>" . $totalDonations . "</td>";
                    echo "</tr>";
                }
             ?>
        </tbody>
    </table>
    <h2>2.Humans</h2>
    <p>We extend our deepest gratitude to all the generous individuals who have contributed
         to our cause. Your selfless donations have made a significant difference in the lives of 
         those in need, and your kindness has touched hearts in ways beyond measure. Each contribution,
          no matter how big or small, has helped us provide essential support and relief to those facing
           adversity.</p>

    <p>To our cherished donors, we want to express 
        our sincerest appreciation for your unwavering support and compassion. 
        Your generosity has enabled us to continue our mission of making a positive impact 
        in communities around the world. It is through your kindness and empathy that we are able to 
        bring hope and relief to those who need it most.</p>

    <p>In recognition of your remarkable generosity, we would like to
         acknowledge the top three contributors whose extraordinary donations have 
         made a profound difference. Their exemplary support serves as an inspiration to
          us all, embodying the spirit of compassion and solidarity that defines our shared humanity.</p>
    <table border="1">
        <thead>
            <tr>
                <th>user</th>
                <th>Amount Donated ($)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $topUsers=Donation::getTop3UsersWithTotalDonations();
                foreach ($topUsers as $user => $totalDonations) {
                    echo "<tr>";
                    echo "<td>" . $user . "</td>";
                    echo "<td>" . $totalDonations . "</td>";
                    echo "</tr>";
                }
             ?>
        </tbody>
    </table>
    <div  <?php echo ($_SESSION['currentUser']->getUserName()=='admin')?"":"hidden"?>>
        <h1>Donation Log</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>user</th>
                    <th>Amount Donated ($)</th>
                    <th>date time</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $logDonation=Donation::getLogDonations();
                    foreach ($logDonation as $id => $record) {
                        echo "<tr>";
                        echo "<td>" . $record->userName . "</td>";
                        echo "<td>" . $record->amount . "</td>";
                        echo "<td>" . $record->time . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
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
</body>
</html>