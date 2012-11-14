<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ideal Posts</title>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/site-style.css" rel="stylesheet" type="text/css" />
        
        <!-- JavaScrip -->
        <script type="text/javascript" src="js/bootstrap-alerts.js"></script>
        <script type="text/javascript" src="js/bootstrap-buttons.js"></script>
        <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="js/bootstrap-popover.js"></script>
        <script type="text/javascript" src="js/bootstrap-scrollspy.js"></script>
        <script type="text/javascript" src="js/bootstrap-tabs.js"></script>
        <script type="text/javascript" src="js/bootstrap-twipsy.js"></script>
        
        <!-- TypeKit -->
        <script type="text/javascript" src="http://use.typekit.com/wny5hum.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body>

<? include "header.php";?> 

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Capture & Track Your Blog Ideas</h1>
        <p>We hated trying to keep track of all our blog post ideas, so we created Ideal Posts. Ideal Posts will help you track your ideas and give you a high level view of what you are working on.</p>
      </div>
      <div class="hero-img"></div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span-one-third">
          <h2>Project Management Tools Are Overkill</h2>
          <p>Your blog is fun, it’s a source of income, it’s a place to share your view of the world, whatever you blog about you need a tool that was designed for bloggers.</p>

<p>Standard project management tools are expensive and have too many features that bloggers just don’t need.</p>
          
        </div>
        <div class="span-one-third">
          <h2>An Easy Way To Track Your Ideas</h2>
           <p>Ideal Posts is a simple tool that enables you to create and track which blog posts you are working on. Finally a tool you can use to manage all your blog post ideas in one place! </p>
          
       </div>
        <div class="span-one-third register-home">
          <h2>Create An Account</h2>
          <p>Yep, it’s free!</p>
                <form name="register" method="post" action="register.php" class="form-stacked">
                <fieldset>
                	<div class="clearfix">
                		<label for="user_name">Username</label>
                	</div>
                	<div class="input">
                		<input type="text" name="user_name" id="user_name" />
                	</div>
                	
                	<div class="clearfix">
                		<label for="email">Email</label>
                	</div>
                	<div class="input">
                		<input type="text" name="email" />
                	</div>
                	
                	<div class="clearfix">
                		<label for="password">Password</label>
                	</div>
                	<div class="input">
                		<input type="password" name="password" />
                	</div>
                	
                	<div class="clearfix">
                		<label for="blog_name">Blog Name</label>
                	</div>
                	<div class="input">
                		<input type="text" name="blog_name" />
                	</div>
                </fieldset>
                <input type="submit" value="Register" class="btn primary" />
                <input type="hidden" name="loginn" value="true" />
				</form>
        </div>
      </div>


    </div> <!-- /container -->


<?
	include "footer.php"; 
?> 


</body>
</html>
