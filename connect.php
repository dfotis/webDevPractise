<?php

    $link = mysqli_connect("localhost","root","123456","Comments");

  if (mysqli_connect_errno()) {
    echo '<p>Error connecting to the database <br>'. mysqli_connect_error();  
    echo 'Please try again.</p>';
    //exit(); 
  } else {
	//echo 'OK!';
  }
/*

  $result = mysql_select_db("Comments", $link);

  if (!$result) {
    echo '<p>Error selecting database table <br>';  
    echo 'Please try again.</p>';
    //exit(); 
  } else {
	//echo 'OK!!';
  }
*/


?>