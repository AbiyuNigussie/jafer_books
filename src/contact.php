<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/contact.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Contact Us | Jafer Books</title>
</head>

<body>
  <?php
  include 'layout/header.php';
  ?>
  <div class="wrapper">
    <div class="container">
      <div class="col-one">
        <h1>Contact Us</h1>
        <form action="#">
          <div>
            <label for="">Your name*</label>
            <input type="text" required />
          </div>
          <div>
            <label for="">Your e-mail*</label>
            <input type="email" required />
          </div>
          <div>
            <label for="">Your Message</label>
            <textarea name="" cols="30" rows="10"></textarea>
          </div>
          <div>
            <input type="submit" value="Send" />
          </div>
        </form>
      </div>
      <div class="col-two">
        <h2>Address Information</h2>
        <div class="info">
          <span>For Any Information, Pelase Don't Hesitate to Contact Us</span>
          <span>Email: info@jaferbooks.com</span>
          <span>Phone: +251-919-36-9842/ +251-911-53-3424</span>
          <span>Address: Legare,Addis Ababa, Ethiopia</span>
        </div>

        <div class="map-cont">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.5683832900986!2d38.7506006!3d9.0118025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b8552b3f763b1%3A0xbc805fb9699bc0aa!2zSmFmZXIgQm9vayBzdG9yZSB8IExlZ2VoYXIgfCDhjIPhjYvhiK0g4YiY4Yy94YiD4Y2NIOGImOGLsOGJpeGIrSB8IOGIiOGMiOGIg-GIrQ!5e0!3m2!1sen!2set!4v1701685788222!5m2!1sen!2set" width="400" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'layout/footer.php';
  ?>
</body>

</html>