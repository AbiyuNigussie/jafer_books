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
  <?php
  include 'layout/header.php';
  ?>
  <div class="wrapper">
    <main>
      <div class="imgWrapper">
        <img src="images/bookCoverOne.jpg" alt="book cover" />
        <div class="add-to-cart-div">
          <button>Add to cart</button>
        </div>
      </div>

      <div class="book-details-wrapper">
        <div class="book-title">
          <span>Adaptive Web Design</span>
        </div>
        <div class="spec-col">
          <div class="author-name">
            <span>By: Aaron Gustafson</span>
          </div>
          <div class="price-div">
            <span>450 ETB</span>
          </div>
          <div class="quantity-div">
            <label for="">Quantity </label><input type="number" />
          </div>
          <div class="book-description">
            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Libero omnis animi voluptas voluptates non labore velit deleniti
              rem sint esse? Alias incidunt deserunt reprehenderit suscipit
              quia dolore earum, aliquid asperiores. Facere dignissimos
              laudantium temporibus saepe earum illum! Fugiat dolorem
              molestias ratione voluptatem dolores nisi quis provident nobis
              quas animi! Totam quisquam et voluptatibus ab debitis quidem a
              facere porro necessitatibus? Ipsum temporibus consequuntur optio
              fugiat suscipit alias delectus reprehenderit deleniti
              voluptatibus id, molestiae dignissimos provident voluptatum,
              beatae quibusdam! Tempora delectus, quisquam ea accusamus non
              accusantium assumenda molestiae voluptatem ullam dolor! Nihil
              quaerat eius possimus magnam. Temporibus voluptatibus vel
              quaerat commodi illum. Debitis voluptatibus nisi ad fugit
              expedita quos atque porro dolor eveniet amet, magni quis saepe,
              consequuntur dicta quisquam in!</span>
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