
<?php
	$connection = mysqli_connect("localhost", "root", "", "sped");

	if ( isset($_GET['Sub_Item_Code']) ) {

		$Sub_Item_Code = mysqli_real_escape_string($connection, $_GET['Sub_Item_Code']);

		$query 		= "SELECT * FROM dpmt WHERE Sub_Item_Code = {$Sub_Item_Code}";
		$result_set = mysqli_query($connection, $query);

		$dpmt_code_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$dpmt_code_list .= "<option value=\"{$result['Item_Name']}\">{$result['Item_Name']}</option>";
		}
		echo $dpmt_code_list;
	} else {
		echo "<option>Error</option>";
	}	
?>

