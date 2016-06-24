<?php

    include 'dbconnect.php';

    session_start();

         
 $sql1="select uid from farmer where uname='".$_SESSION['uname']."'";
        $res=mysqli_query($conn,$sql1);
        $db_field=mysqli_fetch_assoc($res);
        $uid=$db_field['uid'];


        if(isset($_POST['submit']))
        {
            
            $prod_nm=mysqli_real_escape_string($conn,$_POST['Producename']);
             $quality=mysqli_real_escape_string($conn,$_POST['Quality']);
            $quantity=mysqli_real_escape_string($conn,$_POST['Quantity']);
            $epx=mysqli_real_escape_string($conn,$_POST['ep']);

             $resm=$epx+($epx*10/100);

 $sql1="INSERT into sales (uid,prod_name,quality,quantity,market_price,expected_price,status) 
values($uid,'$prod_nm','$quality','$quantity','$resm','$epx','pending')";

   
            
            if(mysqli_query($conn,$sql1))
           {
              
                echo "New record inserted successfully";
                header('location:afterlogin1.php');
                //echo $b;
           }
            else
            {
                echo "in else";
            }

           }

?> 


