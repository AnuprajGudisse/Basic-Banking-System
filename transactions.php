<?php
	session_start();
	include("conn.php");

	if (isset($_POST['submit'])) 
	{
		$sn=$_GET['id'];
		$rn=$_POST['to'];
		$amount=$_POST['amount'];

		$sql="SELECT * FROM customers WHERE id=$sn";
		$query=mysqli_query($con,$sql);
		$sql1=mysqli_fetch_array($query);

		$sql="SELECT * FROM customers WHERE id=$rn";
		$query=mysqli_query($con,$sql);
		$sql2=mysqli_fetch_array($query);


		if (($amount)<0) {
			echo '<script type="text/javascript"> 
     					alert("you are in loan");
     				</script>';
		}

		else if ($amount>$sql1['balance']) {
			echo '<script type="text/JavaScript"> 
     					alert("insufficent balance");
     				</script>';
		}

		else if ($amount==0) {
			echo '<script type="text/JavaScript"> 
     					alert("your balance is zero");
     				</script>';
		}
		else
		{
			$newbalance=$sql1['balance']-$amount;
			$sql="UPDATE customers SET balance=$newbalance WHERE id=$sn";
			mysqli_query($con,$sql);


			$newbalance=$sql1['balance']+$amount;
			$sql="UPDATE customers SET balance=$newbalance WHERE id=$rn";
			mysqli_query($con,$sql);

			$sender=$sql1['customer_name'];
			$receiver=$sql2['customer_name'];
			$sql="INSERT INTO transactions(sender,receiver,amount) VALUES('$sender','$receiver','$amount') " ;
      if (mysqli_query($con,$sql)) {
          echo '<script type="text/JavaScript"> 
              alert("successfull");
              window.location="trans_history.php";
            </script>';
      }
      else{
          echo '<script type="text/JavaScript"> 
              alert("successfull");
              window.location="trans_history.php";
            </script>';
      }

			$newbalance=0;
			$amount=0;
		}
	}
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

           .logo{
              float: left;
               position: relative;
               left: 420px;
              padding: 15px;
              width: 90px;
              height: 120px;
}
         	button{
  				border: 1px  black;
         		border-radius: 5px;
         		padding: 3px;
         		background-color:white;
         	}
          form {
      border: 3px solid #f1f1f1;
      width: 30%;
      background-color: #b3b3ff;
      background-color: rgba(0,0,0, 0.4);
      margin: auto auto;
      padding: 15px;
      border-radius: 7px;
      box-shadow: 0 0 10px #000;
      position: relative;
      top: 0;
      bottom: 0;
      left: 210px;
      right: 0;
      }
    input[type=number],.sel1
     {
      width: 100%;
      padding: 10px 21px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      border-radius: 7px;
    }
    
    ::placeholder,button{  
      font-family: "Lucida Console", "Courier New", monospace;
      font-weight: bold;
      font-size: 16px;
      color: black;
    }
    button {
      background-color: #668cff;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 7px;
    }
    button:hover {
      opacity: 0.8;
    }
    	</style>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="assests\style1.css">
	<title>Transaction</title>
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
  		<a href="trans_history.php" class="a1">Transaction History</a>
  		<a href="customers.php" class="a1" >Customers</a>
  		</nav>
  	</div>
  	<div>
  	<?php
  			include('conn.php');
  			$sid=$_GET['id'];
  			$selectSQL = "SELECT * FROM customers WHERE id=$sid ";
  			$Res = mysqli_query( $con,$selectSQL );
  			if (!$Res) {
    			echo 'Retrieval of data from Database Failed - #';
  			}
  				$row=mysqli_fetch_assoc($Res);
    ?>
    <br>
    <table align="center" style="width:30%; float: left; position: relative; left: 50px;top: 30px; ">
  			<thead>
  				<tr >
  					<th style="background-color: #668cff">Account Number</th>
            <th style="background-color: white;"><?php echo $row['acc_no'];?></th>
          </tr>
          <tr>
  					<th style="background-color: #668cff">Customer Name</th>
            <th style="background-color: white;"><?php echo $row['customer_name'];?></th>
          </tr>
          <tr>
            <th style="background-color: #668cff">Email</th>
            <th style="background-color: white;"><?php echo $row['email'];?></th>
          </tr>
  				<tr>	
  					<th style="background-color: #668cff">Gender</th>
            <th style="background-color: white;"><?php echo $row['gender'];?></th>
          </tr>
          <tr>
  					<th style="background-color: #668cff">Balance</th>
            <th style="background-color: white;"><?php echo $row['balance'];?></th>
  				</tr>
  			</thead>
  		</table>
<br><br>
  <div>
  	<form method="post" name="tr" >
  		<label>Transfer to:</label>
  		<select name="to" class="sel1" required >
  			<option value="" disabled selected >Choose </option>
  			<?php 
  			include('conn.php');
  			$sid=$_GET['id'];
  			$selectSQL = "SELECT * FROM customers WHERE id!=$sid ";
  			$Res = mysqli_query( $con,$selectSQL );
  			if (!$Res) {
    			echo 'Retrieval of data from Database Failed - #';
  			}
  				while($row=mysqli_fetch_assoc($Res))
  				{ ?>
  				<option value="<?php echo $row['id'];?>">
  					<?php echo $row['customer_name']; ?>(Balance: <?php echo $row['balance'];?>)
  				</option>
  			<?php } ?>
  		</select>
  		<br><br>
  		<label>Amount:</label>
  		<input type="number" name="amount" required>
  		<br><br>
  		<div style="text-align: center;">
  			<button type="submit" name="submit">Transfer</button>
  		</div>
  	</form>
  </div>
</body>
</html>