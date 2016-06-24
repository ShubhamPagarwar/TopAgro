<?php
session_start();
$user = "";
$pass = "";
$msg = "";
$flag=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include 'dbconnect.php';
    
    $role=$_POST['role'];
	$user = $_POST['uname'];
	$pass = $_POST['pass'];
            
    
	$user = htmlspecialchars($user);
	$pass = htmlspecialchars($pass);
	
	$SQL = "SELECT * FROM farmer where uname='$user' and pass='$pass'";
	$count="select count(*) as cp from (SELECT * FROM farmer where uname='$user' and pass='$pass')as temp";
    $SQL1= "SELECT * FROM vendor where uname='$user' and pass='$pass'";
    $count1="select count(*) as cp from (SELECT * FROM vendor where uname='$user' and pass='$pass')as temp";
	$result = mysqli_query($conn, $SQL);
	$result1= mysqli_query($conn, $SQL1);
    $c1 = mysqli_fetch_assoc(mysqli_query($conn,$count));
    $c2 = mysqli_fetch_assoc(mysqli_query($conn,$count1));
   
    $far="farmer";
    $ven="vendor";

    if($role=='1')
    {
         if($c1['cp']>0)
         {
             			session_start();
				$_SESSION['uname'] = $user;
				$flag=1;
				header('location: afterlogin1.php');
	
         }
         else
         {
    
                            echo "<script type='text/javascript'>
                               alert('User Name or Password is incorrect....try again!!!')
                                window.history.back();
                                </script>";
         }
    }

    if($role=='2')
    {
               if($c2['cp']>0)
         {
              	session_start();
				$_SESSION['uname'] = $user;
				$flag=1;
				header('location: afterlogin2.php');
			 
         }
         else
         {
                
    
                            echo "<script type='text/javascript'>
                               alert('User Name or Password is incorrect....try again!!!')
                                window.history.back();
                                </script>";
        
         }

     

       }
         if($role=='3')
         {
          $user = $_POST['uname'];
	      $pass = $_POST['pass'];
    	  if(($user == "Admin") AND ($pass == "root"))
			{
				session_start();
				$_SESSION['uname'] = $user;
				$flag=1;
				header('location: afterlogin3.php');
			}
              else
               { 
             
    
                            echo "<script type='text/javascript'>
                               alert('User Name or Password is incorrect....try again!!!')
                                window.history.back();
                                </script>";
    
                }			

	     }
	
	}

	  mysqli_close($conn);
   

?>
