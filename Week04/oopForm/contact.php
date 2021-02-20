<?php

    class validateContactForm{

        //SELF POSTING VARIABLES    
        var $fName = "";
        var $lName = "";
        var $email = "";
        var $dob = "";
        var $message = "";

        //ERROR MESSAGES
        var $fNameErrMsg = "";
        var $lNameErrMsg = "";
        var $emailErrMsg = "";
        var $dobErrMsg = "";
        var $messageErrMsg = "";


        function setPropertiesFromArray($dataToSet){
            $this->fName = $dataToSet['fName'];
            $this->lName = $dataToSet['lName'];
            $this->email = $dataToSet['email'];
            $this->dob = $dataToSet['dob'];
            $this->message = $dataToSet['message'];

            //SANITIZE TEXTFIELDS
            $this->fName = filter_var($this->fName, FILTER_SANITIZE_STRING);
            $this->lName = filter_var($this->lName, FILTER_SANITIZE_STRING);
			$this->dob = filter_var($this->dob, FILTER_SANITIZE_NUMBER_INT);
			$this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
			$this->message = filter_var($this->message, FILTER_SANITIZE_STRING);
        }



        function validateDataProperties(){
        // VALIDATING THE TEXTFIELDS

            // SETTTING A FLAG TO CATCH ERROR
            $valid = true;

            if(empty($this->fName) || $this->fName == 'null' || $this->fName == 'undefined'){
                $this->fNameErrMsg = "Please Enter Valid First Name! ex: John";
                $valid = false;
            }

            if(empty($this->lName) || $this->lName == 'null' || $this->lName == 'undefined'){
                $this->lNameErrMsg = "Please Enter Valid Last Name! ex: Doe";
                $valid = false;
            }

            if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL) || $this->email == 'null' || $this->email == 'undefined'){
                $this->emailErrMsg = "Please Enter Valid Email! ex: user@email.com";
                $valid = false;
            }

            if(empty($this->dob) || !strtotime($this->dob) || !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $this->dob) || $this->dob == 'null' || $this->dob == 'undefined'){
                $this->dobErrMsg = "Please Enter Valid Date of Birth! Ex: YYYY-MM-DD";
                $valid = false;
            }

            if(empty($this->message) || $this->message == 'null' || $this->message == 'undefined'){
                $this->messageErrMsg = "Please Enter Valid Message! ex: Hello, I am....";
                $valid = false;
            }

            return $valid;

        }

        function sendEmail(){

            //$valid = $this->validateDataProperties();

            // MAILER FUNCTION        
            $mailTo = 'contact@justinageddes.com';
            $headers = "From: " . $this->$email;
            $txt = "You have recieved an email from " . $this->$fName . " " . $this->$lName  . ".\n\n". "Date of birth: " . $this->$dob . "\n\n" . "Email: " . $this->$email . "\n\n" . $this->$message;
    
            mail($mailTo, $message, $txt, $headers);
            echo "Email Sent!";
            header('Location: assignment4.php');
            return $txt;
            exit;
        }
            
    }
?>