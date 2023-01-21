<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrintMarksheet</title>
    <link rel="stylesheet" href="printmark.css">
    <link rel="icon" href="bihar.jpg">
    
</head>
<body>
    <form action="" method="post"> 
    <div class="container">
        <label for="rollno">Please Enter Roll No.:</label>
        <div>
            <input type="text" name="rollno" id="rollNumber" class="search" >
            <input type="submit" name="search" value="Search" class="btn">
            <button class="btn"><a href="home.php" class="anc">HOME</a></button>
        </div>
    </div> <br>
    </form>
    <div class="table" style="overflow-x: auto;">
    <table style="width:100%">
    <?php
      if(isset($_POST['search'])){
        $serachRoll = $_POST['rollno'];
        $regdata="SELECT * FROM `registration` WHERE roll_no = $serachRoll";
        $allData= mysqli_query($connection,$regdata);
        $reg = mysqli_fetch_array($allData);
        $mdata="SELECT * FROM `mark` WHERE roll_no = $serachRoll";
        $mData= mysqli_query($connection,$mdata);
        $res = mysqli_fetch_array($mData);
        if($res==false){
          ?>
          <script>
            alert("This Roll Number Not Found");
          </script>
          <?php
        }else {
      ?>
    
        <tr  class="head">
          <th colspan="5"> <img src="bihar.jpg" alt="">BIHAR SECONDRY EDUCATION BOARD, PATNA</th>
        </tr>
        <tr class="head1">
            <th colspan="3">ANNUAL SECONDRY SCHOOL EXAMINATION RESULT- 2022</th>
          </tr>
          <tr class="head3">
            <th colspan="3">PERSONAL DETAILS</th>
          </tr>
      </table>
      <br>
      <table style="width:100%">
        <tr>
           <td >Roll Number</td>
            <td><?php echo $serachRoll;?></td>
            <td rowspan=""> <td><img src="<?php echo $reg['image'];?>" alt=""></td></td>
        </tr>
          <tr>
            <td>Student Name</td>
            <td><?php echo $reg['name'];?></td>
            
            
          </tr>
          <tr>
              <td>Father's Name</td>
              <td><?php echo $reg['fname']; ?></td>
             
            </tr>
            <tr>
              <td>Mother's Name</td>
              <td><?php echo $reg['mname']; ?></td>
            
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td><?php echo $reg['dob']; ?></td>
              
            </tr>
            
      </table><br>
      <table  style="width:65%%">
        <tr class="head3">
            <th colspan="7">MARK DETAILS</th>
          </tr>
          
        <tr>
            <th colspan="">SUBJECTS</th>
            <th colspan="">F. MARKS</th>
            <th colspan="">P. MARKS</th>
            <th colspan="">THEORY</th>
            <th colspan="">INT/PRAC</th>
            <th colspan="">REGULATION</th>
            <th colspan="">SUBJECT TOTAL</th>
        </tr>
        <tr>
            <td>HINDI</td>
            <td>100</td>
            <td></td>
            <td id="hindi"><?php echo $res['hindi']; ?> </td>
            <td> </td>
            <td> </td>
            <td> <?php echo $res['hindi']; ?></td>
          </tr>
          <tr>
            <td>ENGLISH</td>
            <td>100</td>
            <td></td>
            <td id="english"><?php echo $res['eng']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['eng']; ?></td>
          </tr>
          <tr>
            <td>MATHEMATICS</td>
            <td>100</td>
            <td></td>
            <td id="math"><?php echo $res['math']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['math']; ?></td>
          </tr>
          <tr>
            <td>SCIENCE</td>
            <td>100</td>
            <td></td>
            <td id="science"><?php echo $res['sci']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['sci']; ?></td>
          </tr>
          <tr>
            <td>SOCIAL SCIENCE</td>
            <td>100</td>
            <td></td>
            <td id="sscience"><?php echo $res['sosci']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['sosci']; ?></td>
          </tr>
          <tr>
            <td>SANSKRIT</td>
            <td>100</td>
            <td></td>
            <td id="sanskrit"><?php echo $res['sans']; ?></td>
            <td></td>
            <td></td>
            <td><?php echo $res['sans']; ?></td>
          </tr>
          </table><br>
      <table style="width:100%">
        <tr class="head3">
            <th colspan="4">FINAL RESULTS</th>
          </tr>
          <tr>
          <th colspan="">RESULT</th>
            <th colspan="">DIVISION</th>
            <th colspan="">PERCENTAGE</th>
            <th colspan="">TOTAL MARKS</th>
        </tr>
        <tr>
            <td id="result"></td>
            <td id="division"></td>
            <td id="percent"></td>
            <td id="total"></td>
          </tr>
          </table><br>
    </div>
    <?php
      }
    }  
          ?>
          <script>
          let hindi = parseInt(document.getElementById('hindi').innerHTML);
          let english = parseInt(document.getElementById('english').innerHTML);
          let math = parseInt(document.getElementById('math').innerHTML);
          let science = parseInt(document.getElementById('science').innerHTML);
          let sscience = parseInt(document.getElementById('science').innerHTML);
          let sanskrit = parseInt(document.getElementById('sanskrit').innerHTML);
          let total = hindi+english+math+science+sscience+sanskrit;
          
         document.getElementById('total').innerHTML = total;
         let percent = parseFloat(total/6);
         percent = Math.round(percent);
         document.getElementById('percent').innerHTML= percent+"%";
         if(percent>=60){
          document.getElementById('division').innerHTML= "First";
         }else if (percent>=45){
          document.getElementById('division').innerHTML= "Second";
         }else if (percent>=33){
          document.getElementById('division').innerHTML= "Third";
         }else {
          document.getElementById('division').innerHTML= "Poor";
         }
         if(percent>=33){
          document.getElementById('result').innerHTML= "<span style='color:green'>Passed</span>";
         }else {
          document.getElementById('result').innerHTML= "<span style='color:red'>Failed</span>";
         }
        </script>
        <?php
        ?>
</body>
</html>