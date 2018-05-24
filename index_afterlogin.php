<!DOCTYPE html>
<html lang="en">
<head>
  <title>Capstone Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.html"><img src="img/logo2.png" style="margin-top: -8%;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
		<img src="img/gamingrig3.png" style="margin-left: -2%;">
    </div><br><br>
    
    <div class="col-sm-8 text-center"> 
			<div style="width:60%; margin-left:15%;">
	<body>	
		<?php session_start();
		include('database_config.php');?>
		<h3>Admin Control Panel</h3>
		
		<!-- Form for Search box -->
		<form method="post" action="search.php">
			<input type="text" name="srch_query" placeholder="Search here..." required>
			<button class="btn btn-secondary" type="submit" name="search" value="search">Search</button>
		</form>
		
		<br/>
		<table class="table table-striped" border="1" cellspacing="0" cellpadding="4">
			<thead class="thead-dark">
				<tr>
					<th scope="col"> Computer </th>
					<th scope="col"> Price </th>
					<th scope="col"> RAM </th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php include('database_config.php');
					$result = $dbh -> prepare("SELECT * FROM computers ORDER BY id DESC");
					$result -> execute();
					for ($i = 0; $row = $result -> fetch(); $i++)
					{ ?>
						<tr class="record">
							<td><?php echo $row['computer']; ?></td>
							<td><?php echo $row['price']; ?></td>
							<td><?php echo $row['ram']; ?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">EDIT</button></a>
								&nbsp; | &nbsp; 
								<a href="delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">DELETE</button></a>							
							</td>
						</tr>
		<?php } ?>
			</tbody>
		</table>
		<br/>
		<a href="add.php"><button type="button" class="btn btn-primary">Add new computer</button></a><br/>
	</div>
	</body>
</html>
    </div>
  </div>
</div>

</body>
<footer class="container-fluid text-center" style="margin-top: 20%;">
  <p>Footer Text</p>
</footer>
</html>
