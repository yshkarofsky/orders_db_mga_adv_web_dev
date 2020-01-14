<?php 
    require_once("header.php");
    require_once('connection.php');
    $deptID = $_GET['deptID'];
    echo "<h4>Department</h4>";
    echo "<form id='update_record' method='post'>";
    $rs = mysqli_query($con, "SELECT * FROM departments WHERE deptID = '$deptID';");
    
    while($row = $rs -> fetch_assoc()){
        $d_id = $row['deptID'];
        $d_name = $row['deptName'];
        $d_phone = $row['deptPhone'];
        $d_email = $row['deptEmail'];
        $d_office = $row['deptOffice'];

        echo "<input type='hidden' value=$d_id/>";

        echo "<label>Name:</label>";
        echo "<input id='deptName' name='deptName' value=$d_name /><br>";

        echo "<label>Phone:</label>";
        echo "<input id='deptPhone' name='deptPhone' value=$d_phone /><br>";

        echo "<label>Email:</label>";
        echo "<input id='deptEmail' name='deptEmail' value=$d_email /><br>";

        echo "<label>Office:</label>";
        echo "<input id='deptOffice' name='deptOffice' value=$d_office /><br>";
        echo "<input type='submit' name='update_record' class='button' value='Update Record' />";
    }
    echo "</form>";
    echo "<a href='dashboard.php'>Back to Dashboard</a>";

    if(isset($_POST['update_record'])) { 
        require_once('connection.php');
        $deptName = $_POST['deptName'];
        $deptPhone = $_POST['deptPhone'];
        $deptEmail = $_POST['deptEmail'];
        $deptOffice = $_POST['deptOffice'];

        $sql = "UPDATE departments SET deptName='$deptName', deptPhone='$deptPhone', deptEmail='$deptEmail', deptOffice='$deptOffice' WHERE deptID = '$d_id';";
        $rs = mysqli_query($con, $sql);
        // echo $sql;
        if ($rs == 1){
            echo "Successfully Updated!";
    
        } else {
            echo "Failed to Update. Please try again";
        }

    } 


    mysqli_close($con);
    require_once("footer.php");
?>