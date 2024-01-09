<?php
session_start();
if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include 'connection/db_connection.php';
    include 'php/author.php';
    $authors = getAllAuthors($conn);

    if (isset($_GET['authorId'])) {
        $authorId = $_GET['authorId'];
    } else $authorId = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Authors | Jafer Books</title>
    <link rel="stylesheet" href="css/adminAuthor.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main>
        <?php
        include 'layout/sideBar.php';
        ?>
        <div class="right">
            <div class="uright">
                <p>
                    <i class="fa-solid fa-list" id="burgerNav"></i> Authors
                </p>
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

                        <p class="p1">All Authors</p>
                        <a href="./addAuthor.php">
                            <i class="fa-solid fa-square-plus"></i>
                        </a>
                    </div>
                    <div class="lmid">
                        <div class="ulmid">
                            <p>#</p>
                            <p>First Name</p>
                            <p>Last Name</p>
                            <p class="fa">Action</p>
                        </div>
                        <div class="llmid">
                            <?php
                            if ($authors == 0) {
                            } else {
                                foreach ($authors as $author) {
                                    $authorId = $author['AuthorID'];
                                    $firstName = $author['FirstName'];
                                    $lastName = $author['LastName'];
                            ?>
                                    <div class="content" id="page">
                                        <p><?php echo $authorId; ?></p>
                                        <p><?php echo $firstName; ?></p>
                                        <p><?php echo $lastName; ?></p>
                                        <div>
                                            <a href="php/deleteauthor.php?authorId=<?php echo $authorId; ?>" onclick="return confirm('Are you sure you want to delete this author?');">
                                                <i class="fa-solid fa-square-xmark" id="x"></i>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
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
