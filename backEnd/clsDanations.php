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
}
?>