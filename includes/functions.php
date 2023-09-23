<?php
function check_clogin()
{

	if (isset($_SESSION['cLogID'])) {
		$id = $_SESSION['cLogID'];
		if ($id === "adminLog935115") {
			$c_data = $id;
			return $c_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}
