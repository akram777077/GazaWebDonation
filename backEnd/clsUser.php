<?php
include "lib.php";
class User
{
    private $userName;
    private $password;
    private $email;
    private $flag;
    private $isNew;
    private $totalDonations;
    private $country;

    public function donation($amount)
    {
        $this->totalDonations += $amount;
        $conn = connectDB();
        $sql = "INSERT INTO donations (userName, amount, time) 
        VALUES (?,?, NOW());";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $this->userName, $amount);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $result = $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        $conn->close();
        if ($result) {
            return $affectedRows > 0 ? 1 : 0;
        } else {
            die("Execute failed: " . $stmt->error);
        }
    }
    private function getAmountFromDB()
    {
        $conn = connectDB();
        $sql = "SELECT u.userName,COALESCE(SUM(d.amount), 0) AS totalAmount
                FROM 
                users u
                LEFT JOIN 
                    donations d ON u.userName = d.userName
                WHERE 
                    u.userName = ?
                GROUP BY 
                    u.userName;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $this->userName);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $row['totalAmount'];
    }
    private function enPassword()
    {
        return convertToMD5($this->flag . $this->password);
    }
    public function getTotalDonations()
    {
        return $this->totalDonations;
    }
    private static function enPasswordStatic(&$password, &$flag)
    {
        $flag = getRandomString(10);
        $password = convertToMD5($flag . $password);
    }

    public function __construct($isNew, $userName, $password, $email,$country ,$flag = null)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->isNew = $isNew;
        $this->country = $country;
        if ($isNew) {
            $this->flag = getRandomString(10);
            $this->password = convertToMD5($this->flag . $password);
        } else {
            $this->flag = $flag;
            $this->password = $password;
            $this->totalDonations = $this->getAmountFromDB();
        }
    }

    public function setPassword($newPassword)
    {
        $this->password = convertToMD5($this->flag . $newPassword);
    }

    public function isThePasswordCorrect($password)
    {
        return $this->password == convertToMD5($this->flag . $password);
    }

    public static function isUserFound($userName)
    {
        $conn = connectDB();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE userName = ?;";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $result = $stmt->get_result();
        $found = $result->num_rows > 0;

        $stmt->close();
        $conn->close();

        return $found;
    }

    public static function getUserByUserName($userName)
    {
        $conn = connectDB();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE userName = ?;";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return null;
        }

        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        return new User(false, $row['userName'], $row['password'], $row['email'],$row['countryId'] ,$row['flag']);
    }

    public function save()
    {
        $conn = connectDB();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($this->isNew) {
            if (self::isUserFound($this->userName)) {
                return -2;
            }

            $sql = "INSERT INTO users (userName, flag, password, email,countryId) VALUES (?, ?, ?, ?,?);";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("sssss", $this->userName, $this->flag, $this->password, $this->email,$this->country);
        } else {
            $sql = "UPDATE users SET password = ?, email = ?,countryId=? WHERE userName = ?;";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("ssss", $this->password, $this->email, $this->userName,$this->country);
        }

        $result = $stmt->execute();
        $affectedRows = $stmt->affected_rows;

        $stmt->close();
        $conn->close();

        if ($result) {
            $this->isNew = false;
            return $affectedRows > 0 ? 1 : 0;
        } else {
            die("Execute failed: " . $stmt->error);
        }
    }
    public function getUserName()
    {
        return $this->userName;
    }
}
?>