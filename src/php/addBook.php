<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {

    include '../connection/db_connection.php';
    include '../utility/validation.php';
    include '../utility/fileUpload.php';

    if (
        isset($_POST['bookId']) &&
        isset($_POST['title']) &&
        isset($_POST['author']) &&
        isset($_POST['category']) &&
        isset($_POST['pubDate']) &&
        isset($_POST['pages']) &&
        isset($_POST['description']) &&
        isset($_POST['price']) &&
        isset($_POST['quantity']) &&
        isset($_FILES['cover'])
    ) {
        $bookId = $_POST['bookId'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $pubDate = $_POST['pubDate'];
        $pages = $_POST['pages'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $userInput = 'bookId=' . $bookId . 'title=' . $title . '&categoryId=' . $category . '&desc=' . $description . '&price=' . $price . '&quantity=' . $quantity . '$authorId=' . $author;

        $text = "Book ID";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($bookId, $text, $location, $ms, $userInput);
        isBookId($bookId, $text, $location, $ms, $userInput);

        $text = "Book title";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($title, $text, $location, $ms, $userInput);

        $text = "Book description";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($description, $text, $location, $ms, $userInput);

        $text = "Book author";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($author, $text, $location, $ms, $userInput);

        $text = "Book category";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($category, $text, $location, $ms, $userInput);

        $text = "Publcation Date";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($pubDate, $text, $location, $ms, $userInput);

        $text = "Book Pages";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($pages, $text, $location, $ms, $userInput);

        $text = "Book Price";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($price, $text, $location, $ms, $userInput);

        $text = "Book Quantity";
        $location = "../addBook.php";
        $ms = "error";
        isEmpty($quantity, $text, $location, $ms, $userInput);


        $allowedImageExs = array("jpg", "jpeg", "png");
        $path = "cover";
        $bookCover = uploadFiles($_FILES['cover'], $allowedImageExs, $path);

        if ($bookCover['status'] == "error") {
            $em = $bookCover['data'];
            header("Location: ../addBook.php?error=$em&$userInput");
            exit();
        } else {
            $bookCoverUrl = $bookCover['data'];
            $sql = "INSERT INTO books(
                BookID,
                Title,
                AuthorID,
                CategoryID,
                PublicationDate,
                Pages,
                Description,
                Price,
                QuantityAvailable,
                CoverImageURL
                ) values(?,?,?,?,?,?,?,?,?,?);";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssiisisdis", $bookId, $title, $author, $category, $pubDate, $pages, $description, $price, $quantity, $bookCoverUrl);
            $res = mysqli_stmt_execute($stmt);

            if ($res) {
                $sm = "The book succcessfully created!";
                header("Location: ../addBook.php?success=$sm");
            } else {
                $em = "Unknown Error Ocurred!";
                header("Location: ../addBook.php?error=$em");
                exit();
            }
        }
    } else {
        header("Location ../adminLogin.php");
    }
}
