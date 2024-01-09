<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include '../connection/db_connection.php';

    if (isset($_GET['categoryId'])) {
        $categoryId = $_GET['categoryId'];

        $sql = "DELETE FROM Categories WHERE CategoryID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $categoryId);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $sm = "The category successfully deleted!";
            header("Location: ../adminCatagory.php?success=$sm");
        } else {
            $em = "Unknown Error Occurred!";
            header("Location: ../adminCatagory.php?error=$em");
            exit();
        }
    } else {
        header("Location: ../adminLogin.php");
        exit();
    }
}
?>
