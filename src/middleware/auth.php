<?php
session_start();
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    include "../connection/db_connection.php";
    include "../utility/validation.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $text = "Email";
    $location = "../adminLogin.php";
    $message = "error";
    isEmpty($email, $text, $location, $message, "");

    $text = "Password";
    $location = "../adminLogin.php";
    $message = "error";
    isEmpty($password, $text, $location, $message, "");

    $sql = "SELECT * FROM userAccount WHERE Email=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $numRows = mysqli_num_rows($result);



    if ($numRows === 1) {
        $user = mysqli_fetch_assoc($result);
        $userId = $user['UserID'];
        $userEmail = $user['Email'];
        $userPassword = $user['Password'];
        $userRole = $user['Role'];

        if ($email === $userEmail) {
            if (password_verify($password, $userPassword)) {
                $_SESSION['userId'] = $userId;
                $_SESSION['userEmail'] = $userEmail;
                $_SESSION['userRole'] = $userRole;
                if ($userRole == 'employee') {
                    header("Location: ../adminAuthor.php");
                } else {

                    header("Location: ../adminBooks.php");
                }
            } else {
                $em = "Incorrect username or password";
                header("Location: ../adminLogin.php?error=$em");
            }
        } else {
            $em = "Incorrect username or password";
            header("Location: ../adminLogin.php?error=$em");
        }
    } else {
        $em = "Incorrect username or password";
        header("Location: ../adminLogin.php?error=$em");
    }
} else {
    header("Location: ../adminlogin.php");
}
