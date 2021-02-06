<?php
    
    function validateFirstName($fName){
        if (empty($fName) || filter_var(!$fName, FILTER_SANITIZE_STRING || !preg_match('/[a-zA-Z\s]+$/', $fName) )){
            return ("Please Enter a Valid First Name!");
        }
        return "";

    }

    function validateLastName($lName){
        if (empty($lName) || filter_var(!$lName, FILTER_SANITIZE_STRING || !preg_match('/[a-zA-Z\s]+$/', $lName) )){
            return ("Please Enter a Valid Last Name!");

        }
        return "";

    }

    // Validating the Email
    function validateEmail($email){
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            return ("Please Enter a Valid Email. Example: youremail@email.com");
        }
        return "";
    }

    function validateDob($dob){
        if(empty($dob) || !strtotime($dob) || !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dob) ){
            return ("Please Enter a Valid Date of Birth!");
        }
        return "";
    }

    function validateMessage($message){
        if (empty($message) || !filter_var($message, FILTER_SANITIZE_STRING)){
            return ("Please Enter a Valid Message!"); 
        }
        return "";

    }



?>