<html>
<head>
	<style type="text/css">
		th, td {
                width:250px;
                text-align:center;
                padding:10px
              
            }
         	button{
  				border: 2px solid black;
         		border-radius: 5px;
         		background-color:white;
         	}

.logo{float: left;
	position: relative;
	left: 400px;
	top: 12px;
	width: 80px;
	height: 100px;
}
	</style>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="assests\style1.css">
	<title>Home</title>
</head>
<body>
	<div class="head">
		<img src="img/logo.png" class="logo">
		<h1 style=" font-size: 50px; text-align:center;" >
		<a href="index.php" style="color:#668cff; font-family: 'Catamaran', sans-serif; ">SPARKS BANK</a>		
		</h1>
	</div>
	<div class="topnav">
		<nav style="float: right;">
  		<a href="trans_history.php" class="a1">Transaction History</a>
  		<a href="customers.php" class="a1" >Customers</a>
  		</nav>
	</div>
	<div class="row">
		<h1 style="text-align: center;">Welcome to SPARKS BANK</h1>
		<div style="position: relative; top: 40px;">
		<table align="center">
			<tr>
				<th style=" font-size: 20px;">View Customers</th>
				<th style=" font-size: 20px;">View Transaction History</th>
			</tr>
			<tr>
				<td>
					<button style="padding: 10px;">
						<a href="customers.php" style="color:#668cff;font-size: 15px;">Customers</a>
					</button>
				</td>
				<td>
					<button style="padding: 10px; ">
						<a href="trans_history.php" style="color:#668cff;font-size: 15px;">Transaction history</a>
					</button>
				</td>
			</tr>
		</table>
	</div>
	</div>
</body>
</html>