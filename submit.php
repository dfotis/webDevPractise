<?php
include 'connect.php';
date_default_timezone_set('Asia/Jakarta');
			    if(isset($_POST['submit']))
				{					
					echo 'DONE';
					$timestamp=date('Y-m-d H:i:s', time());
					$email = mysql_real_escape_string($_POST['email']);
					$comment = mysql_real_escape_string($_POST['comment']);
					$insert = mysqli_query($link, "insert into comments (time_stamp,email,comment) values('$timestamp', '$email' ,'$comment')") or die(mysql_error());
					header("Location:commentsPage.php");										
				}
?>