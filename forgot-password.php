<?
	include "include.php";
	if($_POST['loginn'] == 'yes')
	{
		$class->begin();
		$username=$class->sql_quote($_REQUEST['username']);
		$password=md5($class->sql_quote($_REQUEST['password']));
		
		$strSql = 'SELECT * FROM users WHERE active = "1" AND   user_name = "'.$username.'" ';
		$strResult=$class->ResultSet($strSql);
		$row = $class->FetchObject($strResult);
		if($row->id != '')
		{
			$activation_code = md5($username);
			$sql = 'UPDATE users SET activation_code = "'.$activation_code.'"  WHERE user_name = "'.$username.'"';
			$class->executeQuery($sql);
			$class->commit();
			
			$m= new Mail; // create the mail
			$m->From( "info@tahir.com" );
			$m->To( $row->email );
			$m->Subject( "Forgot password" );
	
			$message= "Hi!\n Please <a href='".SITE_URL."new-password.php?active=$activation_code&user_name=$username'>Click Here</a> to reset your password.\nThanks";
			$m->Body( $message);        // set the body
			$m->Priority(1) ;        // set the priority to Low
			$m->Send(); 
			$msg = "Activation link has been sent over to your email. Please click on the link to RESET your password.";
		}
		else
			$msg = 'Sorry! No Records Found.';
	}	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ideal Posts - Forgot Password</title>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
        <script src="jq/jquery.validate.js"></script>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/style-old.css" rel="stylesheet" type="text/css" />
        
        <!-- JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        
</head>
<body>
    
    <? include "header.php";?>
    
<!--    <div id="app-menu-bar">
    	<ul id="app-menu-nav">
    		<li>Reset Password >></li>
    	</ul>
    </div> -->

    <div class="login_screen">
        <?
        	if($msg != '')
			{
				echo '<div class="alert-message error">'.$msg.'</div>';
			}
		?>
         <h2>Reset Password</h2>
        
    <form name="login" id="login" method="post">
     <div class="input-text left-marg2">User Name</div>
        <div><input type="text" name="username" id="username" class="bg-input" /></div>
       <br />
        <div class="center-text"><input type="submit" value="Get Password" class="btn primary" />  <a class="btn" href="register.php">Register</a></div>
      
      
  <input type="hidden" name="loginn" value="yes" />
  </form>
 
        
      
    </div>
 <?
	include "footer.php"; 
?>        
</body>
</html>