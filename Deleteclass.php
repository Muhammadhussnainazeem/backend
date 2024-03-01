<?php
require_once "DatabaseConnection.php";
$databaseConnection = new DatabaseConnection();
$link = $databaseConnection->getConnection();

if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ClassID = $_POST['ClassID'];
    $sql = "DELETE FROM class WHERE ClassID = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $ClassID);

        if (mysqli_stmt_execute($stmt)) {
            echo "Class deleted successfully";
        } else {
            echo "Error deleting class: " . mysqli_error($link);
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

