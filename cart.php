
<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="store.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">STORE</a>
    <a href="about.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT</a>
    
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa shopping-cart"></i></a>
  </div>
</div>

<?php
  session_start();
  if(isset($_SESSION['selectedBook']) || !empty($_SESSION['selectedBook'])){
    echo '<p>'.$_SESSION['selectedBook'].'</p>';
  }
?>

<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">Check Out</h2>
      <div class="w3-col m12">
        <form action="cart.php" >
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="First Name" required name="FirstName">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Last Name" required name="LastName">
            </div>
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-twothird">
              <input class="w3-input w3-border" type="text" placeholder="Address Line 1" required name="AddressLine1">
            </div>
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-twothird">
              <input class="w3-input w3-border" type="text" placeholder="Address Line 2" required name="AddressLine2">
            </div>
           </div>
          <button class="w3-button w3-black w3-section w3-left" type="submit">SUBMIT</button>
        </form>
      </div>
    </div>
  </div>
 
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>
