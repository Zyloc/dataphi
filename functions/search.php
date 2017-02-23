<?php
	require_once(realpath(dirname(__FILE__).'/config.php'));
	function search($conn,$queriedData){
		$stmt = $conn->prepare("SELECT * FROM patient WHERE firstname LIKE :name");
		$stmt->bindValue(":name","%{$queriedData}%");
		$stmt->execute();
		$result = $stmt->fetchALl();
		return json_encode($result);
	}
	if(isset($_GET['search'])){
		$find = $_GET['search'];
		echo search($conn,$find);	
	}
		
?>