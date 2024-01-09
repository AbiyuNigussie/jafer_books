<?php

if (isset($_GET['fname'])) {
    $fname = $_GET['fname'];
} else {
    $fname = "";
}

if (isset($_GET['lname'])) {
    $lname = $_GET['lname'];
} else {
    $lname = "";
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = "";
}

if (isset($_GET['pnum'])) {
    $pnum = $_GET['pnum'];
} else {
    $pnum = "";
}
if (isset($_GET['password'])) {
    $password = $_GET['password'];
} else {
    $password = "";
}
if (isset($_GET['address'])) {
    $address = $_GET['address'];
} else {
    $address = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/signup.css" />
    <title>Sign Up | JaferBooks</title>
</head>

<body>
    <form action="php/signup.php" method="POST">
        <div class="container">
            <h2>Create an Account</h2>
            <?php if (isset($_GET['error'])) { ?> <div class="alert">
                    <p>
                        <?= htmlspecialchars($_GET['error']); ?>
                    </p>

                </div>

            <?php } ?>
            <div>
                <input type="text" placeholder="First Name" name="fname">
                <label for="fname"></label>
            </div>
            <div>
                <input type="text" placeholder="Last Name" name="lname" id="lname">
                <label for="lname"></label>
            </div>
            <div>
                <input type="text" placeholder="Email" name="email" id="email">
                <label for="email"><i class="fa-solid fa-envelope"></i></label>
            </div>
            <div>
                <input type="text" placeholder="Phone Number" name="pnum" id="pnum">
                <label for="pnum"><i class="fa-solid fa-phone"></i></label>
            </div>
            <div>
                <input type="text" placeholder="Address" name="address" id="address">
                <label for="address"><i class="fa-solid fa-location-dot"></i></label>
            </div>
            <div>
                <input type="password" placeholder="Password" name="psw" id="psw">
                <label for="password"><i class="fa-solid fa-lock"></i></label>
            </div>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="signin.php">Login here
                </a>.</p>


        </div>

    </form>
</body>

</html>