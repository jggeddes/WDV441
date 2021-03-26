<html>
    <head>

        <style>

            #container{
                width: 90%;
                border: 2px solid black;
                padding: 10px;
                box-shadow: 5px;
                background-color: #f5f5f5;
                margin: auto;
            }

            h1{
                text-align: center;
            }

            form{
                text-align: center; 
            }

            span{
                color: red;
            }

            p{
                text-align: center;
            }

        </style>
    </head>
    <body>

    <h1>Update User(s)</h1>


        <div id="container">

            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

                <?php if (isset($userErrorsArray['username'])) { ?>
                    <div><?php echo $userErrorsArray['username']; ?>
                <?php } ?>

                <label for='username'>username:</label>    
                <input type="text" name="username" value="<?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?>"/><br>
                <p><span><?php echo $user->usernameErr; ?></span></p>

                <label for='user_password'>password:</label>    
                <input type="text" name="user_password" value="<?php echo (isset($userDataArray['user_password']) ? $userDataArray['user_password'] : ''); ?>"/><br>
                <p><span><?php echo $user->user_passwordErr; ?></span></p>

                <div>
                    <label for='upload_image'>Article Image:</label>    
                    <input type = "file" name = "upload_image">
                </div>
                
                
                <input type="hidden" name="user_ID" value="<?php echo (isset($userDataArray['user_ID']) ? $userDataArray['user_ID'] : ''); ?>"/>

                user level: <select name="user_level">
                <option value="1">Guest</option>
                <option value="2">User</option>
                <option value="3">Admin</option>
                </select>

                <input type="submit" name="Save" value="Save"/>
                <input type="submit" name="Cancel" value="Cancel"/>            
            </form>   

            <p>
                <a href="../public/user-login.php">Home</a>
                <a href="../public/user-edit.php">Add New User</a>
            </p>

        </div>
    </body>
</html> 