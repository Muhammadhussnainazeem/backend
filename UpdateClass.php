<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $param_ClassID = $_POST['ClassID'];
    $param_ClassCapacity = $_POST['ClassCapacity'];
    $param_ClassName = $_POST['ClassName'];
    $param_ClassYear = $_POST['ClassYear'];
    $sql = "UPDATE class SET ClassCapacity=?, ClassName=?, ClassYear=? WHERE ClassID=?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $param_ClassCapacity, $param_ClassName, $param_ClassYear, $param_ClassID);
        if(mysqli_stmt_execute($stmt)){
            echo "Record Updated Successfully";
        } else{
            echo "Error in Updating Records: " . mysqli_error($link);
        }
    }
    mysqli_stmt_close($stmt);
}
$databaseConnection->closeConnection();
?>
