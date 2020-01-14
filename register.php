<?php 
    require_once("header.php");
?>
<script src="validate.js"></script>

<form id="register_form" method="post" action="register.php">

  <label for`1="email">Email Address:</label>
  <input type="text" name="email" id="email" >
  <span id="err_1"></span><br>

  <label for="password">Password:</label>
  <input type="password" name="password" id="password"> 
  <span id="err_2"></span><br>

  <label for="f_name">First Name:</label>
  <input type="text" name="f_name" id="f_name">
  <span id="err_3"></span><br>

  <label for="l_name">Last Name:</label>
  <input type="text" name="l_name" id="l_name">
  <span id="err_4"></span><br>

  <label for="phone">Phone:</label>
  <input type="text" name="phone" id="phone">
  <span id="err_5"></span><br>

  <label for="office">Office Location:</label>
  <input type="text" name="office" id="office">
  <span id="err_6"></span><br>
  
  <label for="dept_list">Department</label>
  <select id = "dept_list" name="dept_list">

  <?php 
    require_once("connection.php");
    // echo "this is inside php block";
    $rs = mysqli_query($con, "SELECT deptID, deptName from departments;");

    while($row = $rs -> fetch_assoc()){
        $deptID = $row['deptID'];
        // echo $deptID;
        $deptName = $row['deptName'];
        echo "<option value = '$deptID'>$deptName</option>";
    }
    // mysqli_close($con);

  ?>

  </select>
  <span id="err_7"></span><br>

  <input type="submit" id="register_btn" value="Register" name="register_form" />


</form>

<p>Already Have an Account? 
    <a href="login.php">Login</a>
</p>



<?php 

  if(isset($_POST['register_form'])) {
    // require_once('connection.php');

    echo "inside register form php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['phone'];
    $office = $_POST['office'];
    $dept = $_POST['dept_list'];

    $sql = "INSERT INTO  persons (persEmail, persPassword, persFName, persLName, persPhone, persOffice, persDept) VALUES ('$email', '$password', '$f_name', '$l_name', '$phone', '$office', '$dept');";
    $rs = mysqli_query($con, $sql);
    if ($rs == 1){
        echo "Successfully Updated!";
        header("Location: login.php");

    } else {
        echo "Failed to Update. Please try again";
    }
    mysqli_close($con);

  }

  require_once('footer.php');
  
?>
