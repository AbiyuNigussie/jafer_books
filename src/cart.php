<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/cart.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Cart | Jafer Books</title>
</head>

<body>
  <?php
  include 'layout/header.php';
  ?>
  <div id="main">
    <div>
      <h1>MY BOOK</h1>
    </div>
    <div id="book">
      <h2>Book Title</h2>
      <!-- <img src="imgg/images (2).png" style="width: 50px; height: 60px; "> -->
      <div id="book-desc">
        <p>This is a brief discription of the book</p>
        <p>ETB 150.50</p>
        <p>Qty:2</p>
      </div>
    </div>
    <div class="remove-icon" onclick="removeBook(this)">X</div>
    <div id="book1">
      <h2>Book Title</h2>
      <!-- <img src="imgg/images (2).png" style="width: 50px; height: 60px; "> -->
      <p>This is a brief discription of the book</p>
      <p>ETB 150.50</p>
      <p>Qty:2</p>
    </div>
    <div class="remove-icon1" onclick="removeBook(this)">X</div>
    <div>
      <h2>Book Title</h2>
      <!-- <img src="imgg/images (2).png" style="width: 50px; height: 60px; "> -->
      <p>This is a brief discription of the book</p>
      <p>ETB 150.50</p>
      <p>Qty:2</p>
    </div>
    <div class="remove-icon2" onclick="removeBook(this)">X</div>
    <div id="checkout">
      <h2>Total</h2>
      <hr />
      <p>sub total</p>
      <p>ETB 450.50</p>
      <p>tax %</p>
      <p>ETB 120.40</p>
      <p>Delivery</p>
      <p>ETB 55.50</p>
      <hr />
      <button id="check-button">CHECKOUT</button>
    </div>
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