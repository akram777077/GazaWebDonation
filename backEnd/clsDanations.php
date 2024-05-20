<?php
include "clsUser.php";
class Denaions 
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
}
?>