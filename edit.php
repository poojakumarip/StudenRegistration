<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <a href="home.php">Home</a>
    <div class="container">
        <form action="" method="post">
            <h3>Select Registration Number</h3>
            <input type="text" name="searchroll">
            <button class="btn" name="search">Search</button><br>
            <?php
            include 'conn.php';
            if(isset($_POST['search'])){
                $searchRoll = $_POST['searchroll'];
                $searchData = "SELECT * FROM `registration` WHERE roll_no =$searchRoll";
                $searchQuery = mysqli_query($connection, $searchData);
                $searchArray = mysqli_fetch_array($searchQuery);
                
                ?>
            
                
            <input type="text" name="regno" value="<?php echo $searchArray['reg_no']; ?>">
            <input type="text" name="rollno" value="<?php echo $searchArray['roll_no']; ?>">
            <input type="text" name="stname" value="<?php echo $searchArray['name']; ?>">
            <input type="text" name="fname" value="<?php echo $searchArray['fname']; ?>">
            <input type="text" name="mname" value="<?php echo $searchArray['mname']; ?>">
            <input type="date" name="dob" value="<?php echo $searchArray['dob']; ?>"><br>
            <button class="btn" name="update">Update</button>
            <?php
            }
        
            ?>
            
            
            

        </form>
    </div>
</body>

</html>
<?php
if(isset($_POST['update'])){
    $updateRoll = $_POST['rollno'];
    $updateReg = $_POST['regno'];
    $updateName = $_POST['stname'];
    $updateFname = $_POST['fname'];
    $updateMname = $_POST['mname'];
    $updateDob = $_POST['dob'];

    $updateData = "UPDATE `registration` SET `roll_no`='$updateRoll',`reg_no`='$updateReg',`name`='$updateName',`fname`='$updateFname',`mname`='$updateMname',`dob`='$updateDob' WHERE `roll_no`=$updateRoll";
    $updateQuery = mysqli_query($connection, $updateData);
    if($updateQuery==true){
        ?>
        <script>
            alert("Data has been Updated.....");
        </script>
  
        <?php
    }
    
    else {
        ?>
        <script>
            alert("Data Updated Error!");
        </script>
        <?php
    }
}
?>