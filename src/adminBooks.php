<?php
session_start();
if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {
    include 'connection/db_connection.php';
    include 'php/category.php';
    include 'php/book.php';
    include 'php/author.php';
    include 'php/admin.php';
    $Books = getAllBooks($conn);
    $authors = getAllAuthors($conn);
    $admion = getAllAdmin($conn);


    if (isset($_GET['categoryId'])) {
        $categoryId = $_GET['categoryId'];
    } else $categoryId = 0;
    if (isset($_GET['bookId'])) {
        $bookId = $_GET['bookId'];
    } else $bookId = 0;

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Books | Jafer Books</title>
        <link rel="stylesheet" href="css/adminBooks.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    </head>

    <body>
        <main>
            <div class="left" id="sideBar">
                <i class="fa-solid fa-close " id="closeIcon2"></i>
                <div class="uleft">
                    <div class="uuleft">
                        <i class="fa-solid fa-user"></i> <a>
                            Admin
                        </a>
                    </div>
                    <div class="luleft">
                        <a href="#">
                            <i class="fa-solid fa-layer-group"></i> Dashboard
                        </a href="#">
                        <a href="./books.html">
                            <i class="fa-solid fa-book"></i> Books
                        </a href="#">
                        <a href="#">
                            <i class="fa-solid fa-cart-shopping"></i>Order
                        </a href="#">
                        <a href="#">
                            <i class="fa-solid fa-users"></i> Users
                        </a href="#">

                    </div>
                </div>
                <div class="lleft">
                    <i class="fa-solid fa-right-from-bracket"></i> <a href="./adminLogin">
                        Logout
                    </a>
                </div>
            </div>
            <div class="right">
                <div class="uright">
                    <p>
                        <i class="fa-solid fa-list" id="burgerNav"></i> Books
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

                            <p class="p1">All Books</p>
                            <a href="./addBook.php">
                                <i class="fa-solid fa-square-plus"></i>
                            </a>
                        </div>
                        <div class="lmid">
                            <div class="ulmid">
                                <p>#</p>
                                <p>Cover</p>
                                <p>Title</p>
                                <p>Author</p>
                                <p>Price</p>
                                <p>Quantity</p>
                                <p class="fa">Action</p>
                            </div>
                            <div class="llmid">
                                <?php
                                if ($authors == 0 && $Books == 0) {
                                } else {
                                    foreach ($Books as $Book) {
                                        $Bookid = $Book['BookID'];
                                        $BookT = $Book['Title'];
                                        $BookC = $Book['CoverImageURL'];
                                        $P = $Book['Price'];
                                        $Qty = $Book['QuantityAvailable'];
                                        $AuthorFN = '';
                                        foreach ($authors as $author) {
                                            if ($author['AuthorID'] == $Book['AuthorID']) {
                                                $AuthorFN = $author['FirstName'];
                                                break;
                                            }
                                        }


                                ?>
                                        <div class="content" id="page">
                                            <p><?php echo $Bookid; ?></p>
                                            <div><img src="../uploads/cover/<?php echo $BookC; ?>"></div>
                                            <p><?php echo $BookT; ?></p>
                                            <p><?php echo $AuthorFN; ?></p>
                                            <p><?php echo $P; ?></p>
                                            <p><?php echo $Qty; ?></p>
                                            <div>

                                                <a href="php/deleteBook.php?bookId=<?php echo $Bookid; ?>" onclick="return confirm('Are you sure you want to delete this book?');">
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