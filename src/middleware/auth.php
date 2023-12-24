<?php
session_start();
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    include "../connection/db_connection.php";
    include "../Validation/adminValidation.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $text = "Email";
    $location = "../views/adminLogin.php";
    $message = "error";
    isEmpty($email, $text, $location, $message, "");

    $text = "Password";
    $location = "../views/adminLogin.php";
    $message = "error";
    isEmpty($password, $text, $location, $message, "");

    $sql = "SELECT * FROM admin WHERE Email=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $numRows = mysqli_num_rows($result);



    if ($numRows === 1) {
        $user = mysqli_fetch_assoc($result);
        $userId = $user['Admin_id'];
        $userEmail = $user['Email'];
        $userPassword = $user['Password'];

        if ($email === $userEmail) {
            if (password_verify($password, $userPassword)) {
                $_SESSION['userId'] = $userId;
                $_SESSION['userEmail'] = $userEmail;
                header("Location: ../views/adminBooks.php");
            } else {
                $em = "Incorrect User name or password";
                header("Location: ../views/adminLogin.php?error=$em");
            }
        } else {
            $em = "Incorrect User name or password";
            header("Location: ../views/adminLogin.php?error=$em");
        }
    } else {
        $em = "Incorrect User name or password";
        header("Location: ../views/adminLogin.php?error=$em");
    }
} else {
    header("Location: ../views/adminlogin.php");
}
