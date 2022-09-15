<?php 
// // Database configuration 
// $dbHost     = "localhost"; 
// $dbUsername = "root"; 
// $dbPassword = "root"; 
// $dbName     = "test1"; 
 
// // Create database connection 
// $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// // Check connection 
// if ($db->connect_error) { 
//     die("Connection failed: " . $db->connect_error); 
// }

Class dbObj{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "testing";
    var $conn;
    function getConnstring() {
    $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    /* check connection */
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    } else {
    $this->conn = $con;
    }
    return $this->conn;
    }
}