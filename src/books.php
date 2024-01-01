<?php
include "connection/db_connection.php";
include "php/category.php";
include "php/book.php";
include "php/author.php";

$categories = getAllCategories($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Books | JaferBooks</title>
  <link rel="stylesheet" href="css/books.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php
  include 'layout/header.php';
  ?>
  <div class="wrapper">
    <aside class="categories-cont">
      <div class="title-cont">
        <p>Books Categories</p>
      </div>
      <div class="list-cont">
        <ul>
          <?php
          if ($categories == 0) {
          } else {
            foreach ($categories as $category) { ?>
              <li><a href="books.php?categoryId=<?= $category['CategoryID'] ?>"><?= $category['CategoryName'] ?></a></li>
          <?php }
          }
          ?>

        </ul>
      </div>
    </aside>
    <main class="main-cont">
      <div class="row">
        <?php
        if (isset($_GET["categoryId"])) {
          $catId = $_GET["categoryId"];
          $booksByCat = getBookByCategory($conn, $catId);
          $categoryById = getCategoryById($conn, $catId);
          if ($categoryById) {
            if ($booksByCat) { ?>
              <div class="title-cont">
                <p><?= $categoryById['CategoryName'] ?></p>
              </div>
              <div class="books-list-cont">

                <?php
                foreach ($booksByCat as $book) {
                  $bookAuthor = getAuthorById($conn, $book['AuthorID']);
                ?>
                  <a href="#" class="book-item">
                    <div class="img-cont">
                      <img src="../uploads/cover/<?= $book["CoverImageURL"] ?>" />
                    </div>
                    <span class="book-title"><?= $book["Title"] ?></span>
                    <span class="book-author"><?= $bookAuthor['FirstName'] . " " . $bookAuthor['LastName'] ?></span>
                    <span class="book-price">from <b><?= $book['Price'] ?></b></span>
                  </a>
                <?php } ?>
              </div> <?php
                    } else {
                      echo "No books in this category";
                    }
                  }
                }

                      ?>
      </div>

    </main>
  </div>
  <footer>
    <div class="cols">
      <div class="col">
        <ul>
          <li><a href="./index.html">Home</a></li>
          <li><a href="./books.html">Books</a></li>
          <li><a href="./event.html">Events</a></li>
          <li><a href="./contact.html">Contact</a></li>
          <li><a href="./about.html">About</a></li>
        </ul>
      </div>
      <div class="col">
        <span>For Any Information, Pelase Don't Hesitate to Contact Us</span>
        <div class="cont-info">
          <span>Email: info@jaferbooks.com</span>
          <span>Phone: +251-919-36-9842/ +251-911-53-3424</span>
          <span>Address: Legare,Addis Ababa, Ethiopia</span>
        </div>
      </div>
      <div class="col">
        <span class="follow-us">Follow us</span>
        <div class="social-icons">
          <img src="facebook_icon.png" alt="facebook_icon" />
        </div>
      </div>
    </div>
  </footer>
</body>

</html>