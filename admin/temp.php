<?
ob_start();
$path = 'http://localhost/ridge/';
$path = 'http://projects8.com/ridge/';
?>
<html>
<body style="background: url('<?=$path?>images/bg.jpg') no-repeat center top;	font-family:'Trebuchet MS';	font-size:13px;	color:#000000;	line-height:18px;">

<div id="wrapper" style="width:980px;margin:0px auto;">
	<div id="logo" style="margin-left:15px;position:absolute;z-index:-10;">
		<a href="#"><img src="<?=$path?>images/logo.jpg" alt="" border="0" /></a>	</div>
	<div id="top_inner" style="width:972px;	height:72px;padding-top:8px;">
		<div id="top_nav" style="float:right;width:100%;text-align:right;font-size:11px;margin-top:12px;"></div>
		<div id="main_nav" style="float:right;	width:100%;text-align:right;font-size:13px;font-weight:bold;margin-top:10px;"></div>
  </div>
	
    
    <div id="content_inner" style="width:980px;margin-top:15px;color:#555555;margin-bottom:10px;">
			
            <div id="inner_head" style="background:url('<?=$path?>images/inner_head.png') no-repeat;width:980px;height:110px;text-align:right;">
              <h1 style="font-size:30px;font-family:'Arial Narrow';color:#FFFFFF;font-weight:normal;margin-right:40px;line-height:90px;"> Ridge Produce Email Template</h1>
      		</div>
    		<div style="background-color:#ffffff;width:962px;margin-left:8px">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                 
                    <td width="970" align="left" valign="top">
                    
                    <div class="gen_mar" style="margin:-10px 40px 20px 30px;">
                    <p>                    Ridge Produce, located in the south Bronx, New York City supplies fruit and vegetables to several 
                    hundred restaurants and is also the produce supplier for a growing number of restaurants in Northern New Jersey and New York City's surrounding communities. 
                    </p>
                    <p>Owners Hal Burdo and Alfred Alfonso proudly describe their company as <span class="mail_link">"just the right fit"</span> for helping restaurants manage food costs and taking care of restaurant supply needs with the highest standard of service.</p>                    
                    
                        </div></td>
                  </tr>
                </table>

            </div>        
            <img src="<?=$path?>images/inner_btm.png" alt="" />
    </div>
    
    
    <div class="bg_btm" style="background:url('<?=$path?>images/bg_bottom.jpg') no-repeat;width:974px;height:64px;margin-top:6px;">
		<div class="copy_r" style="float:right;	font-size:12px;	color:#555555;	margin:25px 25px 0px 0px;">© 2010 <span>Ridge Produce.</span> All rights reserved.</div>
		<div class="btm_nav" style="font-size:12px;color:#555555;padding:25px 0px 0px 20px;"></div>
  </div>
</div>

</div>

<?
$mail_content = ob_get_clean();
?>