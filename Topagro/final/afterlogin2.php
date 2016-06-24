
<?php
session_start();
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
        <?php
        include'dbconnect.php';
        
        $sql1="select uid from farmer where uname='".$_SESSION['uname']."'";
        $res=mysqli_query($conn,$sql1);
        $db_field=mysqli_fetch_assoc($res);
        $uid=$db_field['uid'];
        echo $uid;
        
        $sql2="select vid from vendor where uname='".$_SESSION['uname']."'";
        $res2=mysqli_query($conn,$sql2);
        $db_field1=mysqli_fetch_assoc($res2);
        $vid=$db_field1['vid'];
        echo $vid;
        ?>

        <div class="container-fluid">
            <br>
                   <nav class="navbar navbar-inverse navbar-fixed-top"style="height:70px">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <span class="glyphicon glyphicon-home" style="font-size:35px">
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
      
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                    <p style="font-size: 20px;"><br><span class="glyphicon glyphicon-leaf" style="font-size: 40px;"></span>The Produce You Can Sell Us ~</p>    <br>   
                    <a href="#grain" class="btn btn-info" style="width:100%">Grains</a><br><br>
                    <a href="#veg" class="btn btn-info" style="width:100%">Vegetables</a><br><br>
                    

                </div>

                <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10   ">
                      <img src="images/4.jpg" alt="Image" height="500" width="1100">   
                </div> 
            </div>
            <a id="grain"></a>
               <div class="jumbotron" id="grain">
                        <h1>Grains</h1>
                        <p>Your Expectation, Our Responsibility !!!</p>
                </div>
            
        <div>
                <div style="width:1000px; margin:190px; background-color:white; margin-top:50px">
                    <div class="row">
                        <div class="col-sm-2 col-md-3">
                            <div class="thumbnail">
                             <img src="images/Grains/wheat.jpg" class="img-thumbnail" alt="Image"> 
                              <div class="caption">
                                <h3>Wheat</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Wheat" class="btn btn-primary" role="button" name="Wheat">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-1 col-md-3">
                            <div class="thumbnail">
                               <img src="images/Grains/bajra.jpg" class="img-thumbnail" alt="Image">
                              <div class="caption">
                                <h3>Bajara</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Bajara" class="btn btn-primary" role="button" >Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                        
                        <div class="col-sm-1 col-md-3">
                        <div class="thumbnail">
                          <img src="images/Grains/rice.jpg" class="img-thumbnail" alt="Image">
                          <div class="caption">
                            <h3>Rice</h3>
                            <p><a href="availableproduce_for_vendor.php?prod=Rice" class="btn btn-primary" role="button">Check Availability</a> 
                          </div>
                        </div>
                        </div> 
                        
                </div>
                    
                <div class="row">       
                        <div class="col-sm-1 col-md-3">
                            <div class="thumbnail">
                               <img src="images/Grains/makka.jpg" class="img-thumbnail" alt="Image">
                              <div class="caption">
                                <h3>Makka</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Makka" class="btn btn-primary" role="button">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-1 col-md-3">
                            <div class="thumbnail">
                               <img src="images/Grains/jawar.jpg" class="img-thumbnail" alt="Image">
                              <div class="caption">
                                <h3>Jawar</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Jawar" class="btn btn-primary" role="button">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                    <div class="col-sm-1 col-md-3">
                        <div class="thumbnail">
                          <img src="images/Grains/matar.jpg" class="img-thumbnail" alt="Image">
                          <div class="caption">
                            <h3>Matar</h3>
                            <p><a href="availableproduce_for_vendor.php?prod=Matar" class="btn btn-primary" role="button">Check Availability</a> 
                          </div>
                        </div>
                     </div>

                  </div> 
                </div>
                
        </div>

    <div class="jumbotron" id="veg">
                        <h1>Vegetables</h1>
                        <p>Your Expectation, Our Responsibility !!!</p>
                </div>
            
        <div>
                <div style="width:1000px; margin:190px; background-color:white; margin-top:50px">
                    <div class="row">
                        <div class="col-sm-2 col-md-3">
                            <div class="thumbnail">
                             <img src="images/vegetables/onion.jpg" class="img-thumbnail" alt="Image"> 
                              <div class="caption">
                                <h3>Onion</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Onion" class="btn btn-primary" role="button">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-1 col-md-3">
                            <div class="thumbnail">
                               <img src="images/vegetables/chilly.jpg" class="img-thumbnail" alt="Image">
                              <div class="caption">
                                <h3>Chilly</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Chilly" class="btn btn-primary" role="button">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                        
                        <div class="col-sm-1 col-md-3">
                        <div class="thumbnail">
                          <img src="images/vegetables/Brinjal.jpg" class="img-thumbnail" alt="Image">
                          <div class="caption">
                            <h3>Brinjal</h3>
                            <p><a href="availableproduce_for_vendor.php?prod=Brinjal" class="btn btn-primary" role="button">Check Availability</a> 
                          </div>
                        </div>
                        </div> 
                        
                        <div class="col-sm-1 col-md-3">
                        <div class="thumbnail">
                          <img src="images/vegetables/carrot.jpg" class="img-thumbnail" alt="Image">
                          <div class="caption">
                            <h3>Carrot</h3>
                            <p><a href="availableproduce_for_vendor.php?prod=Carrot" class="btn btn-primary" role="button">Check Availability</a> 
                          </div>
                        </div>
                        </div> 
                        
                </div>
                    
                <div class="row">       
                        <div class="col-sm-1 col-md-3">
                            <div class="thumbnail">
                               <img src="images/vegetables/ladifingur.jpg" class="img-thumbnail" alt="Image">
                              <div class="caption">
                                <h3>Lady Finger</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Lady Finger" class="btn btn-primary" role="button">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                        <div class="col-sm-1 col-md-3">
                            <div class="thumbnail">
                               <img src="images/vegetables/potato.jpg" class="img-thumbnail" alt="Image">
                              <div class="caption">
                                <h3>Potato</h3>
                                <p><a href="availableproduce_for_vendor.php?prod=Potato" class="btn btn-primary" role="button">Check Availability</a> 
                              </div>
                            </div>
                        </div>
                    
                    <div class="col-sm-1 col-md-3">
                        <div class="thumbnail">
                          <img src="images/vegetables/tomato.jpg" class="img-thumbnail" alt="Image">
                          <div class="caption">
                            <h3>Tomato</h3>
                            <p><a href="availableproduce_for_vendor.php?prod=Tomato" class="btn btn-primary" role="button">Check Availability</a> 
                          </div>
                        </div>
                     </div>

                    <div class="col-sm-1 col-md-3">
                        <div class="thumbnail">
                          <img src="images/vegetables/whitecarrot.jpg" class="img-thumbnail" alt="Image">
                          <div class="caption">
                            <h3>White Carrot</h3>
                            <p><a href="availableproduce_for_vendor.php?prod=White Carrot" class="btn btn-primary" role="button">Check Availability</a> 
                          </div>
                        </div>
                     </div>

                  </div> 
                </div>
                
        </div>
        </div>
        <footer class="text-center footer">TopAgro <i>improvin Farmers Income</i> &copy; 2016, All rights reserved</footer>
    </body>  
    
</html>