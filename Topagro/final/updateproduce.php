<?php

            include 'dbconnect.php';
            
            session_start();
                  
                  $prodval=$_GET['prod'];                                                         
                 $SQL3= "select * from available where Produce_name='".$prodval."'";
                 $ava=mysqli_query($conn,$SQL3);

                  $sql4="SELECT COUNT(*) as c FROM  (select * from available where Produce_name='".$prodval."')temp";
                   $query = mysqli_query($conn, $sql4);
                    $var=mysqli_fetch_assoc($query);
                    $count=$var['c'];
          ?>
              
<!Doctype html>

<html>
    <head>
        <title>TopAgro</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery-2.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body> 
        
        <div class="container-fluid">
            <br>
                   <nav class="navbar navbar-inverse navbar-fixed-top ">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <span class="glyphicon glyphicon-home" style="font-size:40px">
                        </span><b style="color:white">TopAgro</b></a>
                        &nbsp;&nbsp; 
                </div>
                <ul class="nav navbar-nav navbar-right">
                    
                     <li class="active"> 
                        <div style="color:yellow; font-size:30px; col"> 
                              <?php
                                $res=$_SESSION['uname'];
                                echo $res;
                               // echo $uid;
                               // echo $vid;
                            ?>
                         </div>  
                      </li>
                     <li class="active"><a href="afterlogin3.php">Home</a></li>
                     <li><a href="Farmers.php">Farmers</a></li>
                      <li><a href="vendor.php">Vendors</a></li>
                    <li><a href="salerequest.php">Sales Request</a></li>
                    <li><a href="orderrequest.php">Order Request</a></li>
                     <li><a href="logout.php">logout</a></li>
                        &nbsp;&nbsp;&nbsp;
                </ul>

            </nav>
            <br>
            <div class="page-header text-center">
                <img src="images/img2.png" alt="TopAgro" class="img-rounded" height="100"   width="130" style="float:left">
                <h1 style="color:purple; font-size:4em;">
                TopAgro&nbsp;<small style="color:black"><i>Improving farmers Income</i></small></h1>
            </div>


            <table class="table table-hover table-bordered" style="border:4px ridge">
                <tr>
                          <th class="info"> Produce Name </th> 
                          <th class="info"> Quality </th> 
                          <th class="info"> Quantity Available </th> 
                          <th class="info"> Market Price (Per Kg)</th> 
                </tr> 
                        
                    <?php

                         if($count>0){

                     while ($db_field3 = mysqli_fetch_assoc($ava))
                            {
                               
                                echo "<tr>";
                                echo "<td>".$db_field3['Produce_name']."</td>";
                                echo "<td>".$db_field3['Quality']."</td>";
                                echo "<td>".$db_field3['Quantity']."</td>";
                               echo "<td>".$db_field3['Market_price']."</td>";
                                echo "</tr>";
                            }}
                            else
                            	echo "<script type='text/javascript'>alert('Sorry ".$prodval." not available') 
                            	 window.history.back();</script>";

                       
                    ?>

            </table>

            </form>

    </div>
    </body>
</html>