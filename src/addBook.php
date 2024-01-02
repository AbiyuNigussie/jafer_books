<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {

  include 'connection/db_connection.php';
  include 'php/category.php';
  include 'php/author.php';

  $categories = getAllCategories($conn);
  $authors = getAllAuthors($conn);


  if (isset($_GET['categoryId'])) {
    $categoryId = $_GET['categoryId'];
  } else $categoryId = 0;
  if (isset($_GET['authorId'])) {
    $author_id = $_GET['authorId'];
  } else $authorId = 0;
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Book Form | Jafer Books</title>
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
          <p><i class="fa-solid fa-list" id="burgerNav"></i> Books</p>
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
              <p class="p1">Book Form</p>
            </div>
            <div class="lmid">
              <form id="bookForm" action="php/addBook.php" method="POST" enctype="multipart/form-data">
                <label for="bookId">Book ID</label>
                <input type="text" id="bookId" name="bookId" />
                <label for="title">Title</label>
                <input type="text" id="title" name="title" />

                <label for="author">Author</label>
                <select name="author">
                  <option value="0">Select author</option>
                  <?php
                  if ($authors == 0) {
                  } else {
                    foreach ($authors as $author) {
                      $name = $author['FirstName'] . " " . $author['LastName'];
                      if ($authorId == $author['AuthorID']) { ?>
                        <option selected value="<?= $author['AuthorID'] ?>">
                          <?= $name ?>
                        </option>
                      <?php } else { ?>
                        <option value="<?= $author['AuthorID'] ?>">
                          <?= $name ?>
                        </option>
                  <?php }
                    }
                  }
                  ?>
                </select>
                <label for="category">Category</label>
                <select name="category">
                  <option value="0">Select category</option>
                  <?php
                  if ($categories == 0) {
                  } else {
                    foreach ($categories as $category) {
                      if ($categoryId == $category['CategoryID']) { ?>
                        <option selected value="<?= $category['CategoryID'] ?>">
                          <?= $category['CategoryName'] ?>
                        </option>
                      <?php } else { ?>
                        <option value="<?= $category['CategoryID'] ?>">
                          <?= $category['CategoryName'] ?>
                        </option>
                  <?php }
                    }
                  }
                  ?>


                </select>
                <label for="pubDate">Publication Date</label>
                <input type="date" id="pubDate" name="pubDate" />
                <label for="pages">Pages</label>
                <input type="number" id="pages" name="pages" />
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" rows="5">
              </textarea>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" />

                <label for="quantity">Stock Quantity</label>
                <input type="text" id="quantity" name="quantity" />

                <label for="cover">Cover Image</label>
                <input type="file" id="cover" name="cover" accept="image/*" />

                <div class="xr">
                  <button type="submit">
                    <i class="fa-solid fa-check"></i> Add Book
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