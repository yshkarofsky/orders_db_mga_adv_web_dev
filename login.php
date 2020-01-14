<?php 
    require_once("header.php");
?>

<form id="login_dir" method="post" >

  <label for="email">Email Address:</label>
  <input type="text" name="email"><br>
  <label for="password">Password:</label>
  <input type="password" name="password"> <br>
  <input type="submit" id="login" name="login" value="Login">

</form>

<p>Not registered? 
    <a href="register.php">Register Now</a>
</p>


<?php 

  require_once('connection.php');

  function validate_password($con, $email, $password) {

      $rs = mysqli_query($con, "SELECT * FROM persons where persEmail = '$email' and persPassword = '$password';");
      
      $rowcount=mysqli_num_rows($rs);
      // echo "<br>row count $rowcount";
      if ($rowcount == 1){
          return TRUE;
      } else {
          return FALSE;
      }
  }

  if(isset($_POST['login'])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $verified = validate_password($con, $email, $password);
  
    if ($verified){
      // echo "<br>Authentication complete!<br>";

      header("Location: dashboard.php");


    } else {
      echo "<br>Authentication Failed. Please try again";
    }

  }

  mysqli_close($con);


  require_once('footer.php'); 

?>
