<?
	if(basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == '')
	{	$iclass='class="active"';
		$banner = 'banner_img.jpg';
	}
	elseif(basename($_SERVER['PHP_SELF']) == 'login.php')
	{
	 	$aclass='class="active"';
	}
	elseif(basename($_SERVER['PHP_SELF']) == 'my-page.php')
	{
	 	$bclass='class="active"';
	}
	
?>

<div class="topbar" data-scrollspy="scrollspy">
	<div class="topbar-inner">    
    <div class="container">
    	<a class="brand" href="/">Ideal Posts</a>

        	<ul class="nav">
            	<li <?=$iclass?>><a href="/"><span>Home</span></a></li>
            	<li <?=$bclass?>><a href="my-page.php"><span>My Ideas</span></a></li>
                <? if(!isset($_SESSION['uid'])){?>
	            	<li <?=$aclass?>><a href="login.php"><span>Sign In</span></a></li>
                <? }else{?>
                	<li><a href="login.php?logout=true"><span>Log Out</span></a></li>
                <? }?>    
            </ul>
            
            <div class="blog_title">
            	<p><?=$row_users->blog_name?></p>
            </div>
	</div>
    </div>
</div>
