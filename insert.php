<?php

/*
We want to write a query, that will insert data into our database file
Since, we want to carry out a local connection, 
we create a new mysqli function, by inserting our variables in 
the following way (hostname =>localhost, username=>root, password=>1234, databasename =>testing)

*/
$con = new mysqli("localhost", "root", "1234", "tutorial1");
/*
we want to use the PHP's json_decode funtion to collect our JSON string
from our angularjs and convert it into a PHP variable.

NOTE: the JSON data will repersent a JavaScript array or object literal, which
json_decode will convert into a PHP array or object.
*/
$data = json_decode(file_get_contents("php://input"));

/*
these are the data we want to collect 
*/
$thename = mysqli_real_escape_string($con, $data->yourname);
$theaddress = mysqli_real_escape_string($con,$data->youraddress);
$thephonenumber = mysqli_real_escape_string($con,$data->yourphonenumber);


/*
This is the query to use, in inserting our data, into our database already created
*/
$query =("INSERT INTO tablename(id, Name, Address, Phonenumber) VALUES (NULL,'$thename', '$theaddress', '$thephonenumber')");
$que = mysqli_query($con, $query);
if($que){
echo 'correct';}
else{
echo 'wrong';}

?>