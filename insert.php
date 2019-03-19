<?php
session_start();
if(isset($_SESSION['a_id'])){

        include 'config.php';
       
        $fsql="SELECT * FROM admin WHERE a_id=". $_SESSION['a_id'].";";
        $result = mysqli_query($conn,$fsql); 
        echo $_SESSION['a_id'];
        if(mysqli_num_rows($result) >=1){
            if(isset($_POST['name'])){
                $name=mysqli_real_escape_string($conn,$_POST['sname']);
                $iste=mysqli_real_escape_string($conn,$_POST['iste']);
                $roll=mysqli_real_escape_string($conn,$_POST['roll']);
                $isql="INSERT INTO `student` (`s_id`, `name`, `iste_id`,`Roll`) VALUES (NULL,'$name' ,'$iste','$roll' );";
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