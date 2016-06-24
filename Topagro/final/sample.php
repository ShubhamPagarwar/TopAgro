            <?php

            include 'dbconnect.php';

            session_start();
            
             $sql1="select uid from farmer where uname='".$_SESSION['uname']."'";
        $res=mysqli_query($conn,$sql1);
        $db_field=mysqli_fetch_assoc($res);
        $uid=$db_field['uid'];

     $SQL2= "select fname,lname,mob,address from farmer where uid='$uid'";

     $sam=mysqli_query($conn,$SQL2);
     if($sam)
      {
        echo"yess";
      }
      else
      {
        echo"not";
      }
     $db_field1=mysqli_fetch_assoc($sam);

     echo"".$db_field1['fname'];
     echo"".$db_field1['lname'];

     echo"".$db_field1['mob'];
     echo"".$db_field1['address'];

            ?>