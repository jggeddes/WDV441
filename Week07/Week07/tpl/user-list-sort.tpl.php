<html>
    <body>
        <div>Users - <a href="../public/user-edit.php">Add New user</a></div>        
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search: 
                <select name="filterColumn">
                    <option value="username">username</option>
                    <option value="user_password">password</option>                  
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>
		<div>
            <table border="1">
                <tr>
                    <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=DESC">D</a></th>
                    <th>Password&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_password&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=user_password&sortDirection=DESC">D</a></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($userList as $userData) 
                { ?>
                    <tr>
                        <td><?php echo $userData['username']; ?></td>                
                        <td><?php echo $userData['user_password']; ?></td>                
                        <td><a href="../public/user-edit.php?user_ID=<?php echo $userData['user_ID']; ?>">Edit</a></td>
                        <td><a href="../public/user-view.php?user_ID=<?php echo $userData['user_ID']; ?>">View</a></td>
                            
                    </tr>
                <?php } ?>                
            </table>
        </div>
    </body>
</html>