<?php

 include 'dbconnect.php';
  
 	$id=$_GET['id'];  
    $role=$_GET['role'];
            $fname=mysqli_real_escape_string($conn,$_POST['fname']);
            $lname=mysqli_real_escape_string($conn,$_POST['lname']);
            $mobno=mysqli_real_escape_string($conn,$_POST['mob']);
            $addr=mysqli_real_escape_string($conn,$_POST['address']);
            $un=mysqli_real_escape_string($conn,$_POST['uname']);
            
       if($role=="farmer")
       {
       	  $query="update farmer set fname='".$fname."',lname='".$lname."', mob=".$mobno.", address='".$addr."',uname='".$un."' where uid=".$id." ";
          mysqli_query($conn,$query);
           echo "<script type='text/javascript'>
                               alert('Info Updated Successfully...!!!')
                                window.location.assign('Farmers.php')
                                </script>"; 
        
       }     
       if($role=="vendor")
       {
       	  $query="update vendor set fname='".$fname."',lname='".$lname."', mob=".$mobno.", address='".$addr."',uname='".$un."' where vid=".$id." ";
          mysqli_query($conn,$query);
           echo "<script type='text/javascript'>
                               alert('Info Updated Successfully...!!!')
                                window.location.assign('vendor.php')
                                </script>";
        
       }     