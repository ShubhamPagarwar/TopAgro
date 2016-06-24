<?php

            include 'dbconnect.php';
            
            session_start();
                    $sql4="select uid from farmer where uname='".$_SESSION['uname']."'";
                    $fetres=mysqli_query($conn,$sql4);
                    $db_field=mysqli_fetch_assoc($fetres);
                    $uid=$db_field['uid'];

                 $SQL3= "select prod_name,quality,quantity,expected_price,status from sales where uid='$uid' ";
                 $ava=mysqli_query($conn,$SQL3);
                 $sql4="SELECT COUNT(*) as c FROM  (select prod_name,quality,quantity,expected_price,status from sales where uid='$uid')temp";
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
                   <nav class="navbar navbar-inverse navbar-fixed-top" style="height:65px">
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
                            ?>
                         </div>  
                      </li>
                      <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <li class="active"><a href="afterlogin1.php">Home</a></li>
                     <li><a href="salehtml.php">Sales</a></li>
                    <li><a href="mysales.php">My Sales</a></li>
                     <li><a href="logout.php">logout</a></li>
                        &nbsp;&nbsp;&nbsp;
                </ul>

            </nav>
            <br>
            <div class="page-header text-center">
                <img src="images/img2.png" alt="TopAgro" class="img-rounded" height="100" width="130" style="float:left">
                <h1 style="color:purple; font-size:4em;">
                TopAgro&nbsp;<small style="color:black"><i>Improving farmers Income</i></small></h1>
            </div>


            <table class="table table-hover table-bordered" style="border:4px ridge">
                <tr>
                          <th class="info"> Produce Name </th> 
                          <th class="info"> Quality </th> 
                          <th class="info"> Quantity Available </th> 
                          <th class="info"> Expected Price (Per Kg)</th> 
                          <th class="info"> Status</th> 
                </tr> 
                        
                    <?php
                       
                       if($count>0){
                     while ($db_field3 = mysqli_fetch_assoc($ava))
                            {
                               
                                echo "<tr>";
                                echo "<td>".$db_field3['prod_name']."</td>";
                                echo "<td>".$db_field3['quality']."</td>";
                                echo "<td>".$db_field3['quantity']."</td>";
                                echo "<td>".$db_field3['expected_price']."</td>";
                                echo "<td>".$db_field3['status']."</td>";
                            }}
                            else
                              echo "<td>Not Available</td>";
                         
                    ?>

            </table>

          </body>
         </html>   