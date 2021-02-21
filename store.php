<?php
  if (isset($_GET['book']))
  {
    $book = $_GET['book'];

    session_start();
    $_SESSION['selectedBook'] = $book;
    header("Location: cart.php");
    exit();
  }
?>
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

.w3-margin-left{      margin-left: 20px !important; }

.limit-text2 {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2;
   -webkit-box-orient: vertical;
   height: 3em;
}

.limit-text5 {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 4;
   -webkit-box-orient: vertical;
}

</style>

<script>
  $(document).ready(function(){
    $('.product-btn').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });
  });
</script>
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


<div class="w3-black" id="tour">
    <div class="w3-container w3-content w3-padding-64" style="max-width:90%;">
      <h2 class="w3-wide w3-center">OUR COLLECTIONS</h2>
      <p class="w3-opacity w3-center"><i>Remember to book your tickets!</i></p><br>      
      <?php
          require "mysqli_connect.php";

          $q1 = "select * from books";
          $r1 = mysqli_query($connection,$q1);

          if (mysqli_num_rows($r1) > 0) {

            while($row = mysqli_fetch_assoc($r1)) {
            $file_path ="images/". $row["bookImage"];
              //echo '<p>id: ' . $row["bookId"]. ' - Username: ' . $row["bookName"]. $row["bookAuthor"]. $row["bookDescription"]. $row["bookLanguage"]. $row["bookPrice"]. '<img src="'. $file_path. '" width="100" height="100"></p>';
              
              echo '<div class="w3-col s2 w3-margin-bottom w3-margin-left">';
              echo '<img src="'. $file_path. '" alt="'. $row["bookName"].'" style="width:100%; height:300px; " class="w3-hover-opacity">';
              echo '<div class="w3-container w3-white" style="height:200px;" >';
              echo '<p class="limit-text2"><b>'. $row["bookName"].'</b></p>';
              echo '<p class="w3-opacity">'. $row["bookAuthor"].'</p>';
              echo '<p class="limit-text5">'. $row["bookDescription"].'</p>';
              echo '</div>';
              echo '<div class="w3-container w3-white">';
              echo '<p>CAD '. $row["bookPrice"].'</p>';
              echo '<a href="store.php?book='. $row["bookId"].'" class=" product-btn w3-button w3-black w3-margin-bottom">Buy Now</a>';              echo '</div>';
              echo '</div>';
          
            }
          } else {
            echo "0 results";
          }
?>
      
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
