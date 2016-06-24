<?php

 include 'dbconnect.php';
  
 	$fname=$_GET['fname'];  
 	$lname=$_GET['lname'];         
    $role=$_GET['role'];
    $mob=$_GET['mob'];
    $pas=mysqli_real_escape_string($conn,$_POST['pass']);
    $pass=mysqli_real_escape_string($conn,$_POST['retype']);
           
    if($role=='farmer'){
          $query="update farmer set pass='".$pas."',retype='".$pass."' where fname='".$fname."' and lname='".$lname."' and mob=".$mob." ";
          mysqli_query($conn,$query);
           echo "<script type='text/javascript'>
                               alert('Password Updated Successfully...!!!')
                                window.location.assign('index.html')
                                </script>";
        }
    if($role== 'vendor')    
     {
     	 $query="update vendor set pass='".$pas."',retype='".$pass."' where fname='".$fname."' and lname='".$lname."' and mob=".$mob." ";
          mysqli_query($conn,$query);
           echo "<script type='text/javascript'>
                               alert('Password Updated Successfully...!!!')
                                window.location.assign('index.html')
                                </script>";
        
     }

?>