<?php 
    require_once("header.php");
    require_once('connection.php');

    function list_dept($con){
        $rs = mysqli_query($con, "SELECT * FROM departments;");
        echo "<h4>Departments</h4><table>";
        if(mysqli_num_rows($rs) > 0){
            # build headers
            echo "<tr><th>Department Name</th>";
            echo "<th>Phone</th>";
            echo "<th>Email</th>";
            echo "<th>Office</th>";
            echo "<th></th></tr>";

        } else {
            echo "Sorry, there are no departments.";
        }

        while($row = $rs -> fetch_assoc()){
            echo "<tr>";
            echo "<td> ".$row['deptName'] . " </td>";
            echo "<td> ".$row['deptPhone'] . " </td>";
            echo "<td> ".$row['deptEmail']." </td>";
            echo "<td> ".$row['deptOffice']." </td>";
            echo "<td> <a href=department.php?deptID=".$row['deptID'].">Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function list_people($con){
        $rs = mysqli_query($con, "SELECT persFName, persLName, persEmail, persPhone, deptName from persons
            JOIN departments ON persDept = deptID;");
        echo "<h4>People</h4><table>";
        if(mysqli_num_rows($rs) > 0){
            # build headers
            echo "<tr><th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Department Name</th></tr>";

        } else {
            echo "Sorry, there are no people.";
        }

        while($row = $rs -> fetch_assoc()){
            echo "<tr>";
            echo "<td> ".$row['persFName'] . " </td>";
            echo "<td> ".$row['persLName'] . " </td>";
            echo "<td> ".$row['persEmail']." </td>";
            echo "<td> ".$row['persPhone']." </td>";
            echo "<td> ".$row['deptName']." </td>";
            echo "</tr>";
        }
        echo "</table>";
    }




    list_dept($con);
    list_people($con);


    mysqli_close($con);
    require_once("footer.php");
?>