<?php # DISPLAY COMPLETE LOGIN PAGE.

# Set page title and display header section.
$page_title = 'Login' ;
include('header.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){

  $email = $_POST['loginEmail'];
  $pswrd = $_POST['loginPassword'];
  
require ('scripts/connect_db.php');

  $sql= "SELECT * FROM users WHERE email = '$email' AND password = SHA1('$pswrd')";
  $result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    session_start();
    $_SESSION["userid"] = $row[userID];
    $_SESSION["username"] = $row[firstname];
    header("Location: index.php");
  }
} else {
    $error = "Email or password incorrect";
}  

mysqli_close( $conn );
}


?>

<script type="text/javascript" src="js/login.js"></script>

<div id="logindiv" class="logindiv film-list">

  <div class="tabs">
    <a onclick="login();"><h5 id="loginTab">Login</h5></a><a onclick="register();"><h5 id="registerTab">Register</h5></a>
  </div>

<div id="login-form">
  <form action="login.php" method="post">
    <label>Email address: <?php echo $error ?></label><br>
    <input type="text" name="loginEmail"><br>
    <label>Password:</label><br>
    <input type="password" name="loginPassword"><br><br>
    <input class="submit btn" type="submit" name="login" value="Login" />
    <br><br><h6>Forgot password?</h6>
  </form>
</div>

<div id="register-form">
  <form action="register.php" method="post">
    <label>Firstname:</label>
    <input type="text" name="firstname">
    <label>Lastname:</label>
    <input type="text" name="lastname">
    <label>Email address:</label>
    <input type="text" name="email">
    <label>Phone Number:</label>
    <input type="text" name="phone">
  <br><br>
    <label>Post Code:</label>
    <input id="postcode" type="text" name="postcode" onChange="getAddress();" placeholder="Auto Lookup">
    <label>Address 1:</label>
    <input id="addr1" type="text" name="address1" placeholder="Address Line 1">
    <label>Address 2:</label>
    <input id="addr2" type="text" name="address2" placeholder="Address Line 2">
    <label>City:</label>
    <input id="city" type="text" name="city" placeholder="City">
    <br><br>
    <label>Password:</label>
    <input type="password" name="pass1">
    <label>Confirm Password:</label>
    <input type="password" name="pass2">
    <br><br>
    <input class="checkI" type="checkbox" name="terms" value="1">
    <label class="checkL">I accept the Terms and Conditions</label>
    <br><br>
    <input class="submit btn" type="submit" name="login" value="Register" />
  </form>
</div>

</div>

<!-- Footer -->
<footer class="customfooter">
        <div class="container">
          <div class="row">
            <div class="col-sm">
          <h5>Bioscoop</h5>
          <p><i>We are an award-winning cinema, making sure that students get the best budget friendly deals.</i></p>
          <span class="copyright-year">&copy 2018</span><span> </span><span>Bioscoop</span><span>. </span><span>All Rights Reserved.</span></p>
        </div>
        <div class="col-sm">
          <p>Site plan</p>
          <p><a href="#">Home</a> - <a href="#">What's On</a> - <a href="#">Coming Soon</a> - <a href="#">Contact</a> - <a href="#">Book Now</a> - <a href="#">Login / Register</a></p>
        </div>
        </div>
        </div>
      </footer>
  <!-- /Footer -->

</body>

</html>