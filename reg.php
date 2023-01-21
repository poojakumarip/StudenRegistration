<?php
    include 'conn.php';
    $reg="AKU/2022/BCA ";
    $data="SELECT * FROM `registration` ORDER BY roll_no DESC LIMIT 1";
    $query=mysqli_query($connection,$data);
    $row=mysqli_fetch_array($query);
    $roll=$row['roll_no'];
    $uroll=$roll+1;
    $ureg=$reg.$uroll;
    $rno=rand(10000,500000);
    $ureg=$reg.$rno;

    if(isset($_POST['save'])){
    $inroll=$_POST['roll'];
    $inreg=$_POST['reg'];
    $sname=$_POST['sname'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $dob=$_POST['dob'];
    $mob=$_POST['mob'];
    $add=$_POST['add'];
    $image=$_FILES['image'];
    $filename=$image['name'];
    $filepath=$image['tmp_name'];
    $fileError=$image['error'];

    if($fileError==0)
    {
        $filelocat='img/'.$filename;
        move_uploaded_file($filepath,$filelocat);
        $indata="INSERT INTO `registration`(`roll_no`, `reg_no`, `name`, `fname`, `mname`, `dob`, `mob_no`, `address`, `image`) 
        VALUES ('$inroll','$inreg','$sname','$fname','$mname','$dob','$mob','$add',' $filelocat')";
        $univQuery=mysqli_query($connection,$indata);
        if($univQuery==true){
            ?>
            <script>
                alert("Data Has Been Inserted");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Error !");
            </script>
            <?php
        }


    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reg.css">
    <link rel="icon" href="bihar.jpg">
</head>
<body>
<a href="home.php">HOME</a>

         <div .he>        
        <h1>Student Information</h1>
        </div>
    <div class="container">
        <form action=" " method="POST" enctype="multipart/form-data">
            <label for="">Registration No. :</label>
            <input type ="text" name="reg" value="<?php echo $ureg?>" readonly>
            <label for="">Roll No. :</label>
            <input type ="text" name="roll" value="<?php echo $uroll?>" readonly>
            <label for="">Student Name:</label>
            <input type ="text" name="sname" placeholder="Enter Student Name">
            <label for="">Father Name:</label>
            <input type ="text" name="fname" placeholder="Enter father's Name">
            <label for="">Mother Name:</label>
            <input type ="text" name="mname" placeholder="Enter mother's Name">
            <label for="">Date Of Birth:</label>
            <input type ="date" name="dob" placeholder="Enter DOB"><br>
            <label for="">Contact No.:</label>
            <input type ="number" name="mob" placeholder="Enter Contact"><br>
            <label for="">Address:</label>
            <input type ="text" name="add" placeholder="Enter Address">
            <label for="">Image File:</label>
            <input type ="file" name="image">
            <input type ="submit" name="save" value="Submit" class="btn"> 
        </form>
    </div>
</body>
</html>