<?php

//session_start();

// class to handle interaction with the user table

/*
class user {
    var $username = "";
    var $user_password = "";
    var $usernameErr = "";
    var $user_passwordErr = "";
	
    // property to hold our data from our user
    var $userData = array();
    // property to hold errors
    var $errors = array();
    // property for holding a reference to a database connection so we can reuse it
    var $db = null;
    function __construct() {
        // create a connection to our database
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2021;charset=utf8', 'wdv441_user', 'wdv441_2021');           
    }
    
    // takes a keyed array and sets our internal data representation to the array
    function set($dataArray) {
        $this->userData = $dataArray;
        var_dump($this->userData, "test");
    }
    // santize the data in the passed array, return the array
    function sanitize($dataArray) {
        // sanitize data based on rules
        //$this->$dataArray = filter_var($dataArray, FILTER_SANITIZE_STRING);
        $this->userData = $dataArray;
        $this->username = filter_var($this->username, FILTER_SANITIZE_STRING);
        $this->user_password = filter_var($this->user_password, FILTER_SANITIZE_STRING);
        
        return $dataArray;
        //die();
    }
    
    // load a news user based on an id
    function load($user_ID) {
        // flag to track if the user was loaded
        $isLoaded = false;
        // load from database
        // create a prepared statement (secure programming)
        $stmt = $this->db->prepare("SELECT * FROM user WHERE user_ID = ?");
        
        // execute the prepared statement passing in the id of the user we 
        // want to load
        $stmt->execute(array($user_ID));
        // check to see if we loaded the user
        if ($stmt->rowCount() == 1) {
            // if we did load the user, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            
            // set the data to our internal property            
            $this->set($dataArray);
                        
            // set the success flag to true
            $isLoaded = true;
        }
        
        //var_dump($stmt->rowCount());
        
        // return success or failure
        return $isLoaded;
    }
    
    // save a news user (inserts and updates)
       
    // validate the data we have stored in the data property
    function validate() {
        // flag as true initially
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in userData property
        if (empty($this->userData['username']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['username'] = "Please enter a valid username";
            $this->usernameErr = "Please enter a valid username";
            $isValid = false;
        } 
        
        if (empty($this->userData['user_password']))
        {
            // if not valid, set an error and flag as not valid
            $this->errors['user_password'] = "Please enter a valid password";
            $this->user_passwordErr = "Please enter a valid password";
            $isValid = false;
        } 
                        
        // return valid t/f
        return $isValid;
        //die();
    }
    function save() {
        // create a flag to track if the save was successful
        $isSaved = false;
        
        // determine if insert or update based on userID
        // save data from userData property to database
        if (empty($this->userData['user_ID'])) {
            // create a prepared statement to insert data into the table
            $stmt = $this->db->prepare(
                "INSERT INTO user 
                    (username, user_password, user_level) 
                 VALUES (?, ?, ?)");
            // execute the insert statement, passing in the data to insert
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['user_password'],
                    $this->userData['user_level']
                )
            );
            
            // if the execute returned true, then store the new id back into our 
            // data property
            if ($isSaved) {
                $this->userData['user_ID'] = $this->db->lastInsertId();
            }
        } else { 
			// if this is an update of an existing record, create a prepared update 
			// statement
            $stmt = $this->db->prepare(
                "UPDATE user SET 
                    username = ?,
                    user_password = ?,
                    user_level = ?
                WHERE user_ID = ?"
            );
                    
            // execute the update statement, passing in the data to update
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['user_password'],
                    $this->userData['user_level'],
                    $this->userData['user_ID']
                )
            );            
        }
                        
        // return the success flage
        return $isSaved;
    }
    // function getusers(){
    //     $userList = ("SELECT * FROM user");
    //     global $stmt;
    //     $stmt = $this->db->prepare($userList);
    //     $stmt->execute();
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // }
    
    // get a list of news users as an array
    function getList() {
        $userList = array();
        // TO DO: get the news users and store into $userList
        $sql = ("SELECT * FROM user");
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $userList = $stmt->fetchALL(PDO::FETCH_ASSOC);
        }
        // return the list of users
        return $userList;      
    }
    function getListFiltered($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null) {
        $userList = array();
        
        $sql = "SELECT * FROM user ";
        if (!is_null($filterColumn) && !is_null($filterText)) {
            //$sql .= " WHERE " . $filterColumn . " LIKE '%?%'";
			$sql .= " WHERE " . $filterColumn . " LIKE ?";
        }
        
        if (!is_null($sortColumn)) {
            $sql .= " ORDER BY " . $sortColumn;
            
            if (!is_null($sortDirection)) {
                $sql .= " " . $sortDirection;
            }
        }
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt) {
            $stmt->execute(array('%' . $filterText . '%'));
            
            $userList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                
        return $userList;        
    }
    
     // hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        //$passwordHash = password_hash($passwordToHash, PASSWORD_BCRYPT);        
        $passwordHash = hash("sha256", $passwordToHash);        
        return $passwordHash;
    }
    function userLogin($username, $user_password) {
        $user_ID = null;
        
        $user_password = $this->hashPassword($user_password);
        
        // build the SQL to check for the user
        $userCheckSQL = "SELECT user_ID FROM " . $this->tableName . 
            " WHERE username = ? AND user_password = ?";
        
        $stmt = $this->db->prepare($userCheckSQL);
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($username, $user_password));
        
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_ID = $dataArray['user_ID'];
            $_SESSION['user'] = $user_ID;
            //var_dump($_SESSION['user']);die;
        }else{
            echo('please try again');
            header("Refresh: 2; URL=user-login.php"); 
        }
        
        return $user_ID;
    }
    function saveImage($fileArray) {
        move_uploaded_file($fileArray['tmp_name'], dirname(__FILE__) . 
                "/../public/images/" . $this->userData['user_ID'] . "_user.jpg");
    }
        
}
*/

require_once('base.class.php');

class user extends base {

    var $username = "";
    var $user_password = "";

    var $usernameErr = "";
    var $user_passwordErr = "";

    var $tableName = "user";
    // keyfield of the table
    var $keyField = "user_ID";
    // column names minus the keyword in the table
    var $columnNames = array(
        "username",
        "user_password",
        "user_level"
    );
    
    function validate() {
        
        $isValid = parent::validate();
        
        if ($isValid) {
            // validate the data elements in userData property
            if (empty($this->data['username']))
            {
                // if not valid, set an error and flag as not valid
                $this->errors['username'] = "Please enter a username";
                $this->usernameErr = "Please enter a valid username";
                $isValid = false;
            }  
            
            if (empty($this->data['user_password']))
            {
                // if not valid, set an error and flag as not valid
                $this->errors['user_password'] = "Please enter a password";
                $this->user_passwordErr = "Please enter a valid password";
                $isValid = false;
            }  
            
            // if new record, make sure we have a password            
            if (!isset($this->data[$this->keyField]) || $this->data[$this->keyField] == 0) {
                if (empty($this->data['user_password'])) {
                    $this->errors['user_password'] = "Please enter a password";
                    $isValid = false;
                }
            }
        }
                
        return $isValid;
    }    

    function load($id) {
        $isLoaded = false;

        // load from database                
        $stmt = $this->db->prepare("SELECT * FROM " . 
            $this->tableName . " WHERE " . $this->keyField . " = ?");
        
        $stmt->execute(array($id));

        if ($stmt->rowCount() == 1) {
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            $this->set($dataArray);
            
            $isLoaded = true;
        }
        
        return $isLoaded;
    }
    
    function set($dataArray) {
        
        //var_dump($dataArray);
        
        if (isset($dataArray['user_password']) && !empty($dataArray['user_password']) && strlen($dataArray['user_password']) < 64) {
            $dataArray['user_password'] = $this->hashPassword($dataArray['user_password']);
        } 
        
        parent::set($dataArray);
        
        var_dump($this->data);
        //die;        
    }   

    // hash the passed in password and return the hash
    function hashPassword($passwordToHash) {
        //$passwordHash = password_hash($passwordToHash, PASSWORD_BCRYPT);        
        $passwordHash = hash("sha256", $passwordToHash);        
        return $passwordHash;
    }

    function userLogin($username, $user_password) {
        $user_ID = null;
        
        $user_password = $this->hashPassword($user_password);
        
        // build the SQL to check for the user
        $userCheckSQL = "SELECT user_ID FROM " . $this->tableName . 
            " WHERE username = ? AND user_password = ?";
        
        $stmt = $this->db->prepare($userCheckSQL);
        
        // execute the prepared statement passing in the id of the article we 
        // want to load
        $stmt->execute(array($username, $user_password));
        
        if ($stmt->rowCount() == 1) 
        {
            // if we did load the article, fetch the data as a keyed array
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_ID = $dataArray['user_ID'];

            // store the user ID into a session variable
            $_SESSION['user'] = $user_ID;
            //var_dump($_SESSION['user']);die;
        }else{
            echo('please try again');
            header("Refresh: 2; URL=user-login.php"); 
        }
        
        return $user_ID;
    }

    function saveImage($fileArray) {
        move_uploaded_file($fileArray['tmp_name'], dirname(__FILE__) . 
                "/../public/images/" . $this->userData['user_ID'] . "_user.jpg");
    }
}

?>