<?
	include "include.php";
	
	if($_REQUEST['logout'] == 'true')
	{
		session_destroy();
		header('location: login.php');
		die();
	}	
	if($_POST['loginn'] == 'true')
	{
		$username=$class->sql_quote($_REQUEST['username']);
		$password=md5($class->sql_quote($_REQUEST['password']));
		$query_users="SELECT * FROM users WHERE user_name = '$username' AND password = '$password' AND active = '1'";
		$result_users=$class->ResultSet($query_users);
		 
		if(mysql_num_rows($result_users) > 0){
			$row_users=$class->FetchObject($result_users);
			$_SESSION['uid'] = $row_users->id;
			header('location: my-page.php');
			die();
		}
		else
		{
			$msg = 'Invalid Username and Password!';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ideal Posts - Login</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/style-old.css" rel="stylesheet" type="text/css" />
        
        <!-- JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
  var uvOptions = {};
  (function() {
    var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/03W2DspWKJlDcWx2eEkSw.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
  })();
		</script>
</head>
<body>
    
 
<? include "header.php";?>
<!-- <div id="app-menu-bar">
    	<ul id="app-menu-nav">
    		<li>Login >></li>
    	</ul>
</div> -->
<div class="container">
    <div class="account-box">
        <?
        	if($msg != '')
			{
				echo '<div class="alert-message error">'.$msg.'</div>';
			}
		?>
		
		<h2>Login</h2>
		<form name="login" id="login" method="post">
         <div class="input-text left-marg2">User Name</div>
        <div><input type="text" name="username" id="username" class="bg-input" /></div>
        <div class="input-text left-marg2">Password</div>
        <div><input type="password" name="password" id="password" class="bg-input" /></div>
        <br />
        <div class="center-text"><input type="submit" value="Login" class="btn primary" /> <a class="btn" href="register.php">Register</a></div>
            
        <input type="hidden" name="loginn" value="true" />
        </form>
		<a href="/forgot-password">Forgot your password? »</a>
    </div>
</div>    
     
     <script type="text/javascript" src="js/inettuts.js"></script>
<?
	include "footer.php"; 
?>     
</body>
</html>