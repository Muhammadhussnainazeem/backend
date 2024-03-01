<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $param_ParentsID = $_POST['ParentsID'];
    $sql = "DELETE FROM parents WHERE ParentsID = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_ParentsID);

        if (mysqli_stmt_execute($stmt)) {
            echo "Parent deleted successfully";
        } else {
            echo "Error deleting parent: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($link);
    }

    $databaseConnection->closeConnection();
} else {
    echo "Invalid request method";
}
?>