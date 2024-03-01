<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();
if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
    }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $param_ParentsID = $_POST['ParentsID'];
    $param_ParentsName = $_POST['ParentsName'];
    $param_ParentsAddress = $_POST['ParentsAddress'];
    $param_ParentsEmail = $_POST['ParentsEmail'];
    $param_ParentsTel = $_POST['ParentsTel'];
    $sql = "UPDATE Parents SET  ParentsName=?, ParentsAddress=?,ParentsEmail=?,ParentsTel=? WHERE ParentsID=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $ $param_ParentsName, $param_ParentsAddress, $param_ParentsEmail,$param_ParentsTel,$param_ParentsID);
        
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
