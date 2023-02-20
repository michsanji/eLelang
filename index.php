<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My eLelang</title>
  <link rel="stylesheet" href="assets/landingpage/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class='header'>
    <a href='#'>About</a>
    <a href='#'>Product</a>
    <a href='#' class='title'>My eLelang</a>
    <a href='user/login.php'>LOGIN</a>
    <a href='user/registrasi.php'>REGISTER</a>
  </div>

  <div class='top'>
    <div id='left'>
      <a>L<br>E<br>L<br>A<br>N<br>G</a>
    </div>
    <div id='right'>
      <img src='https://image.flaticon.com/icons/svg/107/107789.svg'>
      <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
    </div>
  </div>

  <div class='section'>
    <div class='image'>
      <img src='https://image.flaticon.com/icons/svg/107/107762.svg'>
    </div>
    <div class='content'>
      <a class='text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
      <a href='#' class='button'>Learn more</a>
    </div>
  </div>

  <div class='section'>
    <div class='content' style='align-items: flex-end; text-align: right;'>
      <a class='text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
      <a href='#' class='button'>Learn more</a>
    </div>
    <div class='image'>
      <img src='https://image.flaticon.com/icons/svg/107/107811.svg'>
    </div>
  </div>

  <div class='features'>
    <div id='left'>
      <img src='https://image.flaticon.com/icons/svg/107/107757.svg'>
    </div>
    <div id='right'>
      <a style='font-family: Righteous'>Posuere ac ut consequat semper.</a>
    </div>
  </div>

  <div class='testimonials'>
    <div class='box' style='margin-top: 0px; margin-bottom: 200px;'>
      <a class='comment'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
      <a class='name'>John Doe</a>
    </div>
    <div class='box' style='margin-top: 100px; margin-bottom: 100px;'>
      <a class='comment'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
      <a class='name'>John Doe</a>
    </div>
    <div class='box' style='margin-top: 200px; margin-bottom: 0px;'>
      <a class='comment'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
      <a class='name'>John Doe</a>
    </div>
  </div>

  <div class='footer'>
    <div id='left'>
      <input type='text' placeholder='Search...'>
      <a href='#'>Features</a>
      <a href='#'>Portfolio</a>
      <a href='#'>About</a>
      <a href='#'>Contact</a>
    </div>
    <div id='center'>
      <a class='heading'>Lorem Ipsum</a>
      <a class='description'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. And even more nonsense. ✌️</a>
    </div>
    <div id='right'>
      <a style='margin-bottom: 10px;' id="tahun"></a>
      <a>Written with 💜</a>
      <a>By Ihsan 🥳 Maulana</a>
    </div>
  </div>

  <script>
    var date = new Date();
    var current_date = date.getFullYear();
    document.getElementById("tahun").innerHTML = current_date;
  </script>
  <script src="assets/landingpage/script.js"></script>

</body>

</html>