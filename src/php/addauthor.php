<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include '../connection/db_connection.php';
    include '../utility/validation.php';
    include '../utility/fileUpload.php';

    if (
        isset($_POST['firstName']) &&
        isset($_POST['lastName'])
    ) {
        $a_fname = $_POST['firstName'];
        $a_lname = $_POST['lastName'];

        $userInput = 'firstName=' . $a_fname . '&lastName=' . $a_lname;

        $text = "Author First Name";
        $location = "../addAuthor.php";
        $ms = "error";
        isEmpty($a_fname, $text, $location, $ms, $userInput);

        $text = "Author Last Name";
        $location = "../addAuthor.php";
        $ms = "error";
        isEmpty($a_lname, $text, $location, $ms, $userInput);

        $sql = "INSERT INTO Authors (FirstName, LastName) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $a_fname, $a_lname);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $sm = "The author successfully created!";
            header("Location: ../addAuthor.php?success=$sm");
        } else {
            $em = "Unknown Error Occurred!";
            header("Location: ../addAuthor.php?error=$em");
            exit();
        }
    } else {
        header("Location: ../adminLogin.php");
        exit();
    }
}
?>
