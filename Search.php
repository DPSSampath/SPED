
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	


	$asset_list = '';
	$search 	= '';

	// getting the list of users
	if ( isset($_GET['search']) ) {
		$search = mysqli_real_escape_string($connection, $_GET['search']);
		$query = "SELECT * FROM ledger WHERE (Section_Used LIKE '%{$search}%' OR Item_Name LIKE '%{$search}%' OR Identification_Number LIKE '%{$search}%') AND is_deleted=0 ORDER BY Section_Used";					
	} else {
		$query = "SELECT * FROM ledger WHERE is_deleted=0 ORDER BY Section_Used";
	}
	
	$assets = mysqli_query($connection, $query);

	verify_query($assets);

	while ($ledger = mysqli_fetch_assoc($assets)) {
		$asset_list .= "<tr>";
		$asset_list .= "<td>{$ledger['Purchase_Date']}</td>";
		$asset_list .= "<td>{$ledger['Item_Name']}</td>";
		$asset_list .= "<td>{$ledger['Unit_Price']}</td>";
		$asset_list .= "<td>{$ledger['Section_Used']}</td>";
		$asset_list .= "<td>{$ledger['Identification_Number']}</td>";
		//$asset_list .= "<td><a href=\"modify-ledger.php?user_id={$ledger['id']}\">Edit</a></td>";
		//$asset_list .= "<td><a href=\"delete-ledger.php?user_id={$ledger['id']}\">Delete</a></td>";
		$asset_list .= "</tr>";
	}
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta charset="UTF-8">

	<title>Search</title>

	<link rel="stylesheet" href="css/style-search.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1./js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Font+Name">

	<link rel="" type="text/css" href="index.php">

</head>

<body>

	<header>
		<div class="appname">Southern Province Education Department Assets Management System&nbsp;&nbsp;<a href="index.php"><i class ="fa fa-home"></i></a></div>
	</header>

<!----------------------Navbar Section------------------>

<section id="nav-bar">	
  <nav class="navbar navbar-expand-lg navbar-light">
  	<!--<a class="navbar-brand" href="#"><img src="img\logo.png" class="logo-img"></a>-->

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
</button>

 <div class="collapse navbar-collapse" id="navbarNav">
	<ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Type, Item Name | Identification Number | Branch Code & press Enter</a>
    </li>
    </ul>  	
 </div> 

<!--Search Bar-->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">

&nbsp;&nbsp;  
	<form action="Search.php" method="GET">
		<input type="text" name="search" id="" placeholder="Search..." value="<?php echo $search; ?>" autofocus></input>
	</form>
&nbsp;&nbsp;	

		<span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
        </span>                                   
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
</nav>
</section>

	<main>
		<h3>SPED Assets List <span><a href="Search.php"> Refresh</a></span></h3>
		<!--<div class="search">
			<form action="Search.php" method="get">
				<p>
					<input type="text" name="search" id="" placeholder="Type, Item Name | Identification Number | Branch Code & press Enter" value="<?php echo $search; ?>" required autofocus>
				</p>
			</form>
		</div>-->

		<table class="masterlist">
			<tr>
				<th>Purchase_Date</th>
				<th>Item_Name</th>
				<th>Unit_Price</th>
				<th>Section_Used</th>
				<th>Identification_Number</th>
				<!--<th>Edit</th>
				<th>Delete</th>-->
			</tr>

			<?php echo $asset_list; ?>

		</table>
		
		
	</main>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S89ZT85TDL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S89ZT85TDL');
</script>
	
</body>
</html>
