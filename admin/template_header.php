<?
ob_start();

$path = 'http://ridgeproduce.com/';
?>


<div style=" background:#FF9800; margin:0px; padding:0px; font-family:'Trebuchet MS'; font-size:12px; color:#000;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
		<table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="left" valign="top" class="pad2" style="padding-bottom:10px;">
				<table width="580" border="0" cellspacing="0" cellpadding="0" class="mrg" style="margin-top:10px;">
				  <tr>
					<td width="130" align="left" valign="top">
						<a href="http://ridgeproduce.com"><img src="<?=$path?>images/logo.jpg" alt="" width="130" height="70" border="0" /></a>					</td>
					<td width="450" align="right" valign="top">
						<div id="top">
							<div id="top_nav" style="float:right; width:400px; font-size:10px; margin-top:5px;">
                             <strong style="float:left;text-align:left;font-size:12px;">531 Tiffany Street, Bronx, NY 10474<br />
                                Phone: 718-861-7555<br />
                                Fax: 718-861-7474<br />
                                Email: <a href="mailto:hal@ridgeproduce.com" style="color:#555555;" target="_blank">hal@ridgeproduce.com</a>
                                <a href="mailto:sales@ridgeproduce.com" style="color:#555555;" target="_blank"> sales@ridgeproduce.com</a><br />
								</strong>						  </div>
				  <div id="main_nav" style="float:right; width:100px; font-size:11px; font-weight:bold; margin-top:10px; ">
                            
									</div>
						</div>
					</td>
				  </tr>
				</table>
			</td>
		  </tr>
		  <tr>
			<td class="content" style="width:580px; background:#ffffff;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pad" style="padding:20px;">
				  <tr>
					
				    <td width="15" align="left" valign="top"></td>
				    <td align="left" valign="top" style=" font-size:12px; margin:0px; margin-bottom:20px;">
<?
$mail_content_header = ob_get_clean();
?>