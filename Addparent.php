<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();
if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $ParentsID = $_POST['ParentsID'];
    $ParentsName = $_POST['ParentsName'];
    $ParentsAddress = $_POST['ParentsAddress'];
    $ParentsEmail = $_POST['ParentsEmail'];
    $ParentsTel = $_POST['ParentsTel'];
    $sql = "INSERT INTO parents (ParentsID, ParentsName, ParentsAddress, ParentsEmail, ParentsTel) VALUES (?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $ParentsID, $ParentsName, $ParentsAddress, $ParentsEmail, $ParentsTel);
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
