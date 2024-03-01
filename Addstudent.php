<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $StudentID = $_POST['StudentID'];
    $StudentName = $_POST['StudentName'];
    $StudentAddress = $_POST['StudentAddress'];
    $StudentMedInfo = $_POST['StudentMedInfo'];
    $sql = "INSERT INTO students (StudentID, StudentName, StudentAddress, StudentMedInfo) VALUES (?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $StudentID, $StudentName, $StudentAddress, $StudentMedInfo);
        if(mysqli_stmt_execute($stmt)){
            echo "New record created successfully";
        } else{
            echo "Error adding record: " . mysqli_error($link);
        }
    }
 
    mysqli_stmt_close($stmt);
}

$databaseConnection->closeConnection();

?>
