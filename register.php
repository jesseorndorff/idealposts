<?
	include "include.php";
	if($_REQUEST['logout'] == 'true')
		session_destroy();
	if($_POST['loginn'] == 'true')
	{
		$user_name=$class->sql_quote($_REQUEST['user_name']);
		$email=$class->sql_quote($_REQUEST['email']);
		$blog_name=$class->sql_quote($_REQUEST['blog_name']);
		$password=md5($class->sql_quote($_REQUEST['password']));
		if($class->isThere("email","users","email='".$email."'")){
			$msg="Email '$email' is already exists in our database";
		}
		if($class->isThere("user_name","users","user_name='".$user_name."'")){
			$msg="User Name '$user_name' is already exists in our database";
		}
		if($msg==''){
		
			$query="INSERT INTO users(id,user_name,blog_name,email,password,active)
								VALUES('','$user_name','$blog_name','$email','$password','1')";
		
			if($class->executeQuery($query)==false) $bool=true;
			
			//die('asa');
			if($bool==true){
				$class->rollback();
				
			}else{
				
				$class->commit();
				
				$_SESSION['uid'] = $class->getMaximum('id','users');
				header('location: my-page.php');
				die();
			}//end of ifmsg = 'o yeah baby';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ideal Posts - Register</title>

       <script type="text/javascript">
  var uvOptions = {};
  (function() {
    var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/03W2DspWKJlDcWx2eEkSw.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
  })();
		</script>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/style-old.css" rel="stylesheet" type="text/css" />
        
        <!-- JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
    
    <? include "header.php";?>
    
<!--    <div id="app-menu-bar">
    	<ul id="app-menu-nav">
    		<li>Register >></li>
    	</ul>
    </div> -->

    <div class="account-box" style="margin:auto">
        <?
        	if($msg != '')
			{
				echo '<div class="alert-message error">'.$msg.'</div>';
			}
		?>
		
		<h2>Create An Account</h2>
		
		        
        <form name="register" id="register" method="post">
        <div class="input-text left-marg2">User Name</div>
        <div><input type="text" name="user_name" id="user_name" class="bg-input" /></div>
        <div class="input-text left-marg2">Email</div>
        <div><input type="text" name="email" id="email" class="bg-input" /></div>
        <div class="input-text left-marg2">Password</div>
        <div><input type="password" name="password" id="password" class="bg-input" /></div>
        <div class="input-text left-marg2">Blog Name</div>
        <div><input type="text" name="blog_name" id="blog_name" class="bg-input" /></div>
        <br />
        <div class="center-text"><input type="submit" value="Register" class="btn primary" /></div>
        <input type="hidden" name="loginn" value="true" />    
        <input type="hidden" name="loginn" value="true" />
        </form> 
    
    </div>
    
    
     
<?
	include "footer.php"; 
?>     
</body>
</html>