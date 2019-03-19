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
 if(isset($_SESSION['a_id'])){

 
  $fsql="SELECT * FROM admin WHERE a_id=". $_SESSION['a_id'].";";
  $result = mysqli_query($conn,$fsql); 
  if(mysqli_num_rows($result) >=1){
    echo '<div class="container">
    <br><div class="col-lg-12">
    
<div class="col-lg-6"><h2>Mark Attendance</h2>

 
<form action="attendance.php" method="POST">
    <h4 class="title">Attendance Portal</h4>
    
    <div class="body">
    <p>ISTE-ID</p>
    <input type="text" class="form-control " name="iste" placeholder="ISTE-ID" required>
    
    <p>Event Name</p>
    <input type="text" name="ename" class="form-control" placeholder="Event-Name" required>
    
    </div>
    <div class="modal-footer">
    <button type="submit" name="att" class="btn btn-success" >Submit</button>
    </div>
</form>    
</div>



<br><br><br>
    <div class="col-lg-6">
    <h2>Insert Student data';
    echo ' </h2>
    <br>
    
    <form action="insert.php" method="POST">

    <table class="table table-bordered table-striped ">
<thead class=" table-dark">
<tr>';
    echo '
    <th>Attribute </th> 
    
    <th>field </th>
  </tr></thead>';
  echo '<tbody>' ;
        echo '<tr>' ;
         echo '
         <td>
         Name
         </td>
         <td>
         <div class="col-12">
                    <input type="text" name="sname" placeholder="Name" required>
                </div> 
              </td>
              </tr>
              
              <tr>
              <td>
              Iste-ID</td>
              <td>  <div class="col-12">
                <input type="text" name="iste" placeholder="Iste_id" required>
            </div> </td>  </tr>
            <tr>
              <td>
              Roll no</td>
              <td>  <div class="col-12">
                <input type="text" name="roll" placeholder="Roll_no" required>
            </div> </td>  </tr>
             </tbody>
             </thead>
             </table>
             <div class="col-12">
            <input type="submit" name="name" placeholder="student" required>
        </div> 
             </form>
</div>

</div>
</div>
         ';
  }
  }
if(isset($_POST['admin'])){
    
    $name=mysqli_real_escape_string($conn,$_POST['nameallowed']);
    $passw=mysqli_real_escape_string($conn,$_POST['pass']);
    $asql="SELECT * FROM admin WHERE `name`= '$name' AND `pass` = '$passw';";
   //echo $asql;
    $check = mysqli_query($conn,$asql);
    if(mysqli_num_rows($check) <1)
      {
        echo '<script>
        alert("wrong username or password");
        window.location.href = "http://'.$_SERVER[HTTP_HOST].'/iste_web/admin.html";
        </script>
        ';
      }
        
    else{
    //echo "sdn";
    echo "signed";
    
    $row=mysqli_fetch_assoc($check);
    $_SESSION['a_id']=$row['a_id'];
     
    header('location: welcome.php');
    }
}
?>
</body></html>