<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include 'connection/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Author Form | Jafer Books</title>
    <link rel="stylesheet" href="css/bookForm.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main>
        <?php
        include 'layout/sideBar.php';
        ?>
        <div class="right">
            <div class="uright">
                <p><i class="fa-solid fa-list" id="burgerNav"></i> Authors</p>
                <?php
                if (isset($_GET['success'])) { ?>
                    <div class="successDiv">
                        <span><?= htmlspecialchars($_GET['success']); ?></span>
                        <i class="fa fa-close" id="closeIcon"></i>
                    </div>
                <?php }

                if (isset($_GET['error'])) { ?>
                    <div class="errorDiv">
                        <span><?= htmlspecialchars($_GET['error']); ?></span>
                        <i class="fa fa-close" id="closeIcon"></i>
                    </div>

                <?php } ?>
            </div>
            <div class="lright">
                <div class="midu">
                    <div class="umid">
                        <p class="p1">Author Form</p>
                    </div>
                    <div class="lmid">
                        <form id="authorForm" action="php/addauthor.php" method="POST">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" />

                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" />

                            <div class="xr">
                                <button type="submit">
                                    <i class="fa-solid fa-check"></i> Add Author
                                </button>
                                <button type="reset">
                                    <i class="fa-solid fa-file"></i> New
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>

</body>
<?php } else {
    header("Location: adminLogin.php");
    exit;
} ?>

</html>
