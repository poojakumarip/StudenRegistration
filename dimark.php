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
<h2>Student's Marksheet</h2>
    
    <table>
        <tr> 
            <th>RollNo.</th>
            <th>Hindi.</th>
            <th>English</th>
            <th>Mathematics</th>
            <th>Science</th>
            <th>Social Science</th>
            <th>Sanskrit</th>
        
        </tr>
        <?php
        $stData = "SELECT * FROM `mark`";
        $query = mysqli_query($connection,$stData);
        while($res = mysqli_fetch_array($query)){
       ?>
        <tr>
            <td><?php echo $res['roll_no'];?></td>
            <td><?php echo $res['hindi'];?></td>
            <td><?php echo $res['eng'];?></td>
            <td><?php echo $res['math'];?></td>
            <td><?php echo $res['sci'];?></td>
            <td><?php echo $res['sosci'];?></td>
            <td><?php echo  $res['sans'];?></td>
            
        </tr>
        <?php  
    }
    ?>
    </table>
</body>
</html>