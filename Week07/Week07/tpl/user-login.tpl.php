<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Login</h1>

    <div id="container">

            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

                <?php if (isset($userErrorsArray['username'])) { ?>
                    <div><?php echo $userErrorsArray['username']; ?>
                <?php } ?>

                <label for='username'>Username:</label>    
                <input type="text" name="username" value="<?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?>"/><br>
                <p><span><?php echo $user->usernameErr; ?></span></p>

                <label for='user_password'>Password:</label>    
                <input type="text" name="user_password"><?php echo (isset($userDataArray['user_password']) ? $userDataArray['user_password'] : ''); ?><br>
                <p><span><?php echo $user->user_passwordErr; ?></span></p>
                
                <input type="hidden" name="user_ID" value="<?php echo (isset($userDataArray['user_ID']) ? $userDataArray['user_ID'] : ''); ?>"/>
                
                <input type="submit" name="Login" value="Login"/>
                <input type="submit" name="Cancel" value="Cancel"/>            
            </form>   

            <p>
                <a href="../public/index.php">Home</a>
                <a href="../public/user-edit.php">Add New User</a>
            </p>

        </div>
    
</body>
</html>