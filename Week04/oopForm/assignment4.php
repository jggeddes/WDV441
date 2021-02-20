<?php

include_once ('contact.php');

//CALLING THE CLASS
$contactForm = new validateContactForm();

if(isset($_POST['submit'])){

    //Setting properties in the form
    $contactForm->setPropertiesFromArray($_POST);

    //VALIDATING THE DATA FROM THE ARRAY
    $valid = $contactForm->validateDataProperties();

    if($valid == true){
        $contactForm->sendEmail();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Week 4: Form into OOP</title>
    
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
        <h2>Week 4 Assignment - Form into OOP</h2>

        <form method="POST" action="assignment4.php">

            <input type="text" name="fName" placeholder="Enter First Name" value="<?php echo $contactForm->fName;?>">
            <span><?php echo $contactForm->fNameErrMsg; ?></span>

            <input type="text" name="lName" placeholder="Enter Last Name" value="<?php echo $contactForm->lName;?>">
            <span><?php echo $contactForm->lNameErrMsg; ?></span>

            <input type="email" name="email" placeholder="Enter Email" value="<?php echo $contactForm->email;?>">
            <span><?php echo $contactForm->emailErrMsg; ?></span>
            
            <input type="text" name="dob" placeholder="Enter Date of Birth: YYYY-MM-DD" value="<?php echo $contactForm->dob;?>">
            <span><?php echo $contactForm->dobErrMsg; ?></span>

            <textarea name="message" placeholder="Leave me a message!" value="<?php echo $contactForm->message;?>"></textarea>
            <span><?php echo $contactForm->messageErrMsg; ?></span>

            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">

        </form>
    </div>

</body>
</html>