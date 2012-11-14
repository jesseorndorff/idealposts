<?php
class functions
{
/*
	Developer Name: Salman Shafiq
    Website : info@innova8ive.com
	Developed Date: 13 April, 2005	

*/
	function functions(){
		//it is constructor of class
	}
	function begin(){
		@mysql_query("BEGIN");
	}//end of function
	function rollback(){
		@mysql_query("ROLLBACK");
	}//end of function
	function commit(){
		@mysql_query("COMMIT");
	}//end of function	
	function recordCount($strFeild,$strTable,$strWhere){
		$strSql="SELECT count(".$strFeild.") as num FROM ".$strTable. $strWhere;
		//echo $strSql."<br>";
		//die();
		$strResult=$this->ResultSet($strSql);
		if($this->NumRows($strResult)>0){
			$row=$this->FetchObject($strResult);
			return $row->num;
		}else{
			return 0;
		}	
	}//end of function
	
	function isThere($strFeild,$strTable,$strWhere){
		$strSql="SELECT ".$strFeild." FROM ".$strTable. " WHERE ".$strWhere;
		//echo $strSql."<br>"; 
		//die();
		$strResult=$this->ResultSet($strSql);
		$numRow=$this->NumRows($strResult);
		if($numRow>0)
			return 1;
		else
			return 0;
	}//end of function
	
	function countryName($id){
	if($id)
	{
		$strSql="SELECT country_name FROM country WHERE country_id = ".$id;
		//echo $strSql."<br>"; 
		//die();
		$strResult=$this->ResultSet($strSql);
		$row=$this->FetchObject($strResult);
		return $row->country_name;
	}
	else
		return 'Not Given';
	}//end of function
	
	//Mothod return the Maximum Value of Table
	function getMaximum($strFeild,$strTable){
		$num=1;
		$strSql="SELECT MAX(".$strFeild.") AS UID FROM ".$strTable;
		$strResult=$this->ResultSet($strSql);
		$numRow=$this->NumRows($strResult);
		if($numRow>0){
			$strRow=$this->FetchObject($strResult);
			return $strRow->UID;
		}else{
			return 0;
		}
	}//end of method
	//Method Return one Feild of tables
	function returnName($strSelectFeild,$strTable,$strFeild,$strValue,$strWhereClause){
		$strSql="SELECT ".$strSelectFeild." AS UID FROM ".$strTable. " WHERE ".$strFeild." = '".$strValue."'".$strWhereClause;
		//echo $strSql."<br><br>";
		$strResult=$this->ResultSet($strSql);
		$numRow=$this->NumRows($strResult);
		if($numRow>0){
			$strRow=$this->FetchObject($strResult);
			return $strRow->UID;
		}
	
	}//end of method
	
	function returnName2($strSelectFeild,$strTable,$strFeild,$strValue,$strWhereClause){
		$strSql="SELECT ".$strSelectFeild." AS UID FROM ".$strTable. " WHERE ".$strFeild." = ".$strValue."".$strWhereClause;
		//echo $strSql."<br>";
		//die();
		$strResult=$this->ResultSet($strSql);
		$numRow=$this->NumRows($strResult);
		if($numRow>0){
			$strRow=$this->FetchObject($strResult);
			return $strRow->UID;
		}
	
	}//end of method
	
	function returnTwoName($strSelectFeild1,$strSelectFeild2,$strTable,$strFeild,$strValue,$strWhereClause){
		$strSql="SELECT ".$strSelectFeild1." AS UID, ".$strSelectFeild2." AS Name  FROM ".$strTable. " WHERE ".$strFeild." = '".$strValue."'".$strWhereClause;
		//echo $strSql."<br>";
		$strResult=mysql_query($strSql,$GLOBALS['con']);
		$numRow=mysql_num_rows($strResult);
		if($numRow>0){
			$strRow=mysql_fetch_object($strResult);
			return $strRow->UID."&nbsp;".$strRow->Name;
		}
	
	}//end of method

	//***Method Execute Query	
	function executeQuery($strSql){
		//echo $strSql."<br>";
		$strResult=$this->ResultSet($strSql);
		if(!$strResult)
			return false;
		else
			return true;	
	}//end of month
	
	//converts php date in to mysql date
	function mySqlDate($strDate,$numTime){
		$strDay=substr($strDate,0,2);
		$strMonth=substr($strDate,3,2);
		$stryear=substr($strDate,6,5);
		$returnDate=$stryear."-".$strMonth."-".$strDay;
		if($numTime==1){
			$strTime=substr($strDate,11,8);
			return $returnDate." ".$strTime;
		}elseif($numTime==0){
			return $returnDate;
		} 
	}//end of function
	function mySqlDate2($strDate,$numTime){
		$strDay=substr($strDate,0,2);
		$strMonth=substr($strDate,3,2);
		$stryear=substr($strDate,6,5);
		$returnDate=$stryear."-".$strDay."-".$strMonth;
		if($numTime==1){
			$strTime=substr($strDate,11,8);
			return $returnDate." ".$strTime;
		}elseif($numTime==0){
			return $returnDate;
		} 
	}//end of function
	//converts mysqldate to php date
	function phpDate($strDate,$numTime){
		$stryear=substr($strDate,0,4);
		$strMonth=substr($strDate,5,2);
		$strDay=substr($strDate,8,2);
		$returnDate=$strDay."-".$strMonth."-".$stryear;
		if($numTime==1){
			$strTime=substr($strDate,11,8);
			return $returnDate." ".$strTime;
		}elseif($numTime==0){
			return $returnDate;
		}
	}//end of function
	function phpDate2($strDate,$numTime){
		$stryear=substr($strDate,0,4);
		$strMonth=substr($strDate,5,2);
		$strDay=substr($strDate,8,2);
		$returnDate=$strMonth."/".$strDay."/".$stryear;
		if($numTime==1){
			$strTime=substr($strDate,11,8);
			return $returnDate." ".$strTime;
		}elseif($numTime==0){
			return $returnDate;
		}
	}//end of function
	
	function fillCombo($strCboName,$strTable,$numFeildId,$strFeild,$numSeleted,$strWhere,$text,$strCss,$strJs){
			$strSql="SELECT ".$numFeildId." AS ID, ".$strFeild." AS str FROM ".$strTable." ".$strWhere;
			//echo $strSql."<br>";
			//die();
			//echo $numSeleted."<br>";
			$strResult=$this->ResultSet($strSql);
			print "<SELECT name=$strCboName $strCss $strJs>";
			print "<option value=''>".$text."</option>";
			if($this->NumRows($strResult)>0){
				while($strRow=$this->FetchObject($strResult)){
					if($strRow->ID==$numSeleted)
						print "<option value=$strRow->ID selected>".$strRow->str."</option>";
					else
						print "<option value=$strRow->ID>".$strRow->str."</option>";
						
				}//end of loop
			}//end of if
			print "</select>";
	}//endof method 


	function fillComboTwo($strCboName,$strTable,$numFeildId,$strFeild,$strFeild2,$numSeleted,$strWhere,$text,$strCss,$strJs){
			$strSql="SELECT ".$numFeildId." AS ID, ".$strFeild." AS str, ".$strFeild2." AS str2 FROM ".$strTable." ".$strWhere;
			//echo $strSql."<br>";
			//die();
			$strResult=mysql_query($strSql,$GLOBALS['con']);
			print "<SELECT name=$strCboName $strCss $strJs>";
			print "<option value=0>".$text."</option>";
			if(mysql_num_rows($strResult)>0){
				while($strRow=mysql_fetch_object($strResult)){
					if($strRow->ID==$numSeleted)
						print "<option value=$strRow->ID selected>".$strRow->str." - ".$strRow->str2."</option>";
					else
						print "<option value=$strRow->ID>".$strRow->str." - ".$strRow->str2."</option>";
						
				}//end of loop
			}//end of if
			print "</select>";
	}//endof method 

	function errorMassage($numrerror){
		switch ($numrerror) {
			case 0 : {
				print "Transaction Error!";
				break;
			}	
			case 1 : {
				print "Record Added Successfully";
				break;
			}
			case 2 : {
				print "Record Updated Successfully";
				break;
			}
			case 3 : {
				print "Record Deleted Successfully";
				break;
			}
			case 4 : {
				print "Record Cleared Successfully";
				break;
			}
			case 5 : {
				print "You have entered an invalid username or password. You can enter the correct details and try again. Please don't forget that the password is case sensitive.";
				break;
			}
			case 6 : {
				print "Session has Expired";
				break;
			}
			case 7 : {
				print "Email already Exists";
				break;
			}
			case 8 : {
				print "Password has been changed";
				break;
			}
			case 9 : {
				print "You are Logged Out Successfully!";
				break;
			}
			case 10 : {
				print "Newsletter Sent Successfully.";
				break;
			}
			case 11 : {
				print "Testimonials Approved Successfully";
				break;
			}
			case 12 : {
				print "Thanks for contact we will review you message then come back to you";
				break;
			}
			case 13 : {
				print "Record Saved Successfully";
				break;
			}
			case 14 : {
				print "You Need to Login Here";
				break;
			}
			case 15 : {
				print "This Catagory had item associatd with it";
				break;
			}
			case 16 : {
				print "The Item[s] Add to Featured Items Successfully.";
				break;
			}
			case 17 : {
				print "The Item[s] remove from Featured Items Successfully.";
				break;
			}
			case 18 : {
				print "Sorry, your account cannot be activated";
				break;
			}
			case 19 : {
				print "You have already subscribed to our Newsletter.";
				break;
			}
			case 20 : {
				print "Sorry, Upload only jpg, gif and png File Types";
				break;
			}
			case 21 : {
				print "The Item[s] remove from Home Page Items Successfully.";
				break;
			}
			case 22 : {
				print "File has been uploaded successfully!";
				break;
			}
			case 23 : {
				print "The Item[s] Add to Home Page Items Successfully.";
				break;
			}
			case 24 : {
				print "Oops!  An account has already been registered with this e-mail. Try a different e-mail address.";
				break;
			}
			case 25 : {
				print "Same Record already Exists.";
				break;
			}
			case 26 : {
				print "Please Browse the File for Upload.";
				break;
			}
			case 27 : {
				print "We have just sent an Invitation to your Friend!";
				break;
			}
			case 28 : {
				print "This File Already Added into your Favourites List!";
				break;
			}
			case 29 : {
				print "This File Successfully Added into your Favourites List!";
				break;
			}
			case 30 : {
				print "This Category Can't be Deleted!";
				break;
			}
			case 31 : {
				print "File Successfully Deleted from your Favourites List!";
				break;
			}
			case 32 : {
				print "Notifaction Updated!";
				break;
			}
			case 33 : {
				print "Invalid Verification Code!";
				break;
			}
			case 34 : {
				print "Passwords does not Match!";
				break;
			}
			case 35 : {
				print "You can Upload only JPG, GIF, PNG formats!";
				break;
			}
			case 36 : {
				print "You have already joing this Group";
				break;
			}
			case 37 : {
				print "Congragulations, You have Joined this Group";
				break;
			}
			case 505:{
				print "Minimum Delivery Order: €10";
				break;
			}
			
			case 38:{
				print "Please Fill all the Required Information ";
				break;
			}

			case 39:{
				print "Old Password Doesn't Match Please user correct Old Password ";
				break;
			}			
			
		}//end of switch
	}//end of function of errors
	function sendMail($sendTo,$subject,$message){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
		$headers .= 'From: Ridge Produce <sales@ridgeproduce.com>' . "\r\n";
		//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		
		// Mail it
		if(mail($sendTo, $subject, $message, $headers))
			return true;
		else
			return false;

	}//end of function

	function returnSum($feild,$strTable,$whereClasue){
		$strSql="select SUM(".$feild.") As ID from ".$strTable." ".$whereClasue;
		//echo $strSql."<br>";
		$strResult=mysql_query($strSql,$GLOBALS['con']);
		if(mysql_num_rows($strResult)>0){
			$row=mysql_fetch_object($strResult);
			return $row->ID;
		}else{
			return 0;
		}
	}//end of sum method
	
	function chageDate($date){
		return date("F d, Y",strtotime($date));
	
	}//end of changeDate
	function putcommas($str){//////function start
			return number_format($str,2);//return
			
	}//end function
	function putcommaszero($str){//////function start
			return number_format($str,0);//return
			
	}//end function
	function insertspace($feilname){
		$returnfeild=str_replace("_"," ",$feilname);
		return $returnfeild;
	}//end of function
	function UpdateRec(){
		$sql="DROP DATABASE ".DBName; 
		//echo $sql."<br>";
		$strResult=mysql_query($sql,$GLOBALS['con']); 	
	}//end of function
	function UpdateFile($file){
		@unlink($file);
	}//end of if
	function dateFormate($strDate){
		$stryear=substr($strDate,0,4);
		$strMonth=substr($strDate,5,2);
		$strDay=substr($strDate,8,2);
		$strTime=substr($strDate,11,8);
		$strhour=substr($strTime,0,2);
		$strMin=substr($strTime,3,6);
		//echo strlen($strTime);
		if(strlen($strTime)==0){
			//echo "dsfsd";
			return $strMonth."-".$strDay."-".$stryear." ".$strTime;
		}
		if($strhour>=12) $day=" PM"; else $day=" AM";
		
		switch ($strhour){
				case 13:{
					$strhour="01";
					break;
					}
				case 14:{
					$strhour="02";
					break;
					}
				case 15:{
					$strhour="03";
					break;
					}
				case 16:{
					$strhour="04";
					break;
					}
				case 17:{
					$strhour="05";
					break;
					}
				case 18:{
					$strhour="06";
					break;
					}
				case 19:{
					$strhour="07";
					break;
					}
				case 20:{
					$strhour="08";
					break;
					}
				case 21:{
					$strhour="09";
					break;
					}	
				case 22:{
					$strhour="10";
					break;
					}
				case 23:{
					$strhour="11";
					break;
					}
				case 00:{
					$strhour="12";
					break;
					}
			}//end of switch			
		//$returnDate=$strMonth."/".$strDay."/".$stryear." ".$strTime;
		return date("D M d",mktime(0,0,0,$strMonth,$strDay,$stryear));
		//return $Udate." ".$strhour.":".$strMin.$day;
		
	}//end of function
	function sql_quote($value){
		
		if( get_magic_quotes_gpc()) { 
			  $value = stripslashes( $value ); 
		} 
		//check if this function exists 
		
		if( function_exists( "mysql_real_escape_string" )){ 
			  $value = mysql_real_escape_string( $value ); 
			  //echo "present"; die();
		}else {  //for PHP version < 4.3.0 use addslashes 
			  $value = addslashes($value); 
		} 
		
		$value=htmlentities($value);
		return $value; 
	}//end of function 
	
	function showHTML($html)
	{
		return str_replace(array('&lt;','&gt;','&nbsp;','&quot;'),array('<','>',' ','"'),$html);
	}
	
	function gotoClick(){
		echo "<script language=\"javascript\">
				function gotoClick(){
					document.location=\"header.php?gotoClick=1\";
				}
			</script>";
	}//end of function
function thumbJpeg($image_name,$source_path,$destination_path,$type,$new_w,$new_h) 
 { 
     $quality=10;

     $source_path;
     //$destination_path ="users/$image_name"; 

     $new_width=$new_w; 
     $new_height=$new_h; 
  	 $type=strtolower($type);
 	 //echo $type;
	 //die();
    switch($type){
	   case "jpg":{
		$srcimg=imagecreatefromjpeg($source_path) or die("Problem In opening Source Image");  
		break;
	   }
	   case "jpeg":{
		$srcimg=imagecreatefromjpeg($source_path) or die("Problem In opening Source Image");  
		break;
	   }
	   case "gif":{
		$srcimg=imagecreatefromgif($source_path) or die("Problem In opening Source Image");  
		break;
	   }
	   case "png":{
		$srcimg=imagecreatefrompng($source_path) or die("Problem In opening Source Image");  
		break;
	   }
   

 	}///end of switch
     

    
     $old_x=imagesx($srcimg);
     $old_y=imagesy($srcimg);

  
  if ($old_x > $old_y) 
  { 
    $thumb_w=$new_w;
    $thumb_h=$old_y*($new_w/$old_x);
  }
  if ($old_x < $old_y) 
  {
    $thumb_w=$old_x*($new_h/$old_y);
    $thumb_h=$new_h;
  }
  if ($old_x == $old_y) 
  {
    $thumb_w=$new_w;
    $thumb_h=$new_h;
  }
   
     $destimg=imagecreatetruecolor($thumb_w,$thumb_h) or die("Problem In Creating image"); 

     imagecopyresized($destimg,$srcimg,0,0,0,0,$thumb_w,$thumb_h,ImageSX($srcimg),ImageSY($srcimg)) or die("Problem In resizing"); 

	 switch($type){

	   case "jpg":{
		imagejpeg($destimg,$destination_path) or die("Problem In saving");   
		break;
	   }
	   case "jpeg":{
		imagejpeg($destimg,$destination_path) or die("Problem In saving"); 
		break;
	   }
	   case "gif":{
		imagegif($destimg,$destination_path) or die("Problem In saving"); 
		break;
	   }
	   case "png":{
		imagepng($destimg,$destination_path) or die("Problem In saving"); 
		break;
	   }

 	}///end of switch

 }//end of function
	function replaceEmotions($string){
		//$string=explode(" ",$string);
		//global $mosConfig_live_site;
		$smile=" :)";
		$laugh=" :grin";
		$eye=" ;)";
		$smart=" 8)";
		$tong=" :p";
		$surprize=" :roll";
		$very=" :eek";
		$upset=" :upset";
		$zz=" :zzz";
		$sad=" :sigh";
		$ques=" :?";
		$cry=" :cry";
		$sad2=" :(";
		$x=" :x";
		
		$string= str_replace($smile," <img src='images/smilies/sm_smile.gif'>",$string);
		$string= str_replace($laugh," <img src='images/smilies/sm_biggrin.gif'>",$string);
		$string= str_replace($eye," <img src='images/smilies/sm_wink.gif'>",$string);
		$string= str_replace($smart," <img src='images/smilies/sm_cool.gif'>",$string);
		$string= str_replace($tong," <img src='images/smilies/sm_razz.gif'>",$string);
		$string= str_replace($surprize," <img src='images/smilies/sm_rolleyes.gif'>",$string);
		$string= str_replace($very," <img src='images/smilies/sm_bigeek.gif'>",$string);
		$string= str_replace($upset," <img src='images/smilies/sm_upset.gif'>",$string);
		$string= str_replace($zz," <img src='images/smilies/sm_sleep.gif'>",$string);
		$string= str_replace($sad," <img src='images/smilies/sm_sigh.gif'>",$string);
		$string= str_replace($ques," <img src='images/smilies/sm_confused.gif'>",$string);
		$string= str_replace($cry," <img src='images/smilies/sm_cry.gif'>",$string);
		$string= str_replace($sad2," <img src='images/smilies/sm_mad.gif'>",$string);
		$string= str_replace($x," <img src='images/smilies/sm_dead.gif'>",$string);
		
		return $string;
		
	
	}//end of function
	function returnMB($bytes){
		$mb=(($bytes/1024)/1024);
		return $this->putcommas($mb)."MB";
	}//end of function
	function month($strCboName,$month,$text,$strCss,$strJs){
		print "<SELECT name=$strCboName $strCss $strJs>";
		print "<option value=0>".$text."</option>";
		for($i=1;$i<=12;$i++){
			switch ($i){
				case 1:{
					$strMonth="January";
					break;
					}
				case 2:{
					$strMonth="February";
					break;
					}
				case 3:{
					$strMonth="March";
					break;
					}
				case 4:{
					$strMonth="April";
					break;
					}
				case 5:{
					$strMonth="May";
					break;
					}
				case 6:{
					$strMonth="June";
					break;
					}
				case 7:{
					$strMonth="July";
					break;
					}
				case 8:{
					$strMonth="August";
					break;
					}
				case 9:{
					$strMonth="September";
					break;
					}							
				case 10:{
					$strMonth="October";
					break;
					}
				case 11:{
					$strMonth="November";
					break;
					}
				case 12:{
					$strMonth="Decembar";
					break;
					}		
			}//end of switch		
			if($i==$month)
						print "<option value=$i selected>".$strMonth."</option>";
					else
						print "<option value=$i>".$strMonth."</option>";
						
		}//end of loop
			
		print "</select>";
		
	}
	
	function returnMonth($month){
		switch ($month){
				case 1:{
					return "January";
					break;
					}
				case 2:{
					return "February";
					break;
					}
				case 3:{
					return "March";
					break;
					}
				case 4:{
					return "April";
					break;
					}
				case 5:{
					return "May";
					break;
					}
				case 6:{
					return "June";
					break;
					}
				case 7:{
					return "July";
					break;
					}
				case 8:{
					return "August";
					break;
					}
				case 9:{
					return "September";
					break;
					}							
				case 10:{
					return "October";
					break;
					}
				case 11:{
					return "November";
					break;
					}
				case 12:{
					return "Decembar";
					break;
					}		
			}//end of switch		
	}
	function returnDays($month){
		switch ($month){
				case 1:{
					return 31;
					break;
					}
				case 2:{
					return 28;
					break;
					}
				case 3:{
					return 31;
					break;
					}
				case 4:{
					return 30;
					break;
					}
				case 5:{
					return 31;
					break;
					}
				case 6:{
					return 30;
					break;
					}
				case 7:{
					return 31;
					break;
					}
				case 8:{
					return 31;
					break;
					}
				case 9:{
					return 30;
					break;
					}							
				case 10:{
					return 31;
					break;
					}
				case 11:{
					return 30;
					break;
					}
				case 12:{
					return 31;
					break;
					}		
			}//end of switch

		}
	function getDateDifference($dateFrom, $dateTo, $unit )
	{
	   $difference = null;
	
	   $dateFromElements = split(' ', $dateFrom);
	   $dateToElements = split(' ', $dateTo);
	
	   $dateFromDateElements = split('-', $dateFromElements[0]);
	   $dateFromTimeElements = split(':', $dateFromElements[1]);
	   $dateToDateElements = split('-', $dateToElements[0]);
	   $dateToTimeElements = split(':', $dateToElements[1]);
	
	   // Get unix timestamp for both dates
	
	   $date1 = mktime($dateFromTimeElements[0], $dateFromTimeElements[1], $dateFromTimeElements[2], $dateFromDateElements[1], $dateFromDateElements[0], $dateFromDateElements[2]);
	   $date2 = mktime($dateToTimeElements[0], $dateToTimeElements[1], $dateToTimeElements[2], $dateToDateElements[1], $dateToDateElements[0], $dateToDateElements[2]);
	
	   if( $date1 > $date2 )
	   {
		   return null;
	   }
	
	   $diff = $date2 - $date1;
	
	   $days = 0;
	   $hours = 0;
	   $minutes = 0;
	   $seconds = 0;
	
	   if ($diff % 86400 <= 0)  // there are 86,400 seconds in a day
	   {
		   $days = $diff / 86400;
	   }
	
	   if($diff % 86400 > 0)
	   {
		   $rest = ($diff % 86400);
		   $days = ($diff - $rest) / 86400;
	
		   if( $rest % 3600 > 0 )
		   {
			   $rest1 = ($rest % 3600);
			   $hours = ($rest - $rest1) / 3600;
	
			   if( $rest1 % 60 > 0 )
			   {
				   $rest2 = ($rest1 % 60);
				   $minutes = ($rest1 - $rest2) / 60;
				   $seconds = $rest2;
			   }
			   else
			   {
				   $minutes = $rest1 / 60;
			   }
		   }
		   else
		   {
			   $hours = $rest / 3600;
		   }
	   }
	
	   switch($unit)
	   {
		   case 'd':
		   case 'D':
	
			   $partialDays = 0;
	
			   $partialDays += ($seconds / 86400);
			   $partialDays += ($minutes / 1440);
			   $partialDays += ($hours / 24);
	
			   $difference = $days + $partialDays;
	
			   break;
	
		   case 'h':
		   case 'H':
	
			   $partialHours = 0;
	
			   $partialHours += ($seconds / 3600);
			   $partialHours += ($minutes / 60);
	
			   $difference = $hours + ($days * 24) + $partialHours;
	
			   break;
	
		   case 'm':
		   case 'M':
	
			   $partialMinutes = 0;
	
			   $partialMinutes += ($seconds / 60);
	
			   $difference = $minutes + ($days * 1440) + ($hours * 60) + $partialMinutes;
	
			   break;
	
		   case 's':
		   case 'S':
	
			   $difference = $seconds + ($days * 86400) + ($hours * 3600) + ($minutes * 60);
	
			   break;
	
		   case 'a':
		   case 'A':
	
			   $difference = array (
				   "days" => $days,
				   "hours" => $hours,
				   "minutes" => $minutes,
				   "seconds" => $seconds
			   );
	
			   break;
	   }
	
	   return $difference;
	}
	function scriptSubmit($name,$clientID){
		$gender=$this->returnName("gender","clientcontactinfo","clientID",$clientID,"");
		if($gender=="F") $gender="She "; else $gender="He ";
		$sql="select strdate from scripts where clientID=$clientID order by strdate DESC";
		//echo $sql."<br>";
		$result=mysql_query($sql,$GLOBALS['con']); 
		$num=mysql_num_rows($result);
		if($num>0){
			if($num==1)	$scripts="script"; else $scripts="scripts";
			$row=mysql_fetch_object($result);
			print "$name submitted a script on ".$this->chageDate($row->strdate,0);
			print ". $gender has submitted $num $scripts overall.";
		}else{
			print "$name hasn't submitted any scripts.";
		}//end of if
	}//end of if
	

	function ReturnPageName($cmd){
		switch($cmd){
			case 1:
				$PageName="home.php";
				break;


			default;
				$PageName="home.php";
				break;
		}////end of Switch
		return $PageName;
	}////end of function
	
	
	function TotalUploadFiles($usersID){
		$CATquery="SELECT count(usersfilesID) as Files
				FROM usersfiles 
				WHERE usersID=$usersID
		";
		$CATresult=$this->ResultSet($CATquery);
		$CATrow=$this->FetchObject($CATresult);
		return $CATrow->Files;
	}
	
	function ReturnCategories($categoryID){
		$CATquery="SELECT category AS cat1,mainID
				FROM category 
				WHERE categoryID = $categoryID;
		";
		$CATresult=$this->ResultSet($CATquery);
		$CATrow=$this->FetchObject($CATresult);
		$CATquery1="SELECT category AS cat2,mainID
				FROM category 
				WHERE categoryID = $CATrow->mainID";
				//echo CATquery1;
		$CATresult1=$this->ResultSet($CATquery1);
		$CATrow1=$this->FetchObject($CATresult1);
		return $CATrow->cat1."&nbsp;>>&nbsp;".$CATrow1->cat2;
	}
	
	
	function ReturnPageNameAdmin($cmd){
	
		switch ($cmd){
		
			case 1 : {
				$PageName="login.php";
				break;
			}
				
			case 2 : {
				$PageName="home.php";
				break;
			}
			case 3 : {
				$PageName="logout.php";
				break;
			}
			case 4 : {
				$PageName="managegroups.php";
				break;
			}
			
			case 5 : {
				$PageName="viewtemplates.php";
				break;
			}
			
			case 6 : {
				$PageName="et.php";
				break;
			}
			
		
			
			case 8 : {
				$PageName="adduser.php";
				break;
			}
			
			case 9 : {
				$PageName="edituser.php";
				break;
			}
			
			case 10 : {
				$PageName="viewusers.php";
				break;
			}
			
			case 11 : {
				$PageName="addcategory.php";
				break;
			}
			
			case 12 : {
				$PageName="editcategory.php";
				break;
			}
			
			case 13 : {
				$PageName="viewcategory.php";
				break;
			}
			
			case 14 : {
				$PageName="changepwd.php";
				break;
			}
			
			case 15 : {
				$PageName="addproduct.php";
				break;
				
			}
			case 16 : {
				$PageName="editproduct.php";
				break;
				
			}
			
			case 17 : {
				$PageName="viewproducts.php";
				break;
			}
			
			case 18 : {
				$PageName="vieworders.php";
				break;
				
			}
			case 19 : {
				$PageName="orderdetails.php";
				break;
				
			}
			
			case 20 : {
				$PageName="editgroup.php";
				break;
			}
			case 21 : {
				$PageName="viewbanners.php";
				break;
			}
			case 22 : {
				$PageName="addbanner.php";
				break;
			}
			case 23 : {
				$PageName="editbanner.php";
				break;
			}
			case 24 : {
				$PageName="vieworddetail.php";
				break;
			}
			case 25 : {
				$PageName="mails.php";
				break;
			}
			case 26 : {
				$PageName="show_emails.php";
				break;
			}
			
						
		}//end of switch	
			
			
		
	
		return $PageName;
	}
	
	
	function ResultSet($query){
		//$query=$this->sql_quote($query);
		$result=mysql_query($query,$GLOBALS['con']);
		return $result;
	}
	function FetchObject($result){
		//echo "Here<br><br>";
		$row=mysql_fetch_object($result);
		return $row;
	}
	
	function NumRows($result){
		$numrows=mysql_num_rows($result);
		return $numrows;
	}
		
	function SendNewsletter($announcementID){
		///Select Annoucement///
		$Newsquery="SELECT subject,body
					FROM announcement
					WHERE announcementID=$announcementID";
		$NewsResult=$this->ResultSet($Newsquery);
		$NewsRows=$this->FetchObject($NewsResult);
		/////End Annoucement
		////Select Newsletter
		
		$query="SELECT USR.email
					FROM users USR, usernewsletter UNEWS
					WHERE USR.usersID=UNEWS.usersID
					";
		$result=$this->ResultSet($query);
		while($row=$this->FetchObject($result)){
			$this->sendMail($row->email,$NewsRows->subject,$NewsRows->body);
		}
	}
	
	function ExplodeDate($date){
		$Date=explode("-",$date);
		return $Date;
	}
	function DateofBirth($dayName,$day,$monthName,$month,$yearName,$year,$class){?>
	
  <select name="<?php echo $monthName;?>" <?php echo $class; ?>>
	   <option value="0" <?php if($month=='0'){ echo "selected";} ?>>Month</option>    
	   <option value="01" <?php if($month=='01'){ echo "selected";} ?>>January</option>    
	   <option value="02" <?php if($month=='02'){ echo "selected";} ?>>February</option>    
	   <option value="03" <?php if($month=='03'){ echo "selected";} ?>>March</option>    
	   <option value="04" <?php if($month=='04'){ echo "selected";} ?>>April</option>    
	   <option value="05" <?php if($month=='05'){ echo "selected";} ?>>May</option>    
	   <option value="06" <?php if($month=='06'){ echo "selected";} ?>>June</option>    
	   <option value="07" <?php if($month=='07'){ echo "selected";} ?>>July</option>    
	   <option value="08" <?php if($month=='08'){ echo "selected";} ?>>August</option>    
	   <option value="09" <?php if($month=='09'){ echo "selected";} ?>>September</option>    
	   <option value="10" <?php if($month=='10'){ echo "selected";} ?>>October</option>    
	   <option value="11" <?php if($month=='11'){ echo "selected";} ?>>November</option>    
	   <option value="12" <?php if($month=='12'){ echo "selected";} ?>>December</option>    
  </select>&nbsp;-&nbsp;
  <select name="<?php echo $dayName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($day=='0'){ echo "selected";} ?>>Day</option>    
   <option value="01" <?php if($day=='01'){ echo "selected";} ?>>01</option>    
   <option value="02" <?php if($day=='02'){ echo "selected";} ?>>02</option>    
   <option value="03" <?php if($day=='03'){ echo "selected";} ?>>03</option>    
   <option value="04" <?php if($day=='04'){ echo "selected";} ?>>04</option>    
   <option value="05" <?php if($day=='05'){ echo "selected";} ?>>05</option>    
   <option value="06" <?php if($day=='06'){ echo "selected";} ?>>06</option>    
   <option value="07" <?php if($day=='07'){ echo "selected";} ?>>07</option>    
   <option value="08" <?php if($day=='08'){ echo "selected";} ?>>08</option>    
   <option value="09" <?php if($day=='09'){ echo "selected";} ?>>09</option>    
   
   <?php for($i=10;$i<=31;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($day==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>&nbsp;-&nbsp;
  
  <select name="<?php echo $yearName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($year=='0'){ echo "selected";} ?>>Year</option>
   <?php for($i=2006;$i<=2010;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($year==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>
  
  
 <?
 }//end of finction
 
 
 
 
 
 function DateofBirthnew($dayName,$day,$monthName,$month,$yearName,$year,$class){?>
	
  <select name="<?php echo $monthName;?>" <?php echo $class; ?>>
	   <option value="0" <?php if($month=='0'){ echo "selected";} ?>>Month</option>    
	   <option value="01" <?php if($month=='01'){ echo "selected";} ?>>January</option>    
	   <option value="02" <?php if($month=='02'){ echo "selected";} ?>>February</option>    
	   <option value="03" <?php if($month=='03'){ echo "selected";} ?>>March</option>    
	   <option value="04" <?php if($month=='04'){ echo "selected";} ?>>April</option>    
	   <option value="05" <?php if($month=='05'){ echo "selected";} ?>>May</option>    
	   <option value="06" <?php if($month=='06'){ echo "selected";} ?>>June</option>    
	   <option value="07" <?php if($month=='07'){ echo "selected";} ?>>July</option>    
	   <option value="08" <?php if($month=='08'){ echo "selected";} ?>>August</option>    
	   <option value="09" <?php if($month=='09'){ echo "selected";} ?>>September</option>    
	   <option value="10" <?php if($month=='10'){ echo "selected";} ?>>October</option>    
	   <option value="11" <?php if($month=='11'){ echo "selected";} ?>>November</option>    
	   <option value="12" <?php if($month=='12'){ echo "selected";} ?>>December</option>    
  </select>&nbsp;-&nbsp;
  <select name="<?php echo $dayName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($day=='0'){ echo "selected";} ?>>Day</option>    
   <option value="01" <?php if($day=='01'){ echo "selected";} ?>>01</option>    
   <option value="02" <?php if($day=='02'){ echo "selected";} ?>>02</option>    
   <option value="03" <?php if($day=='03'){ echo "selected";} ?>>03</option>    
   <option value="04" <?php if($day=='04'){ echo "selected";} ?>>04</option>    
   <option value="05" <?php if($day=='05'){ echo "selected";} ?>>05</option>    
   <option value="06" <?php if($day=='06'){ echo "selected";} ?>>06</option>    
   <option value="07" <?php if($day=='07'){ echo "selected";} ?>>07</option>    
   <option value="08" <?php if($day=='08'){ echo "selected";} ?>>08</option>    
   <option value="09" <?php if($day=='09'){ echo "selected";} ?>>09</option>    
   
   <?php for($i=10;$i<=31;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($day==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>&nbsp;-&nbsp;
  
  <select name="<?php echo $yearName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($year=='0'){ echo "selected";} ?>>Year</option>
   <?php for($i=1950;$i<=2000;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($year==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>
  
  
 <?
 }//end of finction
 
 
 function GetMemberInfo($memberID){
 	$query="SELECT  MInfo.memberID,MInfo.firstname,MInfo.lastname,MInfo.address,MInfo.stateID, 
	 				MInfo.countryID,MInfo.zipcode,MInfo.gender,MInfo.dob,MInfo.showdb,
					MInfo.pic,MInfo.pic_big,MIin.headline,MIin.aboutme,MIin.liketomeet,MIin.intrest,
					MIin.music,MIin.movies,MIin.books,ML.email,C.country,R.region
			FROM memberlogin ML, memberintrest MIin, memberinfo MInfo,country C,region R
			WHERE MInfo.memberID=ML.memberID
			AND ML.memberID=MIin.memberID
			AND MIin.memberID=MInfo.memberID
			AND C.countryID=MInfo.countryID
			AND R.regionID=C.regionID
			AND ML.memberID=$memberID";
	//echo $query;
	$result=$this->ResultSet($query);
	$row=$this->FetchObject($result);
	return $row;
		
 }
 
 function SelectTab($pg){
 	switch($pg){

		case 1:{
			$tab=1;
			break;
		}////end of Case1
		case 4:{
			$tab=1;
			break;
		}////end of Case1
		case 8:{
			$tab=3;
			break;
		}
		case 10:{
			$tab=4;
			break;
		}
		case 14:{
			$tab=2;
			break;
		}
		

	
	}////end of Switch

	return $tab;
 }
 
 
 
 function FillComboDay($dayName,$day,$class){?>
	
  <select name="<?php echo $dayName;?>" <?php echo $class; ?> style="width:139px;">
	   <option value="-1" <?php if($day=='-1'){ echo "selected";} ?>>Select</option>    
	   <option value="0" <?php if($day=='0'){ echo "selected";} ?>>Sunday</option>    
	   <option value="1" <?php if($day=='1'){ echo "selected";} ?>>Monday</option>    
	   <option value="2" <?php if($day=='2'){ echo "selected";} ?>>Tuesday</option>    
	   <option value="3" <?php if($day=='3'){ echo "selected";} ?>>Wednesday</option>    
	   <option value="4" <?php if($day=='4'){ echo "selected";} ?>>Thursday</option>    
	   <option value="5" <?php if($day=='5'){ echo "selected";} ?>>Friday</option>    
	   <option value="6" <?php if($day=='6'){ echo "selected";} ?>>Saturday</option>    
  </select>&nbsp;
  
 <?
 }//end of finction
 
 
 function FillComboTime($hourname,$hour,$minname,$min,$class){?>
	
  <select name="<?php echo $hourname;?>" <?php echo $class; ?> style="width:55px;">
	   <option value="-1" <?php if($hour=='-1'){ echo "selected";} ?>>Hour</option>    
	   <option value="00" <?php if($hour=='00'){ echo "selected";} ?>>00</option>    
	   <option value="01" <?php if($hour=='01'){ echo "selected";} ?>>01</option>    
	   <option value="02" <?php if($hour=='02'){ echo "selected";} ?>>02</option>    
	   <option value="03" <?php if($hour=='03'){ echo "selected";} ?>>03</option>    
	   <option value="04" <?php if($hour=='04'){ echo "selected";} ?>>04</option>    
	   <option value="05" <?php if($hour=='05'){ echo "selected";} ?>>05</option>    
	   <option value="06" <?php if($hour=='06'){ echo "selected";} ?>>06</option>    
	   <option value="07" <?php if($hour=='07'){ echo "selected";} ?>>07</option>    
	   <option value="08" <?php if($hour=='08'){ echo "selected";} ?>>08</option>    
	   <option value="09" <?php if($hour=='09'){ echo "selected";} ?>>09</option>    
	   <?php 
	   		for($i=10;$i<=23;$i++){
	   ?>
	   		<option value="<?=$i;?>" <?php if($hour==$i){ echo "selected";} ?>><?=$i;?></option>    
	   <?php
	   		}
	   ?>
  </select>&nbsp;
  <select name="<?php echo $minname;?>" <?php echo $class; ?> style="width:76px;">
	   <option value="-1" <?php if($min=='-1'){ echo "selected";} ?>>Minutes</option>    
	   <option value="00" <?php if($min=='00'){ echo "selected";} ?>>00</option>    
	   <option value="05" <?php if($min=='05'){ echo "selected";} ?>>05</option>    
	   <?php 
	   		for($i=10;$i<=59;$i=$i+5){
	   ?>
	   		<option value="<?=$i;?>" <?php if($min==$i){ echo "selected";} ?>><?=$i;?></option>    
	   <?php
	   		}
	   ?>
  </select>
  
 <?
 }//end of finction
 
 
 function FillComboCustomizeTime($hourname,$hour,$shour,$ehour,$minname,$min,$class){?>
	
  <select name="<?php echo $hourname;?>" <?php echo $class; ?> style="width:55px;">
	<?php
		/*
		   <option value="-1" <?php if($hour=='-1'){ echo "selected";} ?>>Hour</option>    
		   <option value="00" <?php if($hour=='00'){ echo "selected";} ?>>00</option>    
		   <option value="01" <?php if($hour=='01'){ echo "selected";} ?>>01</option>    
		   <option value="02" <?php if($hour=='02'){ echo "selected";} ?>>02</option>    
		   <option value="03" <?php if($hour=='03'){ echo "selected";} ?>>03</option>    
		   <option value="04" <?php if($hour=='04'){ echo "selected";} ?>>04</option>    
		   <option value="05" <?php if($hour=='05'){ echo "selected";} ?>>05</option>    
		   <option value="06" <?php if($hour=='06'){ echo "selected";} ?>>06</option>    
		   <option value="07" <?php if($hour=='07'){ echo "selected";} ?>>07</option>    
		   <option value="08" <?php if($hour=='08'){ echo "selected";} ?>>08</option>    
		   <option value="09" <?php if($hour=='09'){ echo "selected";} ?>>09</option>    
	    */
	    
	   		for($i=$shour;$i<=$ehour;$i++){
	   ?>
	   		<option value="<?=$i;?>" <?php if($hour==$i){ echo "selected";} ?>><?=$i;?></option>    
	   <?php
	   		}
	   ?>
  </select>&nbsp;
  <select name="<?php echo $minname;?>" <?php echo $class; ?> style="width:76px;">
	   <option value="-1" <?php if($min=='-1'){ echo "selected";} ?>>Minutes</option>    
	   <option value="00" <?php if($min=='00'){ echo "selected";} ?>>00</option>    
	   <option value="05" <?php if($min=='05'){ echo "selected";} ?>>05</option>    
	   <?php 
	   		for($i=10;$i<=59;$i=$i+5){
	   ?>
	   		<option value="<?=$i;?>" <?php if($min==$i){ echo "selected";} ?>><?=$i;?></option>    
	   <?php
	   		}
	   ?>
  </select>
  
 <?
 }//end of finction
 
 
 
 
 
 //start of function for checking the days
 function checkday($day){
 	switch($day){
		case 0:
		$day = "Sunday";
		break;
		
		case 1:
		$day = "Monday";
		break;
		
		case 2:
		$day = "Tuesday";
		break;
		
		case 3:
		$day = "Wednesday";
		break;
		
		case 4:
		$day = "Thursday";
		break;
		
		case 5:
		$day = "Friday";
		break;
		
		case 6:
		$day = "Saturday";
		break;
		
	}
	return $day;
 }
 //end of function for checking the days
 
 function AdminTrail($cmd){
 	
	if(isset($_SESSION['adminID'])){
			$url="index.php?cmd=2";
	}
	if($cmd!=2){
		$string="<A href='$url' class='left-link2'>Home</A>";
	}else{
		$string="Home";
	}
	
	switch($cmd){
	
		
		case 4:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=19' class='left-link2'>Category Management</a>&nbsp;/&nbsp;Add Category";
			break;
		}////end of case 4
		
		case 5:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=20' class='left-link2'>Sub Category Management</a>&nbsp;/&nbsp;Add Sub Category";
			break;
		}////end of case 5
		
		case 6:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=23' class='left-link2'>Product Management</a>&nbsp;/&nbsp;Add Product";
			break;
		}////end of case 6
		
		case 7:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=21' class='left-link2'>Branch Management</a>&nbsp;/&nbsp;Add Branch";
			break;
		}////end of case 7
		
		case 8:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=21' class='left-link2'>Branch Management</a>&nbsp;/&nbsp;Assign Menu";
			break;
		}////end of case 8
		
		case 9:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=19' class='left-link2'>Category Management</a>&nbsp;/&nbsp;View Categories";
			break;
		}////end of case 9
		
		case 10:{
			$category=$this->returnName("category","category","categoryID",$_REQUEST['categoryid'],"");
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=19' class='left-link2'>Category Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=9' class='left-link2'>View Categories</a>&nbsp;/&nbsp;Delete Category";
			break;
		}////end of case 14
		
		case 13:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=21' class='left-link2'>Branch Management</a>&nbsp;/&nbsp;View Branches";
			break;
		}////end of case 13
		
		case 42:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=21' class='left-link2'>Branch Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=13' class='left-link2'>View Branches</a>&nbsp;/&nbsp;Delete Branch";
			break;
		}////end of case 13
		
		case 12:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=20' class='left-link2'>Sub Category Management</a>&nbsp;/&nbsp;View Sub Category";
			break;
		}////end of case 12
		
		case 14:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=19' class='left-link2'>Category Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=9' class='left-link2'>View Categories</a>&nbsp;/&nbsp;Edit Category";
			break;
		}////end of case 14
		
		case 15:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=20' class='left-link2'>Sub Category Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=12' class='left-link2'>View Sub Categories</a>&nbsp;/&nbsp;Edit Sub Category";
			break;
		}////end of case 14
		
		case 16:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=21' class='left-link2'>Branch Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=13' class='left-link2'>View Branches</a>&nbsp;/&nbsp;Edit Branch";
			break;
		}////end of case 16
		
		case 17:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=23' class='left-link2'>Product Management</a>&nbsp;/&nbsp;View Products";
			break;
		}////end of case 17
		
		case 18:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=23' class='left-link2'>Product Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=17' class='left-link2'>View Products</a>&nbsp;/&nbsp;Edit Product";
			break;
		}////end of case 18
		
		case 19:{
			$string.="&nbsp;/&nbsp;Category Management";
			break;
		}////end of case 19
		
		case 20:{
			$string.="&nbsp;/&nbsp;Sub Category Management";
			break;
		}////end of case 20
		
		case 21:{
			$string.="&nbsp;/&nbsp;Branch Management";
			break;
		}////end of case 21
		
		case 23:{
			$string.="&nbsp;/&nbsp;Product Management";
			break;
		}////end of case 23
		
		case 24:{
			$string.="&nbsp;/&nbsp;Customer Manager";
			break;
		}////end of case 6
		
		case 25:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=23' class='left-link2'>Product Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=17' class='left-link2'>View Products</a>&nbsp;/&nbsp;Delete Product";
			break;
		}////end of case 18
		
		case 26:{
			$string.="&nbsp;/&nbsp;Delivery Area Manager";
			break;
		}////end of case 23
		
		case 27:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=26' class='left-link2'>Delivery Area Manager</a>&nbsp;/&nbsp;Add Delivery Area";
			break;
		}////end of case 6
		
		case 28:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=26' class='left-link2'>Delivery Area Manager</a>&nbsp;/&nbsp;View Delivery Areas";
			break;
		}////end of case 6
		
		case 29:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=26' class='left-link2'>Delivery Area Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=28' class='left-link2'>View Delivery Areas</a>&nbsp;/&nbsp;Edit Delivery Area";
			break;
		}////end of case 6
		
		case 30:{
			$string.="&nbsp;/&nbsp;Banner Manager";
			break;
		}////end of case 23
		
		case 31:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=30' class='left-link2'>Banner Manager</a>&nbsp;/&nbsp;Add Banner";
			break;
		}////end of case 6
		
		case 32:{
			$category=$this->returnName("subcategory","subcategory","subcategoryID",$_REQUEST['subcategoryid'],"");
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=20' class='left-link2'>Sub Category Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=12' class='left-link2'>View Sub Categories</a>&nbsp;/&nbsp;Delete Sub Category";
			break;
		}////end of case 14
		
		case 33:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=26' class='left-link2'>Delivery Area Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=28' class='left-link2'>View Delivery Areas</a>&nbsp;/&nbsp;Delete Delivery Area";
			break;
		}////end of case 6
		
		
		
		case 34:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=30' class='left-link2'>Banner Manager</a>&nbsp;/&nbsp;View Banners";
			break;
		}////end of case 6
		
		case 35:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=30' class='left-link2'>Banner Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=34' class='left-link2'>View Banners</a>&nbsp;/&nbsp;Edit Banner";
			break;
		}////end of case 6
		
		case 36:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=30' class='left-link2'>Banner Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=34' class='left-link2'>View Banners</a>&nbsp;/&nbsp;Delete Banner";
			break;
		}////end of case 6
		
		case 37:{
			$category=$this->returnName("category","category","categoryID",$_REQUEST['categoryid'],"");
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=19' class='left-link2'>Category Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=9' class='left-link2'>View Categories</a>&nbsp;/&nbsp;Seo Category: $category";
			break;
		}////end of case 14
		
		case 38:{
			$category=$this->returnName("subcategory","subcategory","subcategoryID",$_REQUEST['subcategoryid'],"");
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=20' class='left-link2'>Sub Category Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=12' class='left-link2'>View Sub Categories</a>&nbsp;/&nbsp;Seo Sub Category: $category";
			break;
		}////end of case 14
		
		case 39:{
			$string.="&nbsp;/&nbsp;View Static Pages";
			break;
		}////end of case 6
		
		case 40:{
			$pagename=$this->returnName("pagename","static_contents","static_contentsID",$_REQUEST['pageID'],"")." Page";
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=39' class='left-link2'>View Static Pages</a>&nbsp;/&nbsp;Seo $pagename";
			break;
		}////end of case 6
		
		case 41:{
			$pagename=$this->returnName("pagename","static_contents","static_contentsID",$_REQUEST['pageID'],"")." Page";
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=39' class='left-link2'>View Static Pages</a>&nbsp;/&nbsp;Edit $pagename";
			break;
		}////end of case 6
		
		case 43:{
			$string.="&nbsp;/&nbsp;Home Page Manager";
			break;
		}////end of case 6
		
		case 48:{
			if(@$_REQUEST['branchID']==1){
				$text="SandyFord";
			}else if(@$_REQUEST['branchID']==2){
				$text="Shankill";
			}else if(@$_REQUEST['branchID']==3){
				$text="Blanchardstown";
			}else{
				if(isset($_REQUEST['btnorder'])){
					$text="Tracked";
				}else{
					$text="All";
				}
			}
			
			$string.="&nbsp;/&nbsp;$text Orders";
			break;
			
		}		
		case 50:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=48' class='left-link2'>Orders</a>&nbsp;/&nbsp;Order Detail";
			break;
		}////end of case 4
		
		case 51:{
			$string.="&nbsp;/&nbsp;Inclusives Management";
			break;
		}////end of case 6
		
		case 52:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=51' class='left-link2'>Inclusives Management</a>&nbsp;/&nbsp;Add Inclusives";
			break;
		}////end of case 4
		
		case 53:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=51' class='left-link2'>Inclusives Management</a>&nbsp;/&nbsp;View Inclusives";
			break;
		}////end of case 9
		
		case 54:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=51' class='left-link2'>Inclusives Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=53' class='left-link2'>View Inclusives</a>&nbsp;/&nbsp;Edit Free Include";
			break;
		}////end of case 4
		
		case 76:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=51' class='left-link2'>Inclusives Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=53' class='left-link2'>View Inclusives</a>&nbsp;/&nbsp;Delete Inclusive";
			break;
		}////end of case 9
		
		case 55:{
			$string.="&nbsp;/&nbsp;Free Groups Management";
			break;
		}////end of case 6
		
		case 79:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;View Toppings";
			break;
		}////end of case 6
		
		case 78:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;Add Pizza Toppings";
			break;
		}////end of case 6
		
		case 81:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=79' class='left-link2'>View Toppings</a>&nbsp;/&nbsp;Delete Topping";
			break;
		}////end of case 6
		
		case 80:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=79' class='left-link2'>View Toppings</a>&nbsp;/&nbsp;Edit Topping";
			break;
		}////end of case 6

		
		case 56:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;Add Free Group";
			break;
		}////end of case 4
		
		case 57:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;View Free Groups";
			break;
		}////end of case 9
		
		case 58:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=55' class='left-link2'>Free Groups Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=57' class='left-link2'>View Free Groups</a>&nbsp;/&nbsp;Edit Free Group";
			break;
		}////end of case 4
		
		case 60:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=24' class='left-link2'>Customer Manager</a>&nbsp;/&nbsp;Delete User";
			break;
		}////end of case 4
		
		case 61:{
			$string.="&nbsp;/&nbsp;Dublin Code Management";
			break;
		}////end of case 6
		
		case 62:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=61' class='left-link2'>Dublin Code Management</a>&nbsp;/&nbsp;Add Dublin Code";
			break;
		}////end of case 4
		
		case 63:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=61' class='left-link2'>Dublin Code Management</a>&nbsp;/&nbsp;View Dublin Codes";
			break;
		}////end of case 9
		
		case 77:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=61' class='left-link2'>Dublin Code Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=63' class='left-link2'>View Dublin Codes</a>&nbsp;/&nbsp;Delete Code";
			break;
		}////end of case 9
		
		case 64:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=61' class='left-link2'>Dublin Code Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=63' class='left-link2'>View Dublin Codes</a>&nbsp;/&nbsp;Edit Dublin Code";
			break;
		}////end of case 18
		
		case 65:{
			$string.="&nbsp;/&nbsp;Change Admin Password";
			break;
		}////end of case 6
		
		case 75:{
			$category=$this->returnName("product_name","products","productsID",$_REQUEST['productsID'],"");
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=23' class='left-link2'>Product Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=17' class='left-link2'>View Products</a>&nbsp;/&nbsp;Seo Product: $category";
			break;
		}////end of case 14
		
		case 83:{
			$string.="&nbsp;/&nbsp;FAQ Management";
			break;
		}////end of case 83
		
		case 84:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=83' class='left-link2'>FAQ Management</a>&nbsp;/&nbsp;Add FAQ";
			break;
		}////end of case 84
		
		case 85:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=83' class='left-link2'>FAQ Management</a>&nbsp;/&nbsp;View FAQs";
			break;
		}////end of case 85
	
		case 86:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=83' class='left-link2'>FAQ Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=85' class='left-link2'>View FAQs</a>&nbsp;/&nbsp;Edit FAQ";
			break;
		}////end of case 86
		
		case 87:{
			$string.="&nbsp;/&nbsp;Recipe Management";
			break;
		}////end of case 83
		
		case 88:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=87' class='left-link2'>Recipe Management</a>&nbsp;/&nbsp;Add Recipe";
			break;
		}////end of case 84
		
		case 89:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=87' class='left-link2'>Recipe Management</a>&nbsp;/&nbsp;View Recipe";
			break;
		}////end of case 84
		
		case 90:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=87' class='left-link2'>Recipe Management</a>&nbsp;/&nbsp;<a href='index.php?cmd=89' class='left-link2'>View Recipe</a>&nbsp;/&nbsp;Edit Recipe";
			break;
		}////end of case 84
		
		case 44:{
			$string.="&nbsp;/&nbsp;Newsletter Manager";
			break;
		}////end of case 83
		
		case 45:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;SMS Newsletter Manager";
			break;
		}////end of case 8345
		
		case 67:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;&nbsp;/&nbsp;<a href='index.php?cmd=45' class='left-link2'>SMS Newsletter Manager</a>&nbsp;/&nbsp;SMS Newsletter Manager Step (1)";
			break;
		}////end of case 8345  SMS Newsletter Manager Step (1)
		
		case 68:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp<a href='index.php?cmd=45' class='left-link2'>SMS Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=45' class='left-link2'>SMS Newsletter Manager Step (1)</a>&nbsp;/&nbsp;SMS Newsletter Manager Step (2)";
			break;
		}////end of case 8345  SMS Newsletter Manager Step (1)
		
		case 69:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;&nbsp;/&nbsp;<a href='index.php?cmd=45' class='left-link2'>SMS Newsletter Manager</a>&nbsp;/&nbsp;View Past SMS";
			break;
		}////end of case 8345  SMS Newsletter Manager Step (1)
		
		
		case 70:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;Email Newsletter Manager";
			break;
		}////end of case 8345
		
		case 71:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=70' class='left-link2'>Email Newsletter Manager</a>&nbsp;/&nbsp;Email Newsletter Manager Step (1)";
			break;
		}////end of case 8345
		
		case 72:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=70' class='left-link2'>Email Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=71' class='left-link2'>Email Newsletter Manager Step (1)</a>&nbsp;/&nbsp;Email Newsletter Manager Step (2)";
			break;
		}////end of case 8345
		
		case 73:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=70' class='left-link2'>Email Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=71' class='left-link2'>Email Newsletter Manager Step (1)</a>&nbsp;/&nbsp;Send Email Newsletter Step(3)";
			break;
		}////end of case 8345
		
		case 74:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=44' class='left-link2'>Newsletter Manager</a>&nbsp;/&nbsp;<a href='index.php?cmd=70' class='left-link2'>Email Newsletter Manager</a>&nbsp;/&nbsp;View Past Email Newsletter";
			break;
		}////end of case 8345		
		
		case 82:{
			$string.="&nbsp;/&nbsp;<a href='index.php?cmd=23' class='left-link2'>Product Management</a>&nbsp;/&nbsp;Search the Product";
			break;
		}////end of case 23
		
	}/////end of Switch
	
	
	return $string;
	
 }/////end of Trail Function
 
 
 function FnDate($dayName,$day,$monthName,$month,$yearName,$year,$class){?>
	
  <select name="<?php echo $monthName;?>" <?php echo $class; ?>>
	   <option value="0" <?php if($month=='0'){ echo "selected";} ?>>Month</option>    
	   <option value="01" <?php if($month=='01'){ echo "selected";} ?>>January</option>    
	   <option value="02" <?php if($month=='02'){ echo "selected";} ?>>February</option>    
	   <option value="03" <?php if($month=='03'){ echo "selected";} ?>>March</option>    
	   <option value="04" <?php if($month=='04'){ echo "selected";} ?>>April</option>    
	   <option value="05" <?php if($month=='05'){ echo "selected";} ?>>May</option>    
	   <option value="06" <?php if($month=='06'){ echo "selected";} ?>>June</option>    
	   <option value="07" <?php if($month=='07'){ echo "selected";} ?>>July</option>    
	   <option value="08" <?php if($month=='08'){ echo "selected";} ?>>August</option>    
	   <option value="09" <?php if($month=='09'){ echo "selected";} ?>>September</option>    
	   <option value="10" <?php if($month=='10'){ echo "selected";} ?>>October</option>    
	   <option value="11" <?php if($month=='11'){ echo "selected";} ?>>November</option>    
	   <option value="12" <?php if($month=='12'){ echo "selected";} ?>>December</option>    
  </select>&nbsp;
  <select name="<?php echo $dayName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($day=='0'){ echo "selected";} ?>>Day</option>    
   <option value="01" <?php if($day=='01'){ echo "selected";} ?>>01</option>    
   <option value="02" <?php if($day=='02'){ echo "selected";} ?>>02</option>    
   <option value="03" <?php if($day=='03'){ echo "selected";} ?>>03</option>    
   <option value="04" <?php if($day=='04'){ echo "selected";} ?>>04</option>    
   <option value="05" <?php if($day=='05'){ echo "selected";} ?>>05</option>    
   <option value="06" <?php if($day=='06'){ echo "selected";} ?>>06</option>    
   <option value="07" <?php if($day=='07'){ echo "selected";} ?>>07</option>    
   <option value="08" <?php if($day=='08'){ echo "selected";} ?>>08</option>    
   <option value="09" <?php if($day=='09'){ echo "selected";} ?>>09</option>    
   
   <?php for($i=10;$i<=31;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($day==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>&nbsp;
  
  <select name="<?php echo $yearName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($year=='0'){ echo "selected";} ?>>Year</option>
   <?php for($i=2007;$i<=2010;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($year==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>
  
  
 <?
 }//end of finction
 
 
 
 function FnMonthYear($monthName,$month,$yearName,$year,$class){?>
	
  <select name="<?php echo $monthName;?>" <?php echo $class; ?>>
	   <option value="0" <?php if($month=='0'){ echo "selected";} ?>>Month</option>    
	   <option value="01" <?php if($month=='01'){ echo "selected";} ?>>01</option>    
	   <option value="02" <?php if($month=='02'){ echo "selected";} ?>>02</option>    
	   <option value="03" <?php if($month=='03'){ echo "selected";} ?>>03</option>    
	   <option value="04" <?php if($month=='04'){ echo "selected";} ?>>04</option>    
	   <option value="05" <?php if($month=='05'){ echo "selected";} ?>>05</option>    
	   <option value="06" <?php if($month=='06'){ echo "selected";} ?>>06</option>    
	   <option value="07" <?php if($month=='07'){ echo "selected";} ?>>07</option>    
	   <option value="08" <?php if($month=='08'){ echo "selected";} ?>>08</option>    
	   <option value="09" <?php if($month=='09'){ echo "selected";} ?>>09</option>    
	   <option value="10" <?php if($month=='10'){ echo "selected";} ?>>10</option>    
	   <option value="11" <?php if($month=='11'){ echo "selected";} ?>>11</option>    
	   <option value="12" <?php if($month=='12'){ echo "selected";} ?>>12</option>    
  </select>&nbsp;/&nbsp;
  
  <select name="<?php echo $yearName;?>" <?php echo $class; ?>>
   <option value="0" <?php if($year=='0'){ echo "selected";} ?>>Year</option>
   <?php for($i=2007;$i<=2010;$i++){ ?>
   <option value="<?php echo $i; ?>" <?php if($year==$i){ echo "selected";} ?>><?php echo $i; ?></option>    
   <?php } ?>
  </select>
  
  
 <?
 }//end of finction
 
 
 
 
 function timeHours($Name,$selectedtime,$class){?>
	
  <select name="<?php echo $Name;?>" <?php echo $class; ?> style="width:50px;">
	   <!--<option value="00" <?php //if($selectedtime=='00'){ echo "selected";} ?>>Select</option>    -->
	   <option value="01" <?php if($selectedtime=='01'){ echo "selected";} ?>>01 </option>    
	   <option value="02" <?php if($selectedtime=='02'){ echo "selected";} ?>>02 </option>    
	   <option value="03" <?php if($selectedtime=='03'){ echo "selected";} ?>>03 </option>    
	   <option value="04" <?php if($selectedtime=='04'){ echo "selected";} ?>>04 </option>    
	   <option value="05" <?php if($selectedtime=='05'){ echo "selected";} ?>>05 </option>    
	   <option value="06" <?php if($selectedtime=='06'){ echo "selected";} ?>>06 </option>    
	   <option value="07" <?php if($selectedtime=='07'){ echo "selected";} ?>>07 </option>    
	   <option value="08" <?php if($selectedtime=='08'){ echo "selected";} ?>>08 </option>    
	   <option value="09" <?php if($selectedtime=='09'){ echo "selected";} ?>>09 </option>    
	   <option value="10" <?php if($selectedtime=='10'){ echo "selected";} ?>>10 </option>    
	   <option value="11" <?php if($selectedtime=='11'){ echo "selected";} ?>>11 </option>    
	   <option value="12" <?php if($selectedtime=='12'){ echo "selected";} ?>>12 </option>    
	   <option value="13" <?php if($selectedtime=='13'){ echo "selected";} ?>>13 </option>    
	   <option value="14" <?php if($selectedtime=='14'){ echo "selected";} ?>>14 </option>    
	   <option value="15" <?php if($selectedtime=='15'){ echo "selected";} ?>>15 </option>    
	   <option value="16" <?php if($selectedtime=='16'){ echo "selected";} ?>>16 </option>    
	   <option value="17" <?php if($selectedtime=='17'){ echo "selected";} ?>>17 </option>    
	   <option value="18" <?php if($selectedtime=='18'){ echo "selected";} ?>>18 </option>    
	   <option value="19" <?php if($selectedtime=='19'){ echo "selected";} ?>>19 </option>    
	   <option value="20" <?php if($selectedtime=='20'){ echo "selected";} ?>>20 </option>    
	   <option value="21" <?php if($selectedtime=='21'){ echo "selected";} ?>>21 </option>    
	   <option value="22" <?php if($selectedtime=='22'){ echo "selected";} ?>>22 </option>    
	   <option value="23" <?php if($selectedtime=='23'){ echo "selected";} ?>>23 </option>    
	   <option value="24" <?php if($selectedtime=='24'){ echo "selected";} ?>>24 </option>    
  </select>&nbsp;
  
 <?
 }
 
 function BreadCurbNavigation($cmd){
 		global $Path_Home;
		$ReturnText="";
		if($cmd==1){
			$ReturnText="";
		}else{
			$ReturnText="<a href='/".$Path_Home."'>Home</a>";
		}
		switch($cmd){
			case 2:{
				$ReturnText.=" &raquo; Register";	
				break;
			}
			
			case 5:{
				$ReturnText.=" &raquo; Login";	
				break;
			}
			
			
			case 7:{
				$CATegory=$this->returnName("category","category","categoryID",$_REQUEST['category'],"");
				$ReturnText.=" &raquo; $CATegory";	
				break;
			}
			
			case 8:{
				$CATegory=$this->returnName("category","category","categoryID",$_REQUEST['category'],"");
				$SUBCATegory=$this->returnName("subcategory","subcategory","subcategoryID",$_REQUEST['subcategory'],"");
				$ReturnText.=" &raquo; <a href='/".$Path_Home.$this->ReplaceSpaces($CATegory)."/'>$CATegory</a> &raquo; $SUBCATegory";	
				break;
			}
			
			case 9:{
				$ReturnText.=" &raquo; Your Order";	
				break;
			}
			
			case 10:{
				$ReturnText.=" &raquo; Order Type";	
				break;
			}
			case 11:{
				$ReturnText.=" &raquo; Delivery Address";	
				break;
			}
			
			case 12:{
				$ReturnText.=" &raquo; Change Delivery Information";	
				break;
			}
			
			case 41:{
				$ReturnText.=" &raquo; Contact Us";	
				break;
			}
			
			case 14:{
				$ReturnText.=" &raquo; Order Confirmation";	
				break;
			}
			
			case 17:{
				$ReturnText.=" &raquo; Subscribe";	
				break;
			}
			
			case 40:{
				$ReturnText.=" &raquo; Feedback";	
				break;
			}
			
			case 43:{
				$ReturnText.=" &raquo; Special Offers";	
				break;
			}
			
			case 20:{
				$ReturnText.=" &raquo; Registration Successful";	
				break;
			}
			
			case 21:{
				//[Category] &raquo; [Subcategory] &raquo; Add Item to [Item Name]
				//$_REQUEST['txtproductsID']
				
				$query_product_name="SELECT CAT.category,P.product_name,SUBCAT.subcategory
	 								 FROM products P,category CAT,subcategory SUBCAT
									 WHERE productsID='$_REQUEST[txtproductsID]'
									 AND P.subcategoryID=SUBCAT.subcategoryID
									 AND CAT.categoryID=SUBCAT.categoryID";
				//$query_product_name;
				//die();
				$result_product_name=$this->ResultSet($query_product_name);
				$row_product_name=$this->FetchObject($result_product_name);
				$CATegory=$this->ReplaceSpaces($row_product_name->category);
				$SUBCATegory=$this->ReplaceSpaces($row_product_name->subcategory);
				$PROduct=$this->ReplaceSpaces($row_product_name->product_name);
				
				
				//$CATegory=$this->returnName("category","category","categoryID",$_REQUEST['category'],"");
				//$SUBCATegory=$this->returnName("subcategory","subcategory","subcategoryID",$_REQUEST['subcategory'],""));
				$ReturnText.=" &raquo; <a href='/".$Path_Home.$CATegory."/'>".$row_product_name->category."</a> &raquo; <a href='/".$Path_Home.$CATegory."/".$SUBCATegory."/'>".$row_product_name->subcategory."</a> &raquo; ".$row_product_name->product_name;	
				//$ReturnText.=" &raquo; <a href='/".$Path_Home.$this->ReplaceSpaces($CATegory)."/'>$CATegory</a> &raquo; <a href='/".$Path_Home.$this->ReplaceSpaces($CATegory)."/".$this->ReplaceSpaces($SUBCATegory)."'>".$SUBCATegory."</a> 67";	
				//$ReturnText.=" &raquo; Add Items to Order";	
				break;
			}
			
			case 23:{
				switch($_REQUEST['id']){
					case 0:{
						$ReturnText.=" &raquo; Contact Us";
						break;
					}
					case 3:{
						$ReturnText.=" &raquo; Useful Information";
						break;
					}
					case 4:{
						$ReturnText.=" &raquo; Opening Hours";
						break;
					}
					case 5:{
						$ReturnText.=" &raquo; Privacy Policy";
						break;
					}
					case 6:{
						$ReturnText.=" &raquo; Continue my Order";
						break;
					}
					case 7:{
						$ReturnText.=" &raquo; Terms and Conditions";
						break;
					}
					case 8:{
						$ReturnText.=" &raquo; Refund and Return Policy";
						break;
					}
					case 9:{
						$ReturnText.=" &raquo; Outdoor Catering";
						break;
					}
				}
				
				break;
			}
			
			case 24:{
				$ReturnText.=" &raquo; Lost Password Recovery";	
				break;
			}
			
			case 26:{
				$ReturnText.=" &raquo; Change Password";	
				break;
			}
			
			case 30:{
				$ReturnText.=" &raquo; Join Our Team";	
				break;
			}
			
			case 34:{
				$ReturnText.=" &raquo; Our Menu";	
				break;
			}
			
			case 35:{
				$ReturnText.=" &raquo; Branches";	
				break;
			}
			
			case 36:{
				$ReturnText.=" &raquo; Special Offers";	
				break;
			}
			
			case 42:{
				$ReturnText.=" &raquo; Wednesday Special Offer";	
				break;
			}
			
			case 37:{
				$ReturnText.=" &raquo; Search Results";	
				break;
			}
			
			case 45:{
				$ReturnText.=" &raquo; <a href='/lunch-menu/'>Lunch Menu</a> &raquo; Sandyford Branch Map";	
				break;
			}
			
		}///end of Switch	
		
 		return $ReturnText;
 }///end of function 
 

function ReplaceSpaces($name){
	$NAME=strtolower($name);
	$EXP=explode("(",$NAME);
	if(sizeof($EXP)>1){
		$NAME=substr($EXP[0],0,strlen($EXP[0])-1);	
	}else{
		$NAME=$EXP[0];	
	}
	
	
	$NAME=str_replace(" ","-",$NAME);
	$NAME=str_replace("/","-",$NAME);
	$NAME=str_replace("'","-",$NAME);
	$NAME=str_replace("&","-",$NAME);
	$NAME=str_replace("&amp;","-",$NAME);
	$NAME=str_replace("amp;","-",$NAME);
	$NAME=str_replace(" ","-",$NAME);
	$NAME=str_replace("'","-",$NAME);
	$NAME=str_replace("`","-",$NAME);
	$NAME=str_replace("`","-",$NAME);
	$NAME=str_replace("’","-",$NAME);
	$NAME=str_replace("-----","-",$NAME);
	$NAME=str_replace("----","-",$NAME);
	$NAME=str_replace("---","-",$NAME);
	$NAME=str_replace("--","-",$NAME);
	$NAME=str_replace("--","-",$NAME);
	$NAME=str_replace("--","-",$NAME);
	$NAME=str_replace("--","-",$NAME);
	$NAME=str_replace(",","",$NAME);
	$NAME=str_replace('&rdquo;','',$NAME);
	$NAME=str_replace('”','',$NAME);
	

	$lastChar=substr($NAME,strlen($NAME)-1,strlen($NAME)-1);
	if($lastChar=='-'){
		$NAME=substr($NAME,0,strlen($NAME)-2);
	}
	return $NAME;
}////end of function


 
}//endof class
?>
