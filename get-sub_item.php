
<?php
	$connection = mysqli_connect("localhost", "root", "", "sped");

	if ( isset($_GET['Item_Code']) ) {

		$Item_Code = mysqli_real_escape_string($connection, $_GET['Item_Code']);

		$query 		= "SELECT * FROM sub WHERE Item_Code = {$Item_Code}";
		$result_set = mysqli_query($connection, $query);

		$sub_item_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$sub_item_list .= "<option value=\"{$result['Sub_Item_Code']}\">{$result['Sub_Item']}</option>";
		}
		echo $sub_item_list;
	} else {
		echo "<option>Error</option>";
	}	
?>

