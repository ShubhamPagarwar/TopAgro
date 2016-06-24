<?php

    include 'dbconnect.php';

        if(isset($_POST['submit']))
        {
            $finame=mysqli_real_escape_string($conn,$_POST['fname']);
            $liname=mysqli_real_escape_string($conn,$_POST['lname']);
            $gender=mysqli_real_escape_string($conn,$_POST['gen']);
            $mobno=mysqli_real_escape_string($conn,$_POST['mob']);
            $rolep=mysqli_real_escape_string($conn,$_POST['role']);
            $addr=mysqli_real_escape_string($conn,$_POST['address']);
            $un=mysqli_real_escape_string($conn,$_POST['uname']);
            $pas=mysqli_real_escape_string($conn,$_POST['pass']);
            $pass=mysqli_real_escape_string($conn,$_POST['retype']);
           
          if($rolep=="farmer")
          {
             $sql="INSERT into farmer (fname,lname,gender,mob,role,address,uname,pass,retype)values('$finame','$liname','$gender','$mobno','$rolep','$addr','$un','$pas','$pass')";

          }
           
            if($rolep=="vendor")
            {
             $sql="INSERT into vendor(fname,lname,gender,mob,role,address,uname,pass,retype)values('$finame','$liname','$gender','$mobno','$rolep','$addr','$un','$pas','$pass')";

            }
             
            
            if (mysqli_query($conn, $sql)) 
           {
                header('location:index.html');
            echo "New record created successfully";
           }
            else
            {
                 header('location:index.html');
                echo "YOU ARE ALREADY REGISTERED";
            }
        } 
        else
        {
                echo"notttt";
        }

?> 
