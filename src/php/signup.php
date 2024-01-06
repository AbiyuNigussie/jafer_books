<?php
session_start();
include '../connection/db_connection.php';
include '../utility/validation.php';

if (
    isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['email']) &&
    isset($_POST['pnum']) &&
    isset($_POST['address']) &&
    isset($_POST['psw'])
) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = strtolower(trim($_POST['email']));
    $pnum = strtolower(trim($_POST['pnum']));
    $pass1 = $_POST['psw'];
    $address = $_POST['address'];
    $userInput = 'fname=' . $fname . 'lname=' . $lname . '&email=' . $email . '&phoneNumber=' . $pnum . '&address=' . $address;

    $text = "First Name";
    $location = "../signup.php";
    $ms = "error";
    isEmpty($fname, $text, $location, $ms, $userInput);

    $text = "Last Name";
    $location = "../signup.php";
    $ms = "error";
    isEmpty($lname, $text, $location, $ms, $userInput);

    $text = "Email";
    $location = "../signup.php";
    $ms = "error";
    isEmpty($email, $text, $location, $ms, $userInput);

    $text = "Phone Number";
    $location = "../signup.php";
    $ms = "error";
    isEmpty($pnum, $text, $location, $ms, $userInput);
    isPhoneNumber($pnum, $text, $location, $ms, $userInput);

    $text = "Passowrd";
    $location = "../signup.php";
    $ms = "error";
    isEmpty($pass1, $text, $location, $ms, $userInput);

    $text = "Address";
    $location = "../signup.php";
    $ms = "error";
    isEmpty($address, $text, $location, $ms, $userInput);

    $emailCheckQuery = "SELECT COUNT(*) AS emailCount FROM Customers WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $emailCheckQuery);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $emailCount);
    mysqli_stmt_fetch($stmt);
    if ($emailCount > 0) {
        header("Location: ../signup.php?error=This email address has already been registered");
    } else {
        $password = password_hash($pass1, PASSWORD_DEFAULT);
        $sql1 = "INSERT INTO UserAccount (Email, Password, Role, CreatedAt) VALUES (?,?,?,CURRENT_TIMESTAMP)";
        $stmt = mysqli_prepare($conn, $sql1);
        $role =  'customer';
        mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $role);
        mysqli_stmt_execute($stmt);
        $userId = mysqli_insert_id($conn);


        $sql2 = "INSERT INTO Customers (FirstName, LastName, Email, PhoneNumber, Address, UserID, RegistrationDate) VALUES (?, ?, ?, ?, ?, ?,CURRENT_TIMESTAMP)";
        $stmt = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt, 'sssssi', $fname, $lname, $email, $password, $address, $userId);
        $res = mysqli_stmt_execute($stmt);
        if ($res) {
            header('Location: ../signin.php');
        }
        mysqli_stmt_close($stmt);
    }
} else {
    header("Location: ../signup.php");
}
