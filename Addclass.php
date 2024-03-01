<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $ClassID = $_POST['ClassID'];
    $ClassCapacity = $_POST['ClassCapacity'];
    $ClassName = $_POST['ClassName'];
    $ClassYear = $_POST['ClassYear'];
    
    $sql = "INSERT INTO class (ClassID, ClassCapacity, ClassName, ClassYear) VALUES (?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $ClassID, $ClassCapacity, $ClassName, $ClassYear);
        if(mysqli_stmt_execute($stmt)){
            echo "New record created successfully";
        } else{
            echo "Error adding record: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}

$databaseConnection->closeConnection();

?>
