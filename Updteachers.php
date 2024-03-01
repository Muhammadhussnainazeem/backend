<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $param_TeacherID = $_POST['TeacherID'];
    $param_TeacherAnnualsalary = $_POST['TeacherAnnualsalary'];
    $param_TeacherEmail = $_POST['TeacherEmail'];

    $sql = "UPDATE teachers SET TeacherAnnualSalary= ?, TeacherEmail= ?
    WHERE TeacherID= ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sss", $param_TeacherAnnualsalary, $param_TeacherEmail, $param_TeacherID);
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