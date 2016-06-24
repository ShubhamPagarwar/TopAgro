<?php

 include 'dbconnect.php';
  
 	$id=$_GET['id'];         
    $role=$_GET['role'];
    if($role=="farmer"){
       $query="select fname,lname,mob,address,uname from farmer where uid=$id";
       $exe=mysqli_query($conn,$query);
       while($db=mysqli_fetch_assoc($exe)){
              $fname=$db['fname'];
              $lname=$db['lname'];
              $mob=$db['mob'];
              $address=$db['address'];
              $uname=$db['uname'];

             }
         }
         else{
               $query="select fname,lname,mob,address,uname from vendor where vid=$id";
       $exe=mysqli_query($conn,$query);
       while($db=mysqli_fetch_assoc($exe)){
              $fname=$db['fname'];
              $lname=$db['lname'];
              $mob=$db['mob'];
              $address=$db['address'];
              $uname=$db['uname'];

             }
      
         	
         }

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
            <nav class="navbar navbar-inverse navbar-fixed-top" style="height:55px">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <span class="glyphicon glyphicon-home" style="font-size:35px">
                        </span><b style="color:white">TopAgro</b></a>
                        &nbsp;&nbsp; 
                </div>
                <ul class="nav navbar-nav navbar-right">
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
                <h1 style="color:black; font-size:4em;">Update Details</h1>
            </div>
            
    <form id="reg" name="regform" class="container form-horizontal" method="post" action="<?php echo "totalupdate.php?id=".$id."&role=".$role." " ;?>" onsubmit="return validateform()" >
                      <div class="form-group row">
                        <label for="inputname" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4 col-md-4">
            <input type="text" class="form-control" name ="fname" id="fname" placeholder="First Name" required="required" value="<?php echo $fname ?>">
                        </div>
                        <div class="col-sm-4 col-md-4">
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="required" value="<?php echo $lname ?>">
                        </div>
                      </div>
                
                                  <br>
                      <div class="form-group">
                        <label for="inputnumber" class="col-sm-2 control-label">Mobile No. </label>
                        <div class="col-sm-8">
    <input type="text" class="form-control"  name="mob" id="inputnumber" placeholder="Mobile Number" required="required" value="<?php echo $mob ?>">
                            
                        </div>
                      </div>
                    
    
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" rows="3" name="address" required="required" ><?php echo $address ?></textarea>
                        </div>
                      </div>
          
                    <div class="form-group">
                        <label for="inputusername" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-8">
            <input type="text" class="form-control" name="uname" id="inputusername" placeholder="Username" required="required" value="<?php echo $uname ?>">
                        </div>
                      </div>
                
                        
                      <div class="form-group row">
                            <div class="col-md-offset-2 col-md-3">
                              <button type="submit" class="btn btn-success" name="submit">Update</button>
                                
                            </div>
                         
                      </div>
                    </form>
        </div>
         <script>
    
            
            function validateform()
            {
                var fname=document.regform.fname.value;
                 var lname=document.regform.lname.value; 
                  var no=document.regform.mob.value;
                  
              if ((fname==null || fname=="") && (lname==null || lname==""))
                {  
                  alert("Please Enter the Name");  
                  return false;  
                }
                else if(no.length<10 || no.length>10){  
                    alert("Mobile number must be 10 digit only.!");  
                    return false;  
                } 
                
             }  
            
        </script>
       </body> 
    </html>
