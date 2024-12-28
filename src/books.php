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
                  <a href="bookItem.php?bookId=<?= $book['BookID'] ?>">
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
  <?php
  include 'layout/footer.php';
  ?>
</body>

</html>