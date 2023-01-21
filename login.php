<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="#">Student Registration</a>
                </li>
                <li>
                    <a href="#">Fill Marks</a>
                </li>
                <li>
                    <a href="#">View Students</a>
                </li>
                <li>
                    <a href="printmark.php">Print Result</a>
                </li>
                <li>
                    <a href="#">Edit Registration</a>
                </li>
                <li>
                    <a href="#">Edit Marks</a>
                </li>
                <li>
                    <a href="login.php">Admin</a>
                    
                </li>
            </ul>
        </nav>
        
    </header>
    <div class="login">
        <form action="" method="post">
        <img src="bihar.png" alt="" class="img">
       <input type="text" name="username" placeholder="Enter User Name"><br>
       <input type="password" name="password" placeholder="Enter Password"><br>
        <button name="submit" class="btn">Submit</button><br>
        </form>
    </div>
</body>
</html>
<?php
include 'conn.php';
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