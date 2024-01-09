<?php
include 'connection/db_connection.php';
include 'php/book.php';
include 'php/author.php';




if (isset($_GET['bookId'])) {
  $bookId = $_GET['bookId'];
  $bookDetails = getBookDetailsById($conn, $bookId);

  if ($bookDetails) {
    $bookTitle = $bookDetails['Title'];
    $price = $bookDetails['Price'];
    $pdate = $bookDetails['PublicationDate'];
    $coverImageURL = $bookDetails['CoverImageURL'];
    $description = $bookDetails['Description'];
    $authorId = $bookDetails['AuthorID'];

    $authorDetails = getAuthorById($conn, $authorId);
    $authorName = 'Unknown Author';

    if ($authorDetails && is_array($authorDetails) && count($authorDetails) > 0) {
      // Use the first author from the array
      $firstAuthor = $authorDetails[0];

      // Check if the necessary keys exist
      if (isset($firstAuthor['FirstName'], $firstAuthor['LastName'])) {
        $authorName = $firstAuthor['FirstName'] . ' ' . $firstAuthor['LastName'];
      }
    }
  } else {
    echo "Book not found";
    exit;
  }
} else {
  echo "Book ID not provided";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bookItem.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Book Item | Jafer Books</title>
</head>

<body>
  <?php include 'layout/header.php'; ?>
  <div class="wrapper">
    <main>
      <div class="imgWrapper">
        <img src="../uploads/cover/<?php echo $coverImageURL; ?>" alt="book cover" />
        <div class="add-to-cart-div">
          <button>Add to cart</button>
        </div>
      </div>

      <div class="book-details-wrapper">
        <div class="book-title">
          <span><?php echo $bookTitle; ?></span>
        </div>
        <div class="spec-col">
          <div class="author-name">
            <span>By: <?php echo $authorName; ?></span>
          </div>
          <div class="price-div">
            <span><?php echo $price; ?> ETB</span>
          </div>
          <div class="quantity-div">
            <span>Publication date: <?php echo $pdate; ?></span>
          </div>
          <div class="book-description">
            <p><?php echo $description; ?></p>
          </div>
        </div>
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
          <img src="../../public/images/facebook_icon.png" alt="facebook_icon" />
        </div>
      </div>
    </div>
  </footer>
</body>

</html>