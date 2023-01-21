<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSEB</title>
    <link rel="stylesheet" href="bihar.css">
    
</head>

<body>

  
    <div class="logo"> 
                    <div class="row">
                        <div class="con">
                            <h3 class="animate-charcter"> BIHAR SECONDRY EDUCATION BOARD</h3>
                        </div>
                    </div>
    </div>
               
    <div class="login">
        <form action="" method="post">
        <img src="Logo/personal-security.png"  width="150px" height="110px" alt="" class="img">
       <input type="text" name="username" placeholder="Enter User Name"><br>
       <input type="password" name="password" placeholder="Enter Password"><br>
        <button name="submit" class="btn">Submit</button><br>
        </form>
    </div>
    <?php
if(isset($_POST['submit'])){
    $userName = $_POST['username'];
    $userPassword = $_POST['password'];
    $adminData = "SELECT * FROM `login`";
    $adminQuery = mysqli_query($connection, $adminData);
    $adminRes = mysqli_fetch_array($adminQuery);
    $dbAdminid = $adminRes['userid'];
    $dbAdminpwd = $adminRes['password'];
    if($userName==$dbAdminid && $userPassword == $dbAdminpwd ){

        header('location:home.php');
    }else {
       ?>
       <script>
        alert("User Id or Password Invalid!");
       </script>
       <?php
    }
}
?>
    </div>
</body>

</html>