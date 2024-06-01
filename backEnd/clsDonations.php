<?php
include "clsUser.php";
class Record
{
    public $userName;
    public $amount;
    public $time;
    public function __construct($userName, $amount, $time)
    {
        $this->userName = $userName;
        $this->amount = $amount;
        $this->time = $time;
    }
}
class Donation 
{
    public static function getTotalDonatins()
    {
        $conn = connectDB();
        $sql="select sum(amount) as totalDonations
        from donations;";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result=$stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $row['totalDonations'];
    }
    public static function getTop3CountriesWithTotalDonations()
    {
        $conn = connectDB();
        $sql = "SELECT c.country_name AS country, ROUND(SUM(d.amount), 2) AS totalDonations
                FROM users u 
                INNER JOIN donations d ON u.userName = d.userName
                INNER JOIN countries c ON u.countryId = c.country_code
                GROUP BY c.country_code
                ORDER BY SUM(d.amount) DESC
                LIMIT 3;";
        
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $topCountries = [];
        while ($row = $result->fetch_assoc()) {
            $topCountries[$row['country']] = $row['totalDonations'];
        }
        $stmt->close();
        $conn->close();
        return $topCountries;
    }
    public static function getTheNameOfCountry($codeCountry)
    {
        $conn = connectDB();
        $sql = "SELECT c.country_name
        FROM countries c 
        WHERE c.country_code=?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$codeCountry);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $row["country_name"];
    }
    public static function getLogDonations()
    {
        $conn = connectDB();
        $sql = "SELECT s.idDonation,s.userName,s.amount,s.time
        from donations s;";
        
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $rocords = [];
        while ($row = $result->fetch_assoc()) {
            $temp = new Record($row['userName'],$row['amount'],$row['time']);

            $rocords[$row['idDonation']] = $temp;
        }
        $stmt->close();
        $conn->close();
        return $rocords;
    }
    public static function getTop3UsersWithTotalDonations()
    {
        $conn = connectDB();
        $sql = "select d.userName,sum(d.amount) as totalDonations
        from donations d 
        group by d.userName
        order by sum(d.amount) DESC
        limit 3;";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        
        $topUsers = [];
        while ($row = $result->fetch_assoc()) {
            $topUsers[$row['userName']] = $row['totalDonations'];
        }
        $stmt->close();
        $conn->close();
        return $topUsers;
    }
}
?>