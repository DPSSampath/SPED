
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<!------------------Form Validation------------------>
<?php 
        // checking if user is loggesIn
            if (!isset($_SESSION['users_id'])) {
                header('Location: login.php');
            }

    $errors = array();
    $Category               = '';
    $Item                   = '';
    $Sub_Item               = '';
    $Identification_Number  = '';
    $Current_Section        = '';
    $Section_Ledger_No      = '';
    $New_User_of_Asset      = '';


    if (isset($_GET['Identification_Number'])) {
        // getting the asset information
        $Identification_Number = mysqli_real_escape_string($connection, $_GET['Identification_Number']);
        $query = "SELECT * FROM ledger WHERE id = {$Identification_Number} LIMIT 1";

        $result_set = mysqli_query($connection, $query);

        if ($result_set) {
            if (mysqli_num_rows($result_set) == 1) {
                // asset found
                $result     = mysqli_fetch_assoc($result_set);
                $Category   = $result['Category'];
                $Item       = $result['Item'];
                $Sub_Item   = $result['Sub_Item '];
                $Identification_Number = $result['Identification_Number'];
            } else {
                // asset not found
                header('Location: Modify-Asset.php?err=user_not_found');   
            }
        } else {
            // query unsuccessful
            header('Location: Modify-Asset.php?err=query_failed');
        }
    }
    
    if (isset($_POST['submit'])) {
        
        $Category               = $_POST['Category'];
        $Item                   = $_POST['Item'];
        $Sub_Item               = $_POST['Sub_Item'];
        $Identification_Number  = $_POST['Identification_Number'];
        $Current_Section        = $_POST['Current_Section'];
        $Section_Ledger_No      = $_POST['Section_Ledger_No'];
        $New_User_of_Asset      = $_POST['New_User_of_Asset']; 

            // checking required fields
            $req_fields = array('Category', 'Item', 'Sub_Item', 'Identification_Number', 'Current_Section', 'Section_Ledger_No', 'New_User_of_Asset',);

            $errors = array_merge($errors, check_req_fields($req_fields));

        // no errors found... adding new record
        if (empty($errors)) {
        
        $Current_Section           = mysqli_real_escape_string($connection, $_POST['Current_Section']);
        $Section_Ledger_No         = mysqli_real_escape_string($connection, $_POST['Section_Ledger_No']);
        $New_User_of_Asset         = mysqli_real_escape_string($connection, $_POST['New_User_of_Asset']);
        
            $query  = "UPDATE ledger SET ";
            $query .= "Current_Section = '{$Current_Section}', ";
            $query .= "Section_Ledger_No = '{$Section_Ledger_No}', ";
            $query .= "New_User_of_Asset = '{$New_User_of_Asset}' ";
            $query .= "WHERE id = {$Identification_Number} LIMIT 1";
/*echo $query;
die();*/
            $result = mysqli_query($connection, $query);

            if ($result) {
                // query successful... redirecting to users page
                header('Location: Modify-Asset.php?asset_modify=true');
            } else {
                $errors[] = 'Failed to modify the record.';
            }
        }
    }
?>

<!------------------Dynamic Dropdown for Category------------------>
<?php

    $query      = "SELECT * FROM category";
    $result_set = mysqli_query($connection, $query);

    $category_list = "";
    while ( $result = mysqli_fetch_assoc($result_set) ) {
        $category_list .= "<option value=\"{$result['Category_Code']}\">{$result['Category']}</option>";
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
    
	<title>Modify-Asset</title>
	
	<link rel="stylesheet" href="css\style-webform.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1./js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Font+Name">

	<link rel="" type="text/css" href="index.php">
    <link rel="" type="text/css" href="login.php">
    <link rel="" type="text/css" href="Dashboard.php">
    <link rel="" type="text/css" href="Purchase.php">
    <link rel="" type="text/css" href="Modify-Asset.php">
    <link rel="" type="text/css" href="Disposal.php">
    <link rel="" type="text/css" href="Purchase-Return.php">
    <link rel="" type="text/css" href="Asset-Reports.php">
    <link rel="" type="text/css" href="Services.php">
    
</head>

<body>

<!----------------------Sidebar Section------------------>

<div class="sideBar">
	<header>My App</header>
	<ul>
		<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
		<li><a href="Dashboard.php"><i class="fa fa-qrcode"></i>Dashboard</a></li>
		<li><a href="Purchase.php"><i class="fa fa-link"></i>Purchase</a></li>
        <li><a href="Modify-Asset.php"><i class="fa fa-link"></i>Modify Asset</a></li>
		<li><a href="Disposal.php"><i class="fa fa-link"></i>Disposal</a></li>
		<li><a href="Purchase-Return.php"><i class="fa fa-link"></i>Purchase Return</a></li>
		<li><a href="Asset-Reports.php"><i class="fas fa-stream"></i>Asset Reports</a></li>
		<li><a href="Services.php"><i class="fa fa-sliders-h"></i>Services</a></li>
		
	</ul>	
</div>

<!----------------------Navbar Section------------------>

<section id="nav-bar">	
    <nav class="navbar navbar-expand-lg navbar-light">
  	 <a class="navbar-brand" href="#"><img src="img\logo.png" class="logo-img"></a>
 	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
  </button>
   
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome <?php echo $_SESSION['last_name']; ?> ! <div id="timer"></div> </a>
      </li>
    </ul>

    <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i><b>Logout</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
    	
</div> 

<!--Search Bar-->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                     <input type="text" class="form-control" placeholder="Search..."></input>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> 
    </nav>
</section>

<!----------------------Form Section------------------>

<section id="form">
<form name="modifyForm" method="POST" action="Modify-Asset.php" id="modifyForm" enctype="multipart/form-data">

<!----------------------Table Head------------------>
                                
                <span id="ctl00_Label2" style="color:#0033CC;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROVINCIAL DEPARTMENT OF EDUCATION, SOUTHERN PROVINCE...</span>
       
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modify Asset!</h1> 
    </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                                                


<!----------------------Table Section------------------>    

            <div class="row">
                <div class="col-lg-6">
                <div class="panel panel-default">
                        <div class="panel-heading">

                            <b>Inventorized</b>
                        <span id="ctl00_ContentPlaceHolder1_Label5">310</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="ctl00_ContentPlaceHolder1_Label6">HOE</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      
                        
                </div> 
                        
<!---------------Display Errors--------------->
        <?php 
            if (!empty($errors)) {
                display_errors($errors);
            }
        ?>

                        <div class="panel-body">
                            <div class="alert alert-success">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                        


&nbsp;&nbsp;&nbsp; <table cellpadding="0" cellspacing="0">
                                    <tbody><tr><td style="width: 100px">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Category">Category&nbsp;&nbsp;</lable></td><td>
&nbsp;  <select name="Category" id="Category" <?php echo 'value="' . $Category . '"'; ?> style="height:24px;width:217px;">
    <?php echo $category_list; ?>
</select>
    </div>
                                         
<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>
    
    <div>
        <label for="Item">Item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <select name="Item" id="Item" <?php echo 'value="' . $Item . '"'; ?> style="height:24px;width:217px;"></select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Sub_Item">Sub&nbsp;Item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <select name="Sub_Item" id="Sub_Item" <?php echo 'value="' . $Sub_Item . '"'; ?> style="height:24px;width:217px;"></select>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <lable for="Identification_Number">Identification&nbsp;Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <select name="Identification_Number" id="Identification_Number" <?php echo 'value="' . $Identification_Number . '"'; ?> style="height:24px;width:217px;"></select>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Current_Section">New&nbsp;Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <select name="Current_Section" id="Current_Section" <?php echo 'value="' . $Current_Section . '"'; ?> style="height:24px;width:217px;">

    <option value="0">--Select Location--</option>
    <option value="AC">Accounts Branch</option>
    <option value="AD">Administrative Branch</option>
    <option value="AU">Audit Branch</option>
    <option value="CC">Chief Clerk Branch</option>
    <option value="DE">Development Branch</option>
    <option value="DI">Discipline & Investigation Branch</option>
    <option value="NS">National Sch Branch</option>
    <option value="PL">Planning Branch</option>
    <option value="TE">Teachers Establishment Branch</option>
    <option value="ST">Storse</option>
    <option value="SPED">Education Department</option>
    <option value="MAS">ZEO Akuressa</option>
    <option value="GAS">ZEO Ambalangoda</option>
    <option value="MDS">ZEO Deniyaya</option>
    <option value="GES">ZEO Elpitiya</option>
    <option value="GGS">ZEO Galle</option>
    <option value="MHS">ZEO Hakmana</option>
    <option value="HHS">ZEO Hambanthota</option>
    <option value="MMS">ZEO Mathara</option>
    <option value="HTS">ZEO Tangalle</option>
    <option value="GUS">ZEO Udugama</option>
    <option value="HWS">ZEO Walasmulla</option>
</select>
                                       </td></tr><tr></tr><tr></tr><tr><td>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <lable for="Section_Ledger_No">Section&nbsp;Ledger&nbsp;S/N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <input name="Section_Ledger_No" type="number" id="Section_Ledger_No" <?php echo 'value="' . $Section_Ledger_No . '"'; ?>style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="User_of_Asset">New&nbsp;User&nbsp;of&nbsp;Asset&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="New_User_of_Asset" type="text" id="New_User_of_Asset" <?php echo 'value="' . $New_User_of_Asset . '"'; ?> style="height:24px;width:214px;"></td></tr>
    </div>

</tbody></table>
      <br>
</div>
        <div class="alert alert-info">
            <label for="Save">Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="submit" name="submit" value="Save" id="submit">
            <!--onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;submit&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" -->
        </div>

            </div><!-- .panel-body -->
        </div><!-- /.panel -->
    </div>                             
</section>

<!----------------------Footer Section------------------>

<section id="footer">
	<div>
		<hr>
		<p class="copyright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All rights received...&nbsp;&amp;&nbsp;Website Crafted by - DPS Sampath ©</p>
	</div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>   
    <script>
        $(document).ready(function(){
            $("#Category").on("change", function(){
                var categoryId = $("#Category").val();
                var getURL     = "get-item.php?Category_Code=" + categoryId;
                $.get(getURL, function(data, status){
                    $("#Item").html(data);
                });
                
            });
        
            $("#Item").on("change", function(){
                var itemId = $("#Item").val();
                var getURL     = "get-sub_item.php?Item_Code=" + itemId;
                $.get(getURL, function(data, status){
                    $("#Sub_Item").html(data);
                });
            });

            $("#Sub_Item").on("change", function(){
                var subItemId = $("#Sub_Item").val();
                var getURL     = "get-identification_number.php?Sub_Item_Code=" + ledgerId;
                $.get(getURL, function(data, status){
                    $("#Identification_Number").html(data);
                });
            });
        });         
    </script>

<script src="js/timer.js"></script>

</body>
</html>
<?php mysqli_close($connection); ?>