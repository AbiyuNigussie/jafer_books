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
  <?php
  include 'layout/footer.php';
  ?>
</body>

</html>