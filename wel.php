<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Access</title>
    <link rel="shortcut icon" href="images/atharva.jpg" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>

    
</head>

<body>
<?php
session_start();
 include 'config.php';
 if(isset($_POST['student'])){
    
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $iste=mysqli_real_escape_string($conn,$_POST['iste']);
    $asql="SELECT * FROM `student` WHERE `name`= '$name' AND `iste_id` = '$iste';";
  // echo $asql;
    $check = mysqli_query($conn,$asql);
    if(mysqli_num_rows($check) <1)
      {
        echo '<script>
        alert("wrong username or password");
        window.location.href = "http://'.$_SERVER[HTTP_HOST].'/iste_web/";
        </script>
        ';
      }
        
    else{
    //echo "sdn";
   // echo "signed";
    
    $row=mysqli_fetch_assoc($check);
    $_SESSION['iste_id']=$row['iste_id'];
    
    
     
    //header('location: wel.php');
    }
}
if(isset($_SESSION['iste_id'])){
   
    $fsql="SELECT * FROM `student` WHERE iste_id=". $_SESSION['iste_id'].";";
    $result = mysqli_query($conn,$fsql); 
    if(mysqli_num_rows($result) >=1){
        $esql="SELECT * FROM `attendance` WHERE iste_id=". $_SESSION['iste_id'].";";
        $tasks = mysqli_query($conn,$esql);
        echo '<div class="container">
        <br>
        <h2>Attendance
         Table</h2>
        <br>
        <div >
        <table class="table table-bordered table-striped ">
<thead class=" table-dark">
  <tr>
  <th>Sr. No. </th>
  <th>Event Name </th>
  <th>Time Stamp</th>
</tr></thead>
<tbody>';

  
  
  $i=1;
while ($row = mysqli_fetch_array($tasks)) {
   echo '<tr>' ;
    echo '<td>'.$i.'   </td>';
    echo '<td>'.$row['name'].'   </td>';
    echo '<td>'.$row['timestamp'].'   </td>';
    echo '</tr>';
   $i++;
}
echo '</tbody>' ;      
    }
    
}
?>
</body></html>