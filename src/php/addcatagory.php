<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include '../connection/db_connection.php';
    include '../utility/validation.php';

    if (
        isset($_POST['categoryName']) &&
        isset($_POST['description'])
    ) {
        $categoryName = $_POST['categoryName'];
        $description = $_POST['description'];

        $userInput = 'categoryName=' . $categoryName . '&description=' . $description;

        $text = "Category Name";
        $location = "../addCategory.php";
        $ms = "error";
        isEmpty($categoryName, $text, $location, $ms, $userInput);

        // Add more validation as needed

        $sql = "INSERT INTO Categories (CategoryName, Description) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $categoryName, $description);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $sm = "The category successfully created!";
            header("Location: ../adminCatagory.php?success=$sm");
        } else {
            $em = "Unknown Error Occurred!";
            header("Location: ../addCatagory.php?error=$em");
            exit();
        }
    } else {
        header("Location: ../adminLogin.php");
        exit();
    }
}
?>
