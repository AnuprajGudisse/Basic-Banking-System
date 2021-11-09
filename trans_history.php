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
              
            }
            table{
              border: 2px solid black;
            }
         	button{
  				border: 1px  black;
         		border-radius: 5px;
         		padding: 3px;
         		background-color:white;
         	}

.logo{float: left;
  position: relative;
  left: 420px;
  padding: 15px;
  width: 90px;
  height: 120px;
}
	</style>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="assests\style1.css">
	<title>Transaction History</title>
</head>
<body>
	<div class="head">
    <img src="img/logo.png" class="logo">
		<h1 style=" font-size: 50px; text-align:center;">
		<a href="index.php" style="color:#668cff;  font-family: 'Catamaran', sans-serif;">SPARKS BANK</a>		
		</h1>
	</div>
	<div class="topnav">
		<nav style="float: right;">
  		<a href="index.php" class="a1">Home</a>
  		<a href="customers.php" class="a1" >Customers</a>
  		</nav>
  	</div>
  	<dir >
  		<?php
  			$selectSQL = 'SELECT * FROM transactions ';
  			if( !( $selectRes = mysqli_query( $con,$selectSQL ) ) ){
    			echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  			}
  			else
  			{
    ?>
  		<table align="center">
  			<thead>
  				<tr style="background-color: #668cff">
  					<th>Sender Name</th>
  					<th>Receiver Name</th>
  					<th>Amount</th>
            <th>Date</th>
  				</tr>
  			</thead>
  			<tbody style="background-color: white;">
    		<?php
      		if( mysqli_num_rows( $selectRes )==0 ){
        		echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      		}
      		else{
        		while( $row = mysqli_fetch_assoc( $selectRes ) ){
          			echo "<tr><td>{$row['sender']}</td><td>{$row['receiver']}</td><td>{$row['amount']}</td>
          				<td>{$row['date/time']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
  		</table>
  	<?php } ?>
  	</dir>
</body>
</html>