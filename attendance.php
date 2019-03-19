<?php
session_start();
if(isset($_SESSION['a_id'])){

        include 'config.php';
       
        $fsql="SELECT * FROM admin WHERE a_id=". $_SESSION['a_id'].";";
        $result = mysqli_query($conn,$fsql); 
        echo $_SESSION['a_id'];
        if(mysqli_num_rows($result) >=1){
            if(isset($_POST['att'])){
                $name=mysqli_real_escape_string($conn,$_POST['ename']);
                $iste=mysqli_real_escape_string($conn,$_POST['iste']);
                $isql="INSERT INTO `attendance` ( `name`, `iste_id`) VALUES ('$name' ,'$iste' );";
                if (mysqli_query($conn, $isql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $isql . "<br>" . mysqli_error($conn);
                }
                header('location: welcome.php');
            }
        }
        header('location: welcome.php');
    }
    ?>