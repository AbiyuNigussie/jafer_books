<?php
session_start();
if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include 'connection/db_connection.php';
    include 'php/category.php';
    $categories = getAllCategories($conn);

    if (isset($_GET['categoryId'])) {
        $categoryId = $_GET['categoryId'];
    } else $categoryId = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories | Jafer Books</title>
    <link rel="stylesheet" href="css/adminCatagory.css" />
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
                    <i class="fa-solid fa-list" id="burgerNav"></i> Categories
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

                        <p class="p1">All Categories</p>
                        <a href="./addcatagory.php">
                            <i class="fa-solid fa-square-plus"></i>
                        </a>
                    </div>
                    <div class="lmid">
                        <div class="ulmid">
                            <p>#</p>
                            <p>Category Name</p>
                            <p>Description</p>
                            <p class="fa">Action</p>
                        </div>
                        <div class="llmid">
                            <?php
                            if ($categories == 0) {
                            } else {
                                foreach ($categories as $category) {
                                    $categoryId = $category['CategoryID'];
                                    $categoryName = $category['CategoryName'];
                                    $description = $category['Description'];
                            ?>
                                    <div class="content" id="page">
                                        <p><?php echo $categoryId; ?></p>
                                        <p><?php echo $categoryName; ?></p>
                                        <p><?php echo $description; ?></p>
                                        <div>
                                            <a href="php/deletecatagory.php?categoryId=<?php echo $categoryId; ?>" onclick="return confirm('Are you sure you want to delete this category?');">
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
