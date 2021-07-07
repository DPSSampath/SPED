<?php

	function verify_query($result_set) {

		global $connection;

		if (!$result_set) {
			die("Database query failed: " . mysqli_error($connection));
		}

	}

	function check_req_fields($req_fields) {
		// checks required fields
		$errors = array();
		
		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}
		return $errors;
	}

	/*function check_identification_no($identification_no) {
		// checks identification no
		$errors = array();

	if (!empty($Identification_Number)) {
	$Identification_Number = mysqli_real_escape_string($connection, $_POST['Identification_Number']);

	    if ($identification_no) {
            if (mysqli_num_rows($identification_no) == 1) {
                $errors[] = 'Identification_Number already exists';
            	}
        	}
    	}
    	return $errors;
    }*/

	function display_errors($errors) {
		// format and displays form errors
		echo '<div class="errmsg">';
		echo '<b>There were error(s) on your form.</b><br>';
		foreach ($errors as $error) {
			$error = ucfirst(str_replace("_", " ", $error));
			echo '- ' . $error . '<br>';
		}
		echo '</div>';
	}
?>