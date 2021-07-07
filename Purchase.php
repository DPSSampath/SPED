<?php ob_start(); ?>
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
    $Purchase_Date          = '';
    $Assets_Ledger_No       = '';
    $Inven_Page_No          = '';
    $Section_Used           = '';
    $Section_Ledger_No      = '';
    $Dpmt_Code              = '';
    $Item_Name              = '';
    $Serial_Number          = '';
    $User_of_Asset          = '';
    $Vote_Number            = '';
    $Voucher_No             = '';
    $Unit_Price             = '';
    $Quantity               = '';
    $Total_Value            = '';   

    if (isset($_POST['submit'])) {
        
        $Category               = $_POST['Category'];
        $Item                   = $_POST['Item'];
        $Sub_Item               = $_POST['Sub_Item'];
        $Identification_Number  = $_POST['Identification_Number'];
        $Purchase_Date          = $_POST['Purchase_Date'];
        $Assets_Ledger_No       = $_POST['Assets_Ledger_No'];
        $Inven_Page_No          = $_POST['Inven_Page_No'];
        $Section_Used           = $_POST['Section_Used'];
        $Section_Ledger_No      = $_POST['Section_Ledger_No'];
        $Dpmt_Code              = $_POST['Dpmt_Code'];
        $Item_Name              = $_POST['Item_Name'];
        $Serial_Number          = $_POST['Serial_Number'];
        $User_of_Asset          = $_POST['User_of_Asset']; 
        $Vote_Number            = $_POST['Vote_Number'];
        $Voucher_No             = $_POST['Voucher_No'];
        $Unit_Price             = $_POST['Unit_Price'];
        $Quantity               = $_POST['Quantity'];
        $Total_Value            = $_POST['Total_Value'];

            // checking required fields
            $req_fields = array('Category', 'Item', 'Sub_Item', 'Identification_Number', 'Purchase_Date', 'Assets_Ledger_No', 'Inven_Page_No', 'Section_Used', 'Section_Ledger_No', 'Dpmt_Code', 'Item_Name', 'Serial_Number', 'User_of_Asset', 'Vote_Number', 'Voucher_No', 'Unit_Price', 'Quantity', 'Total_Value',);

            $errors = array_merge($errors, check_req_fields($req_fields));


            // checking Identification_Number already exists
            if (!empty($Identification_Number)) {
                $Identification_Number = mysqli_real_escape_string($connection, $_POST['Identification_Number']);

                $query = "SELECT * FROM ledger WHERE Identification_Number = '{$Identification_Number}' LIMIT 1";

                $result_set = mysqli_query($connection, $query);

                if ($result_set) {
                    if (mysqli_num_rows($result_set) == 1) {
                        $errors[] = 'Identification_Number already exists';
                    }
                }
            }

        // no errors found... adding new record
        if (empty($errors)) {
        
        $Category           = mysqli_real_escape_string($connection, $_POST['Category']);
        $Item               = mysqli_real_escape_string($connection, $_POST['Item']);
        $Sub_Item           = mysqli_real_escape_string($connection, $_POST['Sub_Item']);
        // Identification_Number is already sanitized
        $Purchase_Date      = mysqli_real_escape_string($connection, $_POST['Purchase_Date']);
        $Assets_Ledger_No   = mysqli_real_escape_string($connection, $_POST['Assets_Ledger_No']);
        $Inven_Page_No      = mysqli_real_escape_string($connection, $_POST['Inven_Page_No']);
        $Section_Used       = mysqli_real_escape_string($connection, $_POST['Section_Used']);
        $Section_Ledger_No  = mysqli_real_escape_string($connection, $_POST['Section_Ledger_No']);
        $Dpmt_Code          = mysqli_real_escape_string($connection, $_POST['Dpmt_Code']);
        $Item_Name          = mysqli_real_escape_string($connection, $_POST['Item_Name']);
        $Serial_Number      = mysqli_real_escape_string($connection, $_POST['Serial_Number']);
        $User_of_Asset      = mysqli_real_escape_string($connection, $_POST['User_of_Asset']);
        $Vote_Number        = mysqli_real_escape_string($connection, $_POST['Vote_Number']);
        $Voucher_No         = mysqli_real_escape_string($connection, $_POST['Voucher_No']);
        $Unit_Price         = mysqli_real_escape_string($connection, $_POST['Unit_Price']);
        $Quantity           = mysqli_real_escape_string($connection, $_POST['Quantity']);
        $Total_Value        = mysqli_real_escape_string($connection, $_POST['Total_Value']);

            $query = "INSERT INTO ledger ( ";
            $query .= "Category, Item, Sub_Item, Identification_Number, Purchase_Date, Assets_Ledger_No, Inven_Page_No, Section_Used, Section_Ledger_No, Dpmt_Code, Item_Name, Serial_Number, User_of_Asset, Vote_Number, Voucher_No, Unit_Price, Quantity, Total_Value";
            $query .= ") VALUES ("; 
            $query .= "'{$Category}', '{$Item}', '{$Sub_Item}', '{$Identification_Number}', '{$Purchase_Date}', '{$Assets_Ledger_No}', '{$Inven_Page_No}', '{$Section_Used}', '{$Section_Ledger_No}', '{$Dpmt_Code}', '{$Item_Name}', '{$Serial_Number}', '{$User_of_Asset}', '{$Vote_Number}', '{$Voucher_No}', '{$Unit_Price}', '{$Quantity}', '{$Total_Value}'";  
            $query .= ")";

            $result = mysqli_query($connection, $query);

            if ($result) {
                // query successful... redirecting to users page
                header('Location: Purchase.php?asset_added=true');
            } else {
                $errors[] = 'Failed to add the new record.';
            }
        }
    }
    
    ob_end_flush();
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
    
	<title>Purchase</title>
	
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
<form name="purchaseForm" method="POST" action="Purchase.php" id="purchaseForm" enctype="multipart/form-data">

<!----------------------Table Head------------------>
                                
                <span id="ctl00_Label2" style="color:#0033CC;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROVINCIAL DEPARTMENT OF EDUCATION, SOUTHERN PROVINCE...</span>
       
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asset Purchase!</h1> 
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

                                <lable>JV_No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable><input name="JV_No" type="text" id="JV_No" style="background-color:#99FFCC;">


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
<div>
<lable for="Location">Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>&nbsp;
    <select name="Section_Used" id="Section_Used" <?php echo 'value="' . $Section_Used . '"'; ?> style="height:24px;width:214px;">

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
&nbsp;  <input name="Identification_Number" type="text" id="Identification_Number" <?php echo 'value="' . $Identification_Number . '"'; ?>style="height:24px;width:214px;"></td></tr> <!--readonly="readonly"-->
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>                                      
        <lable for="Purchase_Date">Purchase&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <input name="Purchase_Date" type="date" id="Purchase_Date" <?php echo 'value="' . $Purchase_Date . '"'; ?>style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <lable for="Assets_Ledger_No">Assets&nbsp;Ledger&nbsp;S/N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <input name="Assets_Ledger_No" type="number" id="Assets_Ledger_No" <?php echo 'value="' . $Assets_Ledger_No . '"'; ?>style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <lable for="Inven_Page_No">Inventory&nbsp;Page&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <input name="Inven_Page_No" type="number" id="Inven_Page_No" <?php echo 'value="' . $Inven_Page_No . '"'; ?>style="height:24px;width:214px;"></td></tr>
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
        <label for="Dpmt_Code">Dpmt&nbsp;Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <input name="Dpmt_Code" id="Dpmt_Code" <?php echo 'value="' . $Dpmt_Code . '"'; ?> style="height:24px;width:217px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Item_Name">Item&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable></td><td>
&nbsp;  <select name="Item_Name" id="Item_Name" <?php echo 'value="' . $Item_Name . '"'; ?> style="height:24px;width:217px;"></select>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Serial_Number">Serial&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="Serial_Number" type="text" id="Serial_Number" <?php echo 'value="' . $Serial_Number . '"'; ?>style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="User_of_Asset">User&nbsp;of&nbsp;Asset&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="User_of_Asset" type="text" id="User_of_Asset" <?php echo 'value="' . $User_of_Asset . '"'; ?> style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Vote_Number">Vote&nbsp;Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <select name="Vote_Number" id="Vote_Number" <?php echo 'value="' . $Vote_Number . '"'; ?> style="height:24px;width:217px;">

    <option value="0">--Select Vote Number--</option>
    <option value="310-2102">310-3-2-0-2102</option>
    <option value="310-2103">310-3-2-0-2103</option>
    <option value="310-2104">310-3-2-0-2104</option>
    <option value="310-2105">310-3-2-0-2105</option>
    <option value="310-2106">310-3-2-0-2106</option>
    <option value="Deposit">Deposit Account</option>
    <option value="Donation">Donation</option>
    <option value="308-2102">308-3-2-0-2102</option>
    <option value="308-2103">308-3-2-0-2103</option>
</select>
                                       </td></tr><tr></tr><tr></tr><tr><td>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Voucher_No">Voucher&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="Voucher_No" type="text" id="Voucher_No" <?php echo 'value="' . $Voucher_No . '"'; ?> style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Unit_Price">Unit Price&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="Unit_Price" type="text" id="Unit_Price" <?php echo 'value="' . $Unit_Price . '"'; ?> style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div>
        <label for="Quantity">Quantity&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="Quantity" type="text" id="Quantity" <?php echo 'value="' . $Quantity . '"'; ?> style="height:24px;width:214px;"></td></tr>
    </div>

<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td></tr><tr><td>

    <div> 
        <label for="Total_Value">Total&nbsp;&nbsp;</label></td><td>
&nbsp;  <input name="Total_Value" type="text" id="Total_Value" <?php echo 'value="' . $Total_Value . '"'; ?> style="height:24px;width:214px;"></td></tr>                   <!--readonly="readonly"-->
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
                var getURL     = "get-dpmt_code.php?Sub_Item_Code=" + subItemId;
                $.get(getURL, function(data, status){
                    $("#Item_Name").html(data);
                });
            });
        });         
    </script>

<script src="js/timer.js"></script>

</body>
</html>
<?php mysqli_close($connection); ?>