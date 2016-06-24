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
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <span class="glyphicon glyphicon-home" style="font-size:40px">
                        </span><b style="color:white">TopAgro</b></a>
                        &nbsp;&nbsp; 
                </div>
                <ul class="nav navbar-nav">
                    
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                     <li class="active"><a href="afterlogin1.php">Home</a></li>
                    <li><a href="salehtml.php">Sale</a></li>
                    <li><a href="mysales.php">My Sale's</a></li>
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
            
            <div class="page-header text-center">
                <h1 style="color:black; font-size:4em;">Sale Your Produce</h1>
            </div>

            <?php

            include 'dbconnect.php';

            session_start();
            
                    $sql1="select uid from farmer where uname='".$_SESSION['uname']."'";
                    $res=mysqli_query($conn,$sql1);
                    $db_field=mysqli_fetch_assoc($res);
                    $uid=$db_field['uid'];

                 $SQL2= "select fname,lname,mob,address from farmer where uid='$uid'";
                 $sam=mysqli_query($conn,$SQL2);
                 $db_field1=mysqli_fetch_assoc($sam);


            ?>

            <!--display the whole data of particular id-->

            
            
            <form class="container form-horizontal" action="sale.php" method="post">
                      <div class="form-group row">
                        <label for="inputname" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4 col-md-4" style="font-size:20px; color:blue">
                         <?php  echo"".$db_field1['fname']."           ".$db_field1['lname'];?>
                        </div>
                        <div class="col-sm-4 col-md-4">
                
                        </div>
                      </div>

                     <div class="form-group">
                        <label for="inputaddr" class="col-sm-2 control-label">Mob</label>
                        <div class="col-sm-8"  style="font-size:20px; color:blue">
                          <?php echo"".$db_field1['mob'];?>
                        </div>
                      </div>

                     <div class="form-group">
                        <label for="inputaddr" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8"  style="font-size:20px; color:blue">
                           <?php echo"".$db_field1['address'];?>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">Produce</label>
                          <div class="col-sm-8 col-md-4">
                              <select class="form-control" style="width:200px;" name="Producename">
                                    <option value="Wheat">Wheat</option>
                                    <option value="Rice">Rice</option>
                                    <option value="Bajara">Bajara</option>
                                    <option value="Matar">Matar</option>
                                    <option value="Makka">Makka</option>
                                    <option value="Jawar">Jawar</option>
                                    <option value="Onion">Onion</option>
                                    <option value="Tomato">Tomato</option>
            1                       <option value="Chilly">Chilly</option>
                                    <option value="Lady Finger">Lady finger</option>
                                    <option value="Carrot">Carrot</option>
                                    <option value="White Carrot">White Carrot</option>
                                    <option value="Potato">Potato</option>
                                    <option value="Brinjal">Brinjal</option>
                                </select>
                          </div>
                      </div>

                      <div class="form-group">
                         <label for="inputusername" class="col-sm-2 control-label" >Quality </label>
                          <div class="col-sm-8 col-md-4">
                              <select class="form-control" style="width:200px;" name="Quality">
                                    <option value="Normal">Normal</option>
                                    <option value="Good">Good</option>
                                    <option value="Best">Best</option>
                                </select>
                          </div>
                      </div>

                     <div class="form-group">
                        <label for="inputquantity" class="col-sm-2 control-label">Quantity </label>
                        <div class="col-sm-4 col-md-2 input-group">
                           
                            <input type="text" class="form-control" placeholder="Quantity" name="Quantity" required="required">
                            <span class="input-group-addon">Kg</span>
                     
                        </div>
                      </div>

                     <!-- <div class="form-group">
                        <label for="inputusername" class="col-sm-2 control-label">Market Price </label>
                        <div class="col-sm-4 col-md-2 input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" placeholder="Amount" name="mp" required="required">
                            <span class="input-group-addon">.00</span>
                     
                        </div>
                      </div>-->

                      <div class="form-group">
                        <label for="inputusername" class="col-sm-2 control-label">Expected Price </label>
                        <div class="col-sm-4 col-md-2 input-group">
                            <span class="input-group-addon">Rs.</span>
                            <input type="text" class="form-control" placeholder="Amount" name="ep" required="required">
                            <span class="input-group-addon">per Kg</span>
                     
                        </div>
                        
                      </div>
                            
                      <div class="form-group row">
                            <div class="col-md-offset-2 col-md-3">
                              <button type="submit" class="btn btn-success" name="submit">Submit</button>
                              
                            </div>
                          <br><br><br>
                            <div class="col-md-offset-3 col-sm-5 col-md-8">
                                <p class="bg-danger">Cash On Delivery</p>
                            </div>
                      </div>
                    </form>
        </div>
            <footer class="text-center footer">TopAgro <i>improvin Farmers Income</i> &copy; 2016, All rights reserved</footer>
    </body> </html>