<?php

    include 'dbconnect.php';

    session_start();

                 $Q=$_POST['Quantity']; 
                $PN=$_POST['Prodname']; 
                $QU=$_POST['Quality']; 


                $fq="select quantity from available where Produce_name='$PN' and Quality='$QU' ";
                 $fetch=mysqli_query($conn,$fq);

               $db_field123=mysqli_fetch_assoc($fetch);
                $a=$db_field123['quantity'];
                
                if ($a>=$Q) 
                {
                    $sss="select ('$Q' * Market_price) as price from available where Produce_name='$PN' and Quality='$QU'";
                   
                     $totprice=mysqli_query($conn,$sss);

                     $db_field8=mysqli_fetch_assoc($totprice);
                     $b=$db_field8['price'];

                   
                               echo "<script type='text/javascript'>alert('Total Price is $b')
                                window.history.back();
                                </script>";
        
                       $sql7="select vid from vendor where uname='".$_SESSION['uname']."'";
                    $fetres=mysqli_query($conn,$sql7);
                    $db_field7=mysqli_fetch_assoc($fetres);
                    $vid=$db_field7['vid'];
                    

        if(isset($_POST['ord']))
        {
            
            $pnm=mysqli_real_escape_string($conn,$_POST['Prodname']);
            $qun=mysqli_real_escape_string($conn,$_POST['Quantity']);
            $QU=mysqli_real_escape_string($conn,$_POST['Quality']); 
            //$price1=mysqli_real_escape_string($conn,$_POST['price']);


                     $sqlo="INSERT into orders (vid,produce_name,quality,quantity,total_price,date,status) 
                     values($vid,'$pnm','$QU','$qun','$b',sysdate(),'pending')";
            
            if(mysqli_query($conn,$sqlo))
           {
              
                //header('location:order.php');
                //echo "New record inserted successfully";
           }
            else
            {
                echo "in else";
            }
         }    
                     

                }
                else
                {
                   echo "<script type='text/javascript'>alert('Quantity Not Available!')
                    window.history.back();
                   </script>";
                  //  header('location:Availability.php');
                }
         
                


?> 




