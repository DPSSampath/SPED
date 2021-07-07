
<?php 
	$connection = mysqli_connect("localhost", "root", "", "sped");

	if ( isset($_GET['Category_Code']) ) {

		$Category_Code = mysqli_real_escape_string($connection, $_GET['Category_Code']);

		$query 		= "SELECT * FROM item WHERE Category_Code = {$Category_Code}";
		$result_set = mysqli_query($connection, $query);

		$item_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$item_list .= "<option value=\"{$result['Item_Code']}\">{$result['Item']}</option>";
		}
		echo $item_list;
	} else {
		echo "<option>Error</option>";
	}
?>
	
