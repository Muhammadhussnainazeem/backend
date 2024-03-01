<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $TeacherID = $_POST['TeacherID'];
    $TeacherPhonenumber = $_POST['TeacherPhonenumber'];
    $TeacherAnnualsalary = $_POST['TeacherAnnualsalary'];
    $TeacherEmail = $_POST['TeacherEmail'];
    $sql = "INSERT INTO teachers (TeacherID, TeacherPhonenumber, TeacherAnnualsalary, TeacherEmail) VALUES (?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $TeacherID, $TeacherPhonenumber, $TeacherAnnualsalary, $TeacherEmail);
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
