
<?php

            include 'dbconnect.php';
            
            session_start();
                    $sql4="select vid from vendor where uname='".$_SESSION['uname']."'";
                    $fetres=mysqli_query($conn,$sql4);
                    $db_field=mysqli_fetch_assoc($fetres);
                    $vid=$db_field['vid'];

                 $SQL3= "select produce_name,quality,quantity,total_price,date,status from orders where vid='$vid' ";
                 $ava=mysqli_query($conn,$SQL3);

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
                      <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <li class="active"><a href="afterlogin2.php">Home</a></li>
                     <li><a href="Availability.php">Availability</a></li>
                    
                    <li><a href="myorder.php">My Orders</a></li>
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

                          <th class="info"> Quantity</th> 
                          <th class="info"> Total Charge </th> 
                          <th class="info"> Date</th> 
                          <th class="info"> Status</th> 

                </tr> 
                        
                    <?php


                     while ($db_field3 = mysqli_fetch_assoc($ava))
                            {
                               
                                echo "<tr>";
                                echo "<td>".$db_field3['produce_name']."</td>";
                                 echo "<td>".$db_field3['quality']."</td>";
                          
                                echo "<td>".$db_field3['quantity']."</td>";
                                echo "<td>".$db_field3['total_price']."</td>";
                               echo "<td>".$db_field3['date']."</td>";
                               echo "<td>".$db_field3['status']."</td>";

                                echo "</tr>";
                            }

                       
                    ?>

            </table>

          </body>
         </html>   
