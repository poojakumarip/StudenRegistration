<?php
include 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="display.css">
    <link rel="icon" href="bihar.jpg">
</head>
<body>
<a href="home.php">HOME</a>
<h2>Student's Report</h2>
    
    <table>
        <tr> 
            <th>RollNo.</th>
            <th>Reg No.</th>
            <th>Name</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Date of Birth</th>
            <th>Contact no.</th>
            <th>Address</th>
            <th>Image</th>
            <th>Reg_Date</th>
        </tr>
        <?php
        $stData = "SELECT * FROM `registration`";
        $query = mysqli_query($connection,$stData);
        while($res = mysqli_fetch_array($query)){
       ?>
        <tr>
            <td><?php echo $res['roll_no'];?></td>
            <td><?php echo $res['reg_no'];?></td>
            <td><?php echo $res['name'];?></td>
            <td><?php echo $res['fname'];?></td>
            <td><?php echo $res['mname'];?></td>
            <td><?php echo $res['dob'];?></td>
            <td><?php echo  $res['mob_no'];?></td>
            <td><?php echo $res['address'];?></td>
            <td><img src="<?php echo $res['image'];?>" alt=""></td>
            <td><?php echo $res['date'];?></td>
        </tr>
        <?php  
    }
    ?>
    </table>
</body>
</html>