<?php

            include 'dbconnect.php';
            
            session_start();
                    $sql4="select vid from vendor where uname='".$_SESSION['uname']."'";
                    $fetres=mysqli_query($conn,$sql4);
                    $db_field=mysqli_fetch_assoc($fetres);
                    $vid=$db_field['vid'];

                 $SQL3= "select vid,fname,lname,gender,mob,address,uname from vendor";
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
                          <th class="info"> Vendor Id </th> 
                          <th class="info"> Name </th> 
                          <th class="info"> Gender </th> 
                          <th class="info"> Mobile No.</th> 
                          <th class="info"> Address</th> 
               			      <th class="info"> User Name</th> 
                          <th class="info"> Operation</th> 

                </tr> 
                        
                    <?php


                     while ($db_field3 = mysqli_fetch_assoc($ava))
                            {
                               
                                echo "<tr>";
                                echo "<td>".$db_field3['vid']."</td>";
                                echo "<td>".$db_field3['fname']." ".$db_field3['lname']."</td>";
                                if($db_field3['gender']=='option1')
                                echo "<td>Male</td>";
                                else
                                echo "<td>Female</td>";
                                echo "<td>".$db_field3['mob']."</td>";
                                echo "<td>".$db_field3['address']."</td>";
                                echo "<td>".$db_field3['uname']."</td>";
                                echo "<td><a href='operation.php?id=".$db_field3['vid']."&role=vendor&opt=delete'>delete</a> <a href='operation.php?id=".$db_field3['vid']."&role=vendor&opt=update'>update</a> </td>";
                               
                                echo "</tr>";
                            }

                       
                    ?>

            </table>

          </body>
         </html>   