<?php
    require_once(realpath(dirname(__FILE__).'/config.php'));
    
    function validName($name){
        return preg_match("/^[a-zA-Z ]*$/",$name);
    }
    
    function validAge($age){
        return preg_match("/^[0-9]*$/",$age);
    }
    
    function validDob($date){
        $date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
        return preg_match($date_regex, $date);
    }
    
    function validPhone($number){
        return preg_match("/^[0-9]*$/",$number);
    }
    
    function validGender($gender){
        if($gender == 'G' or $gender == 'M'or $gender == 'O'){
            return true;
        }
        return false;
    }

    function insertPatient($conn,$patient){
        $firstname = $patient['firstname'];
        $lastname = $patient['lastname'];
        $age = $patient['age'];
        $dob = $patient['dob'];
        $dob = date('Y-m-d',strtotime($dob));
        $phone = $patient['phone'];
        $info = $patient['info'];
        $gender = $patient['gender'];
        $isValid = true;
        if(!validName($firstname)){
            $isValid = false;
        }
        
        if(!validName($lastname)){
            $isValid = false;
        }
        
        if(!validAge($age)){
            $isValid = false;
        }
        if(!validPhone($phone)){
            $isValid = false;
        }
        if(!$isValid){
            throw new Exception();
        }

        $stmt = $conn->prepare("INSERT INTO patient(firstname,lastname,age,dob,gender,phone,info) 
            VALUES (:firstname,:lastname,:age,:dob,:gender,:phone,:info)");
        $stmt->bindValue(":firstname",$firstname);
        $stmt->bindValue(":lastname",$lastname);
        $stmt->bindValue(":age",$age);
        $stmt->bindValue(":dob",$dob);
        $stmt->bindValue(":phone",$phone);
        $stmt->bindValue(":info",$info);
        $stmt->bindValue(":gender",$gender);
        $stmt->execute();
    } 
?>