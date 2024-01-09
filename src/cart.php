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
  <div class="main">
    <div class="main-cont">
      <div class="first-col">
        <div class="col-title">
          <h2>My Cart</h2>
        </div>
        <div class="row">
          <div>
            <div class="img-cont">
              <img src="../uploads/cover/1984_cover.jpg" alt="">
            </div>
            <div class="bookdetails">
              <p><b>Title: </b>Nineteen Eighty-F</p>
              <p><b>Author: </b>George Orwell</p>
              <p><span id="price"><b>Price: $35.00</b></span></p>
              <p><span id="quantity"><b>Quantity: 2</b></span></p>

            </div>
          </div>
          <button><i class="fa fa-close"></i></button>

        </div>
        <div class="row">
          <div>
            <div class="img-cont">
              <img src="../uploads/cover/1984_cover.jpg" alt="">
            </div>
            <div class="bookdetails">
              <p><b>Title: </b>Nineteen Eighty-F</p>
              <p><b>Author: </b>George Orwell</p>
              <p><span id="price"><b>Price: $35.00</b></span></p>
              <p><span id="quantity"><b>Quantity: 2</b></span></p>

            </div>
          </div>
          <button><i class="fa fa-close"></i></button>

        </div>
      </div>
      <div class="second-col">h</div>
    </div>


  </div>


  <?php
  include 'layout/footer.php';
  ?>
</body>

</html>