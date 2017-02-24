<?php 
    /*
        * makes connection with database
        * $conn is connection to database
    */
    require_once(realpath(dirname(__FILE__).'/connect.php'));
    try{
        $conn = new PDO("mysql:host={$host};dbname={$dbName};charset=utf8",$username,$password,$opt);
    	
        $sql = "CREATE TABLE IF NOT EXISTS patient (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    firstname VARCHAR(30) NOT NULL,
                    lastname VARCHAR(30) NOT NULL,
                    age INT NOT NULL,
                    dob Date NOT NULL,
                    gender VARCHAR(1) NOT NULL,
                    phone VARCHAR(10) NOT NULL,
                    info TEXT NULL
                )";
        $conn->exec($sql);
    }
    catch(PDOException $e){
    	echo "I'm sorry, Dude. I'm afraid I can't do that.";
        file_put_contents('errors.txt', date_format($date, 'U = Y-m-d H:i:s')." ".$e->getMessage()."\n", FILE_APPEND);
    }
?>