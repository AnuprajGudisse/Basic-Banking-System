<?php
	session_start();
	include("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
				th, td {
                width:250px;
                text-align:center;
                padding:10px;
                border:2px;
              
            }
            table{
              border:2px solid black;
              border-radius: 5px;
            }
         	button{
  				border: 1px  black;
         		border-radius: 5px;
         		padding: 3px;
         		background-color:white;
         	}

.logo{float: left;
  position: relative;
  left: 410px;
  padding: 15px;
  width: 90px;
  height: 120px;
}
	</style>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="assests\style1.css">
	<title>Customers</title>
</head>
<body>
	<div class="head">
    <img src="img/logo.png" class="logo">
		<h1 style=" font-size: 50px; text-align:center;">
		<a href="index.php" style="color:#668cff; font-family: 'Catamaran', sans-serif;">SPARKS BANK</a>		
		</h1>
	</div>
	<div class="topnav">
		<nav style="float: right;">
  		<a href="trans_history.php" class="a1">Transactions History</a>
  		<a href="customers.php" class="a1" >Customers</a>
  		</nav>
  	</div>
  	<dir >
  		<?php
  			$selectSQL = 'SELECT * FROM customers ';
  			if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
    			echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  			}
  			else
  			{
    ?>
  		<table align="center">
  			<thead>
  				<tr style="background-color: #668cff">
  					<th>Account Number</th>
  					<th>Customer Name</th>
  					<th>Email</th>
  					<th>Gender</th>
  					<th>Balance</th>
  					<th>Details</th>
  				</tr>
  			</thead>
  			<tbody style="background-color: white;">
    		<?php
      		if( mysqli_num_rows( $selectRes )==0 ){
        		echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      		}
      		else{
        		while( $row = mysqli_fetch_assoc( $selectRes ) ){
        		?>
        		<tr>
        			<th><?php echo $row['acc_no'];?></th>
        			<th><?php echo $row['customer_name'];?></th>
        			<th><?php echo $row['email'];?></th>
        			<th><?php echo $row['gender'];?></th>
        			<th><?php echo $row['balance'];?></th>
        			<th><a href="transactions.php?id=<?php echo $row['id'] ?>">view details</a></th>
        		</tr>	
     <?php   }
      }
    ?>
  </tbody>
  		</table>
  	<?php } ?>
  	</dir>
</body>
</html>