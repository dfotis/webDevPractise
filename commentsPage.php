<?php
	   include 'connect.php';
       //mysqli_query($link, "DELETE FROM comments");
       $PHP_SELF = $_SERVER['PHP_SELF'];
       $comments_count = 0;
	   $result = mysqli_query($link, "SELECT * FROM comments");
       $comments_count = mysqli_num_rows($result);
	   $page_count = ceil( $comments_count / 10 );   
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="description" content="This is page is about Richard Stallman.">
        <meta name="keywords" content="rischard, stallman, computer, science, free software, programming, gnu">
        <meta name="author" content="Dilaris Fotis">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="alternate" title="english" type="text/html" hreflang="en" href="../en/home.html">

        <title>Richard Stallman</title>
		<style type="text/css">
			#post_list
			{
				list-style-type: none;
				margin: 70px 250px 0 250px;
    			padding: 0;
			}			
			#time_stampid
			{
				font-size:10px;
				color:#06F;
				margin:5px 0 5px 5px;
			}
			#commentid
			{
				font-size:20px;
				margin-bottom:5px;
				margin: 0 100px 20px 100px;
				max-width: 500px;
			}
			#emailid
			{
				margin:5px 5px 5px 5px;
				font-size:11px;
				color:#006;
			}
			#comment_box 
			{
				border: solid;
				margin: 0 0 10px 0;
			}
			#pages 
			{
				list-style-type: none;				
			}
			#page_number
			{
				float: left;
				margin: 5px;
			}			
		</style>
    </head>

    <body>

        <!-- header -->
        <header class="header">
            <div class="container">
                <h1 id="title">Richard Stallman</h1>
            </div>	 
        </header>

        <!-- navigation menu -->
        <nav>
            <div class="menu-bar">
                <div class="container">
                    <div class="menu">
                        <ul class="nav">
                            <li><a class="menu_item" href="home.php"> &Gt; Home</a></li>
                            <li><a class="menu_item" href="biographyPage.php">Biography</a></li>
                            <li><a class="menu_item" href="quotesPage.php">Quotes</a></li>
                            <li><a class="menu_item" href="humorPage.php">Humor</a></li>
							<li><a class="menu_item" href="commentsPage.php">Comments</a></li>
                        </ul>
                        <ul class="social">
                            <li><a class="social_item" href="fbPage.php"><img src="images/facebook.png" alt="fb"></a></li>
                            <li><a class="social_item" href="twitter.php"><img src="images/twitter.png" alt="twitter"></a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>

        <!-- main content area -->
        <div class="main_content">
            <form name="comment" method="post" action="submit.php" onSubmit="return validation()">
                <table width="500" border="0" cellspacing="3" cellpadding="3" style="margin:auto;">
                   <tr>
                     <td align="right" id="one">Email :<span style="color:#F00;">*</span></td>
                     <td><input type="email" name="email" id="email"></td>
                   </tr>
                   <tr>
                     <td align="right" id="one"></td>
                     <td><textarea name="comment" id="comment" required></textarea></td>
                   </tr>
                   <tr>
                     <td align="right" id="one"></td>
                     <td><input type="submit" name="submit" id="submit" value="Submit Comment"></td>
                   </tr>
                </table> 
				
		
			</ul>
				<ul id="post_list">
				<?php 
			   include 'connect.php';	
					 if( isset($_GET['page'] ) ) {
                         $page = $_GET['page'];
                         $l = 10 * $page ;
					 }else {
            		     $page = 0;
					     $l = 0;
					 }
					
				     if(is_int($l)) //Sql injection defence
				     {
					    $select = mysqli_query($link,"select * from comments order by time_stamp DESC LIMIT $l, 10");
				     } else {
						 echo '<p>Error. Wrong type of offset.<br>'; 
					 }
					while($row = mysqli_fetch_array($select)) 
					{ ?>
				        <li id="comment_box">
							<div id="comment">
							  <footer class="post_info">
							    <abbr class="time_stamp">
							  	    <?php echo "<div id='time_stampid'>".$row['time_stamp']."</div>"; ?>								
							    </abbr>
								<address>
									<?php echo "<div id='emailid'>".$row['email']."</div>"; ?>
								</address>
							  </footer>
							  <div class="comment_text">
								  <p> <?php echo "<div id='commentid'>".$row['comment']."</div>"; ?> </p>
							  </div>
							</div>
				        </li> 
				 <?php    
			  } 
					?>
			  <ul id="pages">
				<?php				
				for($x=0; $x<$page_count; $x++) { ?>
				<li id="page_number">
					<?php 
					    $page = $x;
						$p = $x +1;
						echo "<a href = \"$PHP_SELF?page=$page\">$p</a>";
					?>
				</li>
            <?php		
				}
				?>
			</ul>				
			</form>
			
        </div>


        <!-- footer -->
        <footer class="pageFooter">
            <div class="container">
                Copyleft &copy; csd_team 2015.
                The content of this website can be used for any activity for free.
            </div>
        </footer>

    </body>
</html>