<?php

/* Instructions
    
    	create an array with 10 names
    
    	store a random number between 0 and 20 (see the rand() PHP function) into  a variable
    
    	using the random number stored and PHP/HTML to display
    
    	show the text: Hello <name> if the number is between 0 and 9 where <name> is the  value from the array at the index of the random number​
    
    	if the random number is greater than the bounds of the array, show the text: Name List  and then output all names in the array onto the page
    
    		-random number syntax rand(min,max);
			-extra display random number
*/

    // load data
    $names = array('Carl', 'Mike', 'Bob', 'Justina', 'Mark', 'John', 'Chad', 'Hunter', 'Judy', 'Amanda');
    $randomNumber = rand(0,20);

    $numberUnder10 = ($randomNumber < 9 ? true : false);

    // display data
    if($randomNumber < 9){
        $numberUnder10 = true;
    }else if($randomNumber > 9){
        $numberUnder10 = false;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 01 assignment</title>

    <style>
        #container{
            width: 50%;
            margin: auto;
            text-align: center;
            background-color: white;
            color: black;
            padding: 10px;
            border: 1.5px solid black;
        }
    </style>

</head>
<body>
    <div id="container">
        <h1>Week 01 Assignment</h1>
        <h2>WDV490 Advanced PHP</h2>

        <?php 
        if($numberUnder10){ ?>
                <?php echo 'Hello ' . $names[$randomNumber]; ?>
        <?php } else{ ?>

            <p>Name List:</p>
            <?php  foreach($names as $people)
                echo $people . '<br>' . '<p></p>';
            ?>
        <?php } ?>
    </div>
</body>
</html>