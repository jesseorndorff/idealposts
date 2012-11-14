<?
	include "include.php";
	
	if($_REQUEST['active'] != '')
	{
		$active=($class->sql_quote($_REQUEST['active']));
		$user_name=($class->sql_quote($_REQUEST['user_name']));
		
		$strSql = 'SELECT * FROM users WHERE user_name = "'.$user_name.'" AND activation_code = "'.$active.'" ';
		$strResult=$class->ResultSet($strSql);
		$row =  $class->FetchObject($strResult);
	
		if($row->id == '')
		{
			header('location: index.php?err=17');
			die();
		}
		if($_POST['givee'] == 'yes')
		{
			$password=md5($class->sql_quote($_REQUEST['password']));
			$sql = 'UPDATE users SET password = "'.$password.'"  WHERE user_name = "'.$user_name.'"';
			$class->executeQuery($sql);
			$class->commit();
			header('location: index.php?err=19');
			die();
		}
		
	}
	else
	{
		header('location: index.php');
		die();
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ideal Posts - New Password</title>
		<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
        <script src="jq/jquery.validate.js"></script>
        
        
        <link href="css/style-old.css" rel="stylesheet" type="text/css" />
        
        <!-- JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
    
    <? include "header.php";?>
    
    <div id="app-menu-bar">
    	<ul id="app-menu-nav">
    		<li>Enter New Password >></li>
    	</ul>
    </div>

    <div class="login_screen" style="text-align:left">
        <?
        	if($msg != '')
			{
				echo '<div class="error">'.$msg.'</div>';
			}
		?>
      <h2>Enter New Password</h2>
       
<script type="text/javascript">
$().ready(function() {
		// validate signup form on keyup and submit
		$("#login").validate({
			rules: {
				password: {
					required: true,
					minlength: 6
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				}
			},
			messages: {
				password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long",
						equalTo: "Please enter the same password as above"
					}
				}
		});
	});
</script>

    <form name="login" id="login" method="post">
        <div class="input-text left-marg2">Password</div>
        <div><input type="password" name="password" id="password" class="bg-input" /></div>
        <div class="input-text left-marg2">Confirm Password</div>
        <div><input type="password" name="confirm_password" id="confirm_password" class="bg-input" /></div>
     
        <br />
        <div class="center-text"><input type="submit" value="Submit" class="btn-input" />  &nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp;&nbsp; <a href="register.php">Register</a></div>
      
    
  <input type="hidden" name="active" value="<?=$active?>" />
   <input type="hidden" name="user_name" value="<?=$user_name?>" />
  <input type="hidden" name="givee" value="yes" />
  </form>
 
    </div>
<?
	include "footer.php"; 
?>         
</body>
</html>
