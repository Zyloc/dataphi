<?php
	require_once(realpath(dirname(__FILE__).'/config.php'));
	/*
		* function to search in database
		* @param connection $conn connection to database
		* @param string $queriedData substring of patient to be searched
		* returns row of all the information of patient
	*/
	function search($conn,$queriedData){
		$stmt = $conn->prepare("SELECT * FROM patient WHERE firstname LIKE :name");
		$stmt->bindValue(":name","%{$queriedData}%");
		$stmt->execute();
		$result = $stmt->fetchALl();
		return $result;
	}	
?>