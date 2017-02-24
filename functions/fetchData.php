<?php
	require_once(realpath(dirname(__FILE__).'/connect.php'));
	/*
		* function to fetch data from database
		* @param connection to database
		* returns all the rows of database
	*/
	function fetchData($conn){
		$stmt = $conn->prepare("SELECT  * FROM patient ORDER BY id");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
?>