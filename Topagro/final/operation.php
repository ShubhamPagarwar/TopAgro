<?php

 include 'dbconnect.php';
  
 	$id=$_GET['id'];         
 $role=$_GET['role'];
 $opt=$_GET['opt'];
 if($role=='farmer'){
		 if($opt=='delete'){
         $query="delete from farmer where uid=$id";
 		 mysqli_query($conn,$query);
 		 $query="delete from sales where uid=$id";
 		 mysqli_query($conn,$query);
 		 header('location: Farmers.php');
 		}
 		elseif($opt=='update'){
             header('location: update.php?id='.$id.'&role=farmer');
          
             
   	}
 		elseif($opt=='accept'){
 			$sid=$_GET['saleid'];
 			
 			$query="update sales set status='accepted' where uid=$id and sid=$sid";
 		    mysqli_query($conn,$query);
 		    $SQL3= "select prod_name,quality,quantity,expected_price,status from sales where uid='$id' and sid=$sid";
             $ava = mysqli_query($conn,$SQL3);
             while($db=mysqli_fetch_assoc($ava)){
             $prod_nm=$db['prod_name'];
             $quality=$db['quality'];
             $quantity=$db['quantity'];
             $epx=$db['expected_price'];      
             $resm=$epx+($epx*10/100);}
 		        $query="insert into available (Produce_name,Quality,Quantity,Market_price) values('$prod_nm','$quality','$quantity','$resm')";
             
            if(mysqli_query($conn,$query))
           { 
              
                 echo "New record inserted successfully";
           }
           else
           {
                 $updateavail="update available set Quantity=(Quantity+'$quantity') where Produce_name='$prod_nm' and Quality='$quality'";
                 if(mysqli_query($conn,$updateavail))
              {
                echo "in if";
                echo "New record created successfully";
              }
               $max_price="update available set Market_price=(select max(market_price) from sales group by prod_name,quality having prod_name='$prod_nm' and quality='$quality') where Produce_name='$prod_nm' and Quality='$quality' ";
                if(mysqli_query($conn,$max_price))
              {
                echo "in if";
                echo "New record created successfully";
              }
           }
         
             header('location:salerequest.php');

            }
 		elseif($opt=='decline'){
 			$sid=$_GET['saleid'];
 			$query="update sales set status='rejected' where uid=$id and sid=$sid";
 		    mysqli_query($conn,$query);
 		    header('location:salerequest.php');

 		}

 		}
 		elseif($role=='vendor')
 		{
 			if($opt=='delete')
 			{
 				$query="delete from vendor where vid=$id";
				 mysqli_query($conn,$query);
 				$query="delete from orders where vid=$id";
 				mysqli_query($conn,$query);
 			    header('location: vendor.php');
 			}
      elseif($opt=='accept'){
              $oid=$_GET['orderid'];

                $query="update orders set status='deliverd' where vid=$id and ordid=$oid";
        mysqli_query($conn,$query);
        $SQL3= "select produce_name,quality,quantity,total_price,date from orders where vid='$id' and ordid=$oid";
            // $ava=mysqli_query($conn,$SQL3);
             $ava = mysqli_query($conn,$SQL3);
             while($db=mysqli_fetch_assoc($ava)){
               $PN=$db['produce_name'];
               $QU=$db['quality'];
               $Q=$db['quantity'];
               $tot=$db['total_price'];
               $dt=$db['date'];}   

              $fq="select quantity from available where Produce_name='$PN' and Quality='$QU' ";
                 $fetch=mysqli_query($conn,$fq);

               $db_field123=mysqli_fetch_assoc($fetch);
                $a=$db_field123['quantity'];
                
                if ($a>$Q) 
                {
                    $sss="select ('$Q' * Market_price) as price from available where Produce_name='$PN' and Quality='$QU'";
                   
                     $totprice=mysqli_query($conn,$sss);

                     $db_field8=mysqli_fetch_assoc($totprice);
                     $b=$db_field8['price'];

                    $reduce="update available set Quantity=(Quantity-'$Q') where Produce_name='$PN' and Quality='$QU'";
                    mysqli_query($conn,$reduce);
                }    
                header('location:orderrequest.php');
                     


      }elseif($opt=='decline'){
           $oid=$_GET['orderid'];
          $query="update orders set status='cancelled' where vid=$id and ordid=$oid";
        mysqli_query($conn,$query);
        header('location:orderrequest.php');

      }
     elseif($opt=='update'){
             header('location: update.php?id='.$id.'&role=vendor');
          
             
    }

 		}
?>
