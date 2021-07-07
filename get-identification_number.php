
<?php
	$connection = mysqli_connect("localhost", "root", "", "sped");

	if ( isset($_GET['Sub_Item_Code']) ) {

		$Sub_Item_Code = mysqli_real_escape_string($connection, $_GET['Sub_Item_Code']);

		$query 		= "SELECT * FROM ledger WHERE Sub_Item = {$Sub_Item}";
		$result_set = mysqli_query($connection, $query);

		$identification_number_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$identification_number_list .= "<option value=\"{$result['Identification_Number']}\">{$result['Identification_Number']}</option>";
		}
		echo $identification_number_list;
	} else {
		echo "<option>Error</option>";
	}	
?>

