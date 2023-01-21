<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markfill</title>
    <link rel="stylesheet" href="mark.css">
    <link rel="icon" href="bihar.jpg">
</head>
<body>
<a href="home.php">HOME</a>
    <div class="containter">
        <form action="" method="post">
            <br><br>
            <h3>Please Enter Marks</h3>
            <select name="roll" id="">
                <?php
                include 'conn.php';
                $rdata = "SELECT * FROM `registration`";
                $query = mysqli_query($connection,$rdata);
                $result = mysqli_num_rows($query);
                if($result>0){
                    foreach($query as $row){
                        ?>
                        <option value="<?= $row['roll_no'] ?>"><?= $row['roll_no'] ?></option>
                        <?php
                    }
             
                }
?>
            
                
            </select>
<input type="text" name="hindi" placeholder="Enter Marks of Hindi">
  <input type="text" name="english" placeholder="Enter Marks of English">
  <input type="text" name="math" placeholder="Enter Marks of Math">
  <input type="text" name="science" placeholder="Enter Marks of Science">
  <input type="text" name="social" placeholder="Enter Marks of Social Science">
  <input type="text" name="sanskrit" placeholder="Enter Marks of Sanskrit">
  <button name="submit" class="btn">Submit</button>
  </form>
</div>
<?php
if(isset($_POST['submit'])){
    $rollNo = $_POST['roll'];
    $hindi = $_POST['hindi'];
    $eng = $_POST['english'];
    $math = $_POST['math'];
    $sci = $_POST['science'];
    $social = $_POST['social'];
    $sans = $_POST['sanskrit'];
    if($hindi>99||$eng>99||$math>99||$sci>99||$social>99||$sans>99){
        echo "Number should be 99 or less";
    }else {
        $saveData = "INSERT INTO `mark`(`roll_no`, `hindi`, `eng`, `math`, `sci`, `sosci`, `sans`)
         VALUES ('$rollNo','$hindi','$eng','$math','$sci','$social','$sans')";
    $saveQuery = mysqli_query($connection, $saveData);
    if($saveQuery==true){
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
</body>
</html>

