<?php

include_once ('contact.php');

$fNameErrMsg = "";
$lNameErrMsg = "";
$emailErrMsg = "";
$dobErrMsg = "";
$messageErrMsg = "";

//var_dump($_POST);

//die('end here');

if(isset($_POST['submit'])){ 

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $message = $_POST['message'];

    $fNameErrMsg = validateFirstName($fName);
    $lNameErrMsg = validateLastName($lName);
    $emailErrMsg = validateEmail($email);
    $dobErrMsg = validateDob($dob);
    $messageErrMsg = validateMessage($message);

   

    if($fNameErrMsg == "" && $lNameErrMsg == "" && $emailErrMsg == "" && $dobErrMsg == "" && $messageErrMsg == ""){
        
        $mailTo = 'jgeddes12.wolf@gmail.com';
        $headers = "From: " . $email;
        $txt = "You have recieved an email from " . $fName . " " . $lName  . ".\n\n". "Date of birth: " . $dob . "\n\n" . "Email: " . $email . "\n\n" . $message;


        mail($mailTo, $message, $txt, $headers);
        echo "Email Sent!";
        header('Location: assignment2.php');
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 2 Assignment: Form Validation</title>
    <style>

        #container{
            width: 90%;
            padding: 10px;
            margin: auto;
            
        }


        #container form input, textarea{
            display: block;
            padding-bottom: 10px;
            margin: auto;
            margin-bottom: 5px;
            width: 30%;
        }


        h1,h2 {
            text-align: center;
        }


    </style>
</head>
<body>
    
    <div id="container">
        <h1>WDV 441: Advanced Php</h1>
        <h2>Week 2 Assignment - Form Validation</h2>


        <form method="POST" action="assignment2.php">

            <input type="text" name="fName" placeholder="Enter First Name" > <span><?php echo $fNameErrMsg; ?></span>
            <input type="text" name="lName" placeholder="Enter Last Name"  ><span><?php echo $lNameErrMsg; ?></span>

            <input type="email" name="email" placeholder="Enter Email"><span><?php echo $emailErrMsg; ?></span>

            <input type="text" name="dob" placeholder="Enter Date of Birth: YYYY-MM-DD"><span><?php echo $dobErrMsg; ?></span>

            <textarea name="message" placeholder="Leave me a message!" ></textarea><span><?php echo $messageErrMsg; ?></span>

            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">

        </form>
    </div>

</body>
</html>