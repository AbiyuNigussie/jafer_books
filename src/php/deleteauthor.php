<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include '../connection/db_connection.php';

    if (isset($_GET['authorId'])) {
        $authorId = $_GET['authorId'];

        $sql = "DELETE FROM Authors WHERE AuthorID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $authorId);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $sm = "The author successfully deleted!";
            header("Location: ../adminAuthor.php?success=$sm");
        } else {
            $em = "Unknown Error Occurred!";
            header("Location: ../adminAuthor.php?error=$em");
            exit();
        }
    } else {
        header("Location: ../adminLogin.php");
        exit();
    }
}
?>
