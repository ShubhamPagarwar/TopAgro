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
                      <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <li class="active"><a href="afterlogin2.php">Home</a></li>
                     <li><a href="#">Availability</a></li>
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

           <button type="button" class="btn btn-info" data-target="#order" data-toggle="collapse" >
           Place Order Now</button>
            <?php
            
                    $sql4="select vid from vendor where uname='".$_SESSION['uname']."'";
                    $fetres=mysqli_query($conn,$sql4);
                    $db_field=mysqli_fetch_assoc($fetres);
                    $vid=$db_field['vid'];

                 $SQL6= "select fname,lname,mob,address from vendor where vid='$vid'";
                 $ven=mysqli_query($conn,$SQL6);
                 $db_field6=mysqli_fetch_assoc($ven);


            ?>
             
                <form class="collapse"  method="post" action="order.php" name="orderform" id="order" >
                <div class="row">

                    <div class="col-xs-12 col-smx-6 col-sm-offset-3 col-md-6 col-md-offset-3" style="background-color:#eee;margin-bottom:70px" >
                        <div class="page-header">
                            <h1 class="text-center" style="color:blue">Place Orders</h1>
                        </div>
                        
                        <div class="form-group">
                            <label>Name:</label>
                            <?php echo"".$db_field6['fname']."      ".$db_field6['lname'];?>
                        </div>

                        <div class="form-group">
                            <label>Mobile Number:</label>
                           <?php echo"".$db_field6['mob'];?>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <?php echo"".$db_field6['address'];?>
                        </div>


                        <div class="form-group col-sm-4 col-md-2 input-group">
                            <label>Produce:</label>
                              <select class="form-control" style="width:200px;" name="Prodname">
                                    <option value="<?php echo $prodval ?>"><?php echo $prodval ?> </option>
                                  
                                </select>
                        </div>
                  

                        <div class="form-group">
                            <label>Quantity:</label>
                             <div class="col-sm-4 col-md-2 input-group">
                            <input type="text" class="form-control" style="width:200px;" placeholder="Quantity" name="Quantity" required="required">
                            <span class="input-group-addon">Kg</span>
                     
                        </div>
                            <br>
                             <div class="form-group col-sm-4 col-md-2 input-group">
                            <label>Quality::</label>
                                <select class="form-control" style="width:200px;" name="Quality">
                                    <option value="Normal">Normal</option>
                                    <option value="Good">Good</option>
                                    <option value="Best">Best</option>
                                </select>
                              </div>      

                        </div>

                       


                        <div class="text-center">
                            <button type="submit1" name="ord" class="btn btn-success btn-lg"   >Order Now</button>
                             <button type="submit" name="finish" class="btn btn-success btn-lg">Finish</button>
                        </div>    
                     
            </form>

    </div>
    </body>
</html>
