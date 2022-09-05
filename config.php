<?php
function OpenConnection() // Function to Open a connection, when called will will other return connection or error
 {
 $dbhost = "database-1.cdy9t5o8f6gz.us-east-1.rds.amazonaws.com";
 $dbuser = "admin";
 $dbpass = "ilovedieu!";
 $db = "database-1";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Failed to connect to database". $conn -> error);
 
 return $conn;
 }
 
/* // functoin to close connection , 
 * that takes in the connection that will be returned by the above function when called on an external file
*/
function CloseConnection($conn) 
 {
 $conn -> close();
 }
   

 function clean_input ($data){ // Function to clean form data
    $data = trim($data); // Getting rif of white spaces 
    $data = stripslashes ($data); //  removes backslashes
    $data = htmlspecialchars ($data); // converts special characters to HTML entities to prevent attackers from taking advantage of he code
    return $data; // then the data is returned
}

?>