<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $param_StudentID = $_POST['StudentID'];
    $param_StudentName = $_POST['StudentName'];
    $param_StudentAddress = $_POST['StudentAddress'];
    $param_StudentMedInfo = $_POST['StudentMedInfo'];

    $sql = "UPDATE students SET StudentName=?, StudentAddress=?, StudentMedInfo=? WHERE StudentID=?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $param_StudentName, $param_StudentAddress, $param_StudentMedInfo, $param_StudentID);
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

