<?php

    include 'dbconnect.php';

        if(isset($_POST['change']))
        {
            $finame=mysqli_real_escape_string($conn,$_POST['fname']);
            $liname=mysqli_real_escape_string($conn,$_POST['lname']);
            $mobno=mysqli_real_escape_string($conn,$_POST['mob']);
            $rolep=mysqli_real_escape_string($conn,$_POST['role']);

            
          if($rolep=="farmer")
          {
              $sql4="SELECT COUNT(*) as c FROM  (select * from farmer where fname='".$finame."' and lname='".$liname."' and mob=".$mobno.")temp";
                   $query = mysqli_query($conn, $sql4);
                    $var=mysqli_fetch_assoc($query);
                    $count=$var['c'];
                
                     
             if($count>0)
             { 
       ?>
                   <!Doctype html>
                   <html>
                   <body>
                   <form id="reg" name="regform" class="container form-horizontal" method="post" action="<?php echo "pass.php?fname=".$finame."&lname=".$liname."&mob=".$mobno."&role=farmer "; ?>" onsubmit="return validateform()" >
                   	  <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-8">
                     <input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Password" required="required">
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Retype Password</label>
                        <div class="col-sm-8">
            <input type="password" class="form-control" name="retype" id="inputPassword" placeholder="Retype Password" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                            <div class="col-md-offset-2 col-md-3">
                              <button type="submit" class="btn btn-success" name="submit">Change Password</button>
                                
                            </div>
                         
                     </form>
                     <script>
    
            
            function validateform()
            {
                var password=document.regform.pass.value; 
                 var firstpassword=document.regform.pass.value;  
                  var secondpassword=document.regform.retype.value;   
                  
               if(password.length<6){  
                    alert("Password must be at least 6 characters long.");  
                    return false;  
                } 
              else if(firstpassword==secondpassword){  
                       return true;  
                  }  
                  else{  
                      alert("password must be same!");  
                      return false;  
                    }  
             }  
            
        </script>
    
                    </body>
                    </html> 
                   <?php
             }
             else
             {
             	 echo "<script type='text/javascript'>
                               alert('Something Wrong ....try again!!!')
                                window.history.back();
                                </script>";
    
             }
          }
           
            if($rolep=="vendor")
            {
                $sql4="SELECT COUNT(*) as c FROM  (select * from vendor where fname='".$finame."' and lname='".$liname."' and mob=".$mobno.")temp";
                   $query = mysqli_query($conn, $sql4);
                    $var=mysqli_fetch_assoc($query);
                    $count=$var['c'];
                
                     
             if($count>0)
             { 
       ?>
                   <!Doctype html>
                   <html>
                   <body>
                   <form id="reg" name="regform" class="container form-horizontal" method="post" action="<?php echo "pass.php?fname=".$finame."&lname=".$liname."&mob=".$mobno."&role=vendor "; ?>" onsubmit="return validateform()" >
                   	  <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-8">
                     <input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Password" required="required">
                        </div>
                      </div>
                    
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Retype Password</label>
                        <div class="col-sm-8">
            <input type="password" class="form-control" name="retype" id="inputPassword" placeholder="Retype Password" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                            <div class="col-md-offset-2 col-md-3">
                              <button type="submit" class="btn btn-success" name="submit">Change Password</button>
                                
                            </div>
                         
                     </form>
                     <script>
    
            
            function validateform()
            {
                var password=document.regform.pass.value; 
                 var firstpassword=document.regform.pass.value;  
                  var secondpassword=document.regform.retype.value;   
                  
               if(password.length<6){  
                    alert("Password must be at least 6 characters long.");  
                    return false;  
                } 
              else if(firstpassword==secondpassword){  
                       return true;  
                  }  
                  else{  
                      alert("password must be same!");  
                      return false;  
                    }  
             }  
            
        </script>
    
                    </body>
                    </html> 
                   <?php
             }
             else
             {
             	 echo "<script type='text/javascript'>
                               alert('Something Wrong ....try again!!!')
                                window.history.back();
                                </script>";
    
             }
            }
             
        } 
        else
        {
                echo"notttt";
        }

?> 
