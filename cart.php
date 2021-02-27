<?php

$firstNameErr = $lastNameErr = $emailErr = $addressLine1Err = $addressLine2Err = "";
$NameOnCardErr = $CardNumberErr = $monthErr = $cvvErr = $yearErr = $quantityErr = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
  {

        $flag = true;        

        $FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING);
        $LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING);
        $AddressLine1 = filter_var($_POST['AddressLine1'], FILTER_SANITIZE_STRING);
        $AddressLine2 = filter_var($_POST['AddressLine2'], FILTER_SANITIZE_STRING);
        $NameOnCard = filter_var($_POST['NameOnCard'], FILTER_SANITIZE_STRING);
        $CardNumber = filter_var($_POST['CardNumber'], FILTER_SANITIZE_STRING);
        $year = filter_var($_POST['yy'], FILTER_SANITIZE_STRING);
        $month = filter_var($_POST['mm'], FILTER_SANITIZE_STRING);
        $cvv = filter_var($_POST['cvv'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);

        if(empty($quantity)){
          $flag = false;
          $firstNameErr = "Quantity is required";
        }
        else if(!preg_match("/^[0-9]+$/",$quantity)){
          $flag = false;
          $quantityErr = "Quantity is not valid";
        }

        if(empty($FirstName)){
          $flag = false;
          $firstNameErr = "First Name is required";
        }
        else if(!preg_match("/^[a-zA-Z-' ]*$/",$FirstName)){
          $flag = false;
          $firstNameErr = "First Name is not valid";
        }

        if(empty($LastName)){
          $flag = false;
          $lastNameErr = "Last Name is required";
        }
        else if(!preg_match("/^[a-zA-Z-' ]*$/",$LastName)){
          $flag = false;
          $lastNameErr  = "Last Name is not valid";
        }

        if(empty($AddressLine1)){
          $flag = false;
          $addressLine1Err  = "Address Line 1 is required";
        }


        if(empty($NameOnCard)){
          $flag = false;
          $NameOnCardErr  = "Name On Card is required";
        }        
        else if(!preg_match("/^[a-zA-Z-' ]*$/",$NameOnCard)){
          $flag = false;
          $NameOnCardErr  = "Name On Card is not valid";
        }

        if(empty($CardNumber)){
          $flag = false;
          $CardNumberErr  = "Card Number is required";
        }
        else if(!preg_match("/^[0-9]*$/",$CardNumber)){
          $flag = false;
          $CardNumberErr  = "Name On Card is not valid";
        }
        
        if(empty($year)){
          $flag = false;
          $yearErr  = "Year is required";
        }
        else if(!preg_match("/^[0-9][0-9]$/",$year)){
          $flag = false;
          $yearErr  = "YY is not valid";
        }

        if(empty($month)){
          $flag = false;
          $monthErr  = "Month is required";
        }
        else if(!preg_match("/^[0-9]{2}$/",$month)){
          $flag = false;
          $monthErr  = "MM is not valid";
        }

        if(empty($cvv)){
          $flag = false;
          $cvvErr  = "CVV is required";
        }
        else if(!preg_match("/^[0-9]{3}$/",$cvv)){
          $flag = false;
          $yearErr  = "CVV is not valid";
        }

        if(empty($email)){
          $flag = false;
          $emailErr = "Email is required";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $flag = false;
            $emailErr = "Invalid email format";
        }

        if($flag == true){

          $q = 'INSERT INTO users(username,password) VALUES(?,?)';
          $statement = $connection->prepare($q);
          $statement->bind_param('ss', $username, $password);
          
          $username = $_POST['username'];
          $password = $_POST['password'];
      
          $statement->execute();
      
          if ($statement->affected_rows == 1) {
      
            echo "data inserted!";
          } 
          else {
            echo "insertion failed!";
          }
      
          $statement->close();
          unset($statement);
          $connection->close();
          unset($connection);
        }
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
.error {color: #FF0000;}
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



<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <form action="cart.php" method="POST" >
    <h2 class="w3-wide w3-center">Check Out</h2>

    <h3 class="w3-wide w3-left">Billing Items</h3>
    <?php
      require "mysqli_connect.php";
      session_start();
      if(isset($_SESSION['selectedBook']) || !empty($_SESSION['selectedBook'])){
          $bookId = $_SESSION['selectedBook'];
          
              $q1 = 'select * from books where bookId ="'.$_SESSION['selectedBook'].'"';
              $r1 = mysqli_query($connection,$q1);
              if (mysqli_num_rows($r1) > 0) {
                while($row = mysqli_fetch_assoc($r1)) {
                  $file_path ="images/". $row["bookImage"];
                  echo '<div class="w3-col">';
                    echo '<div class="w3-col s2 w3-margin-bottom w3-margin-left">';
                      echo '<img src="'. $file_path. '" alt="'. $row["bookName"].'" style="width:100%; height:150px; " class="w3-hover-opacity">';
                    echo '</div>';
                    echo '<div class="w3-col s9 w3-margin-bottom w3-margin-left">';
                      echo '<div class="w3-container w3-white" style="height:200px;" >';
                      echo '<p class="limit-text2"><b>'. $row["bookName"].'</b></p>';
                      echo '<p class="w3-opacity">'. $row["bookAuthor"].'</p>';
                      echo '<p class="limit-text5">'. $row["bookDescription"].'</p>';
                      echo '<div class="w3-col s2 " style=" color: red; font-weight: bold; ">CAD '. $row["bookPrice"].'</div>';
                      echo '<input class="w3-input w3-border" type="number" id="quantity" name="quantity" value="0" max=10 min=1 style="width:15%;"/></div>';
                      echo '</div>';
                      echo '</div>';
                      
                 
                }
              }
      }
    ?>
      <div class="w3-col m12">
        <h3 class="w3-wide w3-left">Billing Address</h3>

            <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
              <div class="w3-twothird">
                <input class="w3-input w3-border" type="text" placeholder="First Name" required autocomplete="off" name="FirstName" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">              
              </div>
              <span class="error">* <?php echo $firstNameErr;?></span>
            </div>

            <div class="w3-row-padding" style="margin:0 -16px 8px -16px"">
              <div class="w3-twothird">
                <input class="w3-input w3-border" type="text" placeholder="Last Name" required name="LastName" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>">
              </div>
              <span class="error">* <?php echo $lastNameErr;?></span>            
            </div>            

          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-twothird">
              <input class="w3-input w3-border" type="text" placeholder="Address Line 1" required name="AddressLine1" value="<?php if (isset($_POST['AddressLine1'])) echo $_POST['AddressLine1']; ?>">
            </div>
            <span class="error">* <?php echo $addressLine1Err;?></span>
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-twothird">
              <input class="w3-input w3-border" type="text" placeholder="Address Line 2" required name="AddressLine2" value="<?php if (isset($_POST['AddressLine2'])) echo $_POST['AddressLine2']; ?>">
            </div>
           </div>

           <h3 class="w3-wide w3-left">Payment Information</h3>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Card Name" required name="NameOnCard" value="<?php if (isset($_POST['NameOnCard'])) echo $_POST['NameOnCard']; ?>">
            </div>
              <span class="error">* <?php echo $NameOnCardErr;?></span>
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="number" placeholder="Card Number" required name="CardNumber" maxlength="15" value="<?php if (isset($_POST['CardNumber'])) echo $_POST['CardNumber']; ?>">
            </div>
              <span class="error">* <?php echo $CardNumberErr;?></span>
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-third">
              <input class="w3-input w3-border" type="number" placeholder="MM" required name="mm" min="1" max="12" value="<?php if (isset($_POST['mm'])) echo $_POST['mm']; ?>">
              <span class="error">* <?php echo $monthErr;?></span>
            </div>
            <div class="w3-third">
              <input class="w3-input w3-border" type="number" placeholder="YY" required name="yy" min="0" max="99" value="<?php if (isset($_POST['yy'])) echo $_POST['yy']; ?>">
              <span class="error">* <?php echo $yearErr;?></span>
            </div>
            <div class="w3-third">
              <input class="w3-input w3-border" type="number" placeholder="cvv" required name="cvv" min="100" max="999">
              <span class="error">* <?php echo $cvvErr;?></span>
            </div>
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-twothird">
              <input class="w3-input w3-border" type="text" placeholder=" Billing Email" required name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
            </div>
              <span class="error">* <?php echo $emailErr;?></span>
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
