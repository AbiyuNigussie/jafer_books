<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/home.css" />
  <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"
    /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Home | JaferBooks</title>
</head>

<body>
  <?php
  include 'layout/header.php';
  include 'connection/db_connection.php';
  include 'php/book.php';
  include 'php/category.php';

  $books = getAllBooks($conn);
  $categories = getAllCategories($conn);

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
      <?php
      foreach ($categories as $category) { ?>
        <div class="row">
          <div class="title-cont">
            <p><?= $category['CategoryName'] ?></p>
          </div>
          <div class="books-list-cont">
            <?php
            foreach ($books as $book) {
              if ($book['CategoryID'] === $category['CategoryID']) { ?>
                <a href="bookItem.php?bookId=<?= $book['BookID'] ?>" class="book-item">
                  <div class="img-cont">
                    <img src="../uploads/cover/<?= $book['CoverImageURL'] ?>" />
                  </div>
                  <span class="book-title"><?= $book['Title'] ?></span>
                  <span class="book-author">Kerby Rosanes</span>
                  <span class="book-price">from <b><?= $book['Price'] ?></b></span>
                </a>
            <?php }
            }
            ?>
          </div>
        </div>
      <?php }
      ?>


    </main>
  </div>
  <?php
  include 'layout/footer.php';
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js"></script>
</body>

</html>