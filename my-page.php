<?
	include "include.php";
	if(!isset($_SESSION['uid']))
	{
		header('location: /login');
		die();
	}
	$query_users="SELECT * FROM users WHERE id = '$_SESSION[uid]' AND active = '1'";
	$result_users=$class->ResultSet($query_users);
	 
	if(mysql_num_rows($result_users) > 0){
		$row_users=$class->FetchObject($result_users);
		
	}
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>The Ideal Posts App</title>
        <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
    	<script type="text/javascript" src="js/jquery-ui-personalized-1.6rc2.min.js"></script>
   
	<script type="text/javascript">
		 function Add() {
          var i=1;
          while ($("#widget"+i).length>0) i++;
          iNettuts.addWidget("#column1", {
            id: "widget"+i,
            color: "color-white",
            title: "Idea #"+i
          })
        }
	</script>
	        <?php /*?><script type="text/javascript">
  var uvOptions = {};
  (function() {
    var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/03W2DspWKJlDcWx2eEkSw.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
  })();
		</script><?php */?>
		
						
        <link href="css/style-old.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        
        <!-- JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
  
<? include "header.php";?>
    
<div class="container holder">
    
    <div id="app-menu-bar">
    	<ul id="app-menu-nav">
    		<li><a href="#" class="btn primary" onclick="Add();">Add New Idea</a></li>
    	</ul>
    	<ul id="app-menu-nav-left">
    		<li><a href="login.php?logout=true" class="btn danger">Logout</a></li>
    	</ul>
    	

    </div>
    
    <div class="clear"></div>
    
	<div id="columns2">
        
        <div class="column2">
        <div class="column-header">
        	<h2>Post Ideas</h2>
        </div>
            
        </div>

        <div class="column2">
        <div class="column-header">
        	<h2>Posts in Progress</h2>
        </div>
        </div>
        
        <div class="column2">
        <div class="column-header">
        	<h2>Completed Posts</h2>
        </div>
        </div>
        
    </div>
    <div id="columns">
        
        <ul id="column1" class="column">
        </ul>

        <ul id="column2" class="column">
        </ul>
        
        <ul id="column3" class="column">
        </ul>
    </div>

</div>
 
     <script type="text/javascript" src="js/inettuts.js"></script>
<?
	include "footer.php"; 
?> 
</body>
</html>