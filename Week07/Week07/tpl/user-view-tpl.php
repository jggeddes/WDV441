<html>
    <body>
        <div>
            Username: <?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?><br>
        </div>

        <div>
            User Level: <?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?><br>
        </div>

        <div>
            <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userDataArray['user_ID'] . "_user.jpg")) { ?>
                <img src="images/<?php echo $userDataArray['user_ID'] . "_user.jpg"; ?>"/>
            <?php } ?>
        </div>
        
        <a href="../public/user-list.php">back</a>
    </body>

    <a href="../public/index.php">Home</a>
</html>