// JavaScript Document


function checkRegister(){
	
	var header="Add User  Form \n---------------------------------\n";
	var message="";
	var flage;
	flage=false;
	if(document.frmRegister.Rfirstname.value==""){
		message=message+"-> Please Enter First Name\n";
		flage=true;
	}
	if(document.frmRegister.Rlastname.value==""){
		message=message+"-> Please Enter Last Name\n";
		flage=true;
	}
	
	if(document.frmRegister.Rpass.value==""){
		message=message+"-> Please Enter Password\n";
		flage=true;
	}
	
	if(document.frmRegister.Remail.value==""){
		message=message+"-> Please Enter Email\n";
		flage=true;
	}else{
	
  		if(EmailCheck(document.frmRegister.Remail.value)==false){
			message=message+"-> Please Enter Valid Email\n";
		flage=true;
		}
	
	}
	
	if(document.frmRegister.Rage.value==""){
		message=message+"-> Please Enter Age\n";
		flage=true;
	}
	
	if(document.frmRegister.RcountryID.value==0){
		message=message+"-> Please Select Country\n";
		flage=true;
	}
	
	if(document.frmRegister.Rpostcode.value==""){
		message=message+"-> Please Enter Post Code\n";
		flage=true;
	}
	
	if(document.frmRegister.Rgender.value==0){
		message=message+"-> Please Select Gender\n";
		flage=true;
	}
	
	
	if(flage==true){
		document.frmRegister.Rfirstname.focus();
		alert(header+message);
		return false;
	}else{
		document.frmRegister.submit();
	}//end of if
}//end of checklogin() function 






function checkEditRegister(){
	
	var header="Add User  Form \n---------------------------------\n";
	var message="";
	var flage;
	flage=false;
	if(document.frmRegister.Rfirstname.value==""){
		message=message+"-> Please Enter First Name\n";
		flage=true;
	}
	if(document.frmRegister.Rlastname.value==""){
		message=message+"-> Please Enter Last Name\n";
		flage=true;
	}
	
	if(document.frmRegister.Remail.value==""){
		message=message+"-> Please Enter Email\n";
		flage=true;
	}else{
	
  		if(EmailCheck(document.frmRegister.Remail.value)==false){
			message=message+"-> Please Enter Valid Email\n";
		flage=true;
		}
	
	}
	
	if(document.frmRegister.Rage.value==""){
		message=message+"-> Please Enter Age\n";
		flage=true;
	}
	
	if(document.frmRegister.RcountryID.value==0){
		message=message+"-> Please Select Country\n";
		flage=true;
	}
	
	if(document.frmRegister.Rpostcode.value==""){
		message=message+"-> Please Enter Post Code\n";
		flage=true;
	}
	
	if(document.frmRegister.Rgender.value==0){
		message=message+"-> Please Select Gender\n";
		flage=true;
	}
	
	
	if(flage==true){
		document.frmRegister.Rfirstname.focus();
		alert(header+message);
		return false;
	}else{
		document.frmRegister.submit();
	}//end of if
}//end of checkEditRegister() function 




function EmailCheck(src) {
     var emailReg = ".+@.+\\.[a-z]+";
     var regex = new RegExp(emailReg);
     return regex.test(src);
  }






function checkMethod(){
	var header="Login Form \n-----------------------------\n";
	var message="";
	var flage;
	flage=false;
	if(document.frm.username.value==""){
		message=message+"-> Please Enter Login Name\n";
		flage=true;
	}//end of if
	if(document.frm.password.value==""){
		message=message+"-> Please Enter The Passsword\n";
		flage=true;
	}//end of if
	
	//billingaddress 
	if(flage==true){
		alert(header+message);
		return false;
	
	}//end of flage=true;
}//end of function


function getIndex(what) {
    for (var i=0;i<document.frm.elements.length;i++)
        if (what == document.frm.elements[i])
            return i;
    return -1;
}
function test(what) {
     return getIndex(what);
}
function insertDash(angka){
    	var depan,belakang,hasil;
    	depan= angka.substr(0,1);
    	belakang= angka.substr(1,3);
    	hasil = depan+'-'+belakang;
    	return hasil;
}//end of function

function maskSSN(fldVal,namaform,n,fname){
   	var awal,akhir,tmp,tengah;
    keyCount = fldVal.length;
    keyCount++;
    switch (keyCount){
        case 4: 
	        namaform.elements[n].value = insertDash(fldVal) ;
    	break;
        case 7:
        	awal = fldVal.substr(0,1);
			
	        akhir = fldVal.substr(2,4);
			namaform.elements[n].value = awal+insertDash(akhir);
        break;
        case 8:
        	awal = fldVal.substr(0,2);
//			alert(awal)
        	akhir = fldVal.substr(3,4);
	        namaform.elements[n].value = awal+insertDash(akhir);
        break;
       	case 9:
        	awal = fldVal.substr(0,3);
	        akhir = fldVal.substr(4,4);
    	   tmp = awal + insertDash(akhir);
	       	awal = tmp.substr(0,4);
        	akhir = tmp.substr(4,4);
	        namaform.elements[n].value = insertDash(awal)+ akhir;
        break;
        case 11:
        	 awal = fldVal.substr(0,5);
    	    akhir = fldVal.substr(6,4);
        	tmp = awal + insertDash(akhir);
        	awal = tmp.substr(0,1);
        	tengah = tmp.substr(2,4);
	        akhir = tmp.substr(6,4);
    	    namaform.elements[n].value = awal+insertDash(tengah)+ akhir;
        break;
		
        case 12:
        	awal = fldVal.substr(0,6);
	        akhir = fldVal.substr(7,4);
    	    tmp = awal + insertDash(akhir);
        	awal = tmp.substr(0,2);
        	tengah = tmp.substr(3,4);
	        akhir = tmp.substr(7,4);
	        namaform.elements[n].value = awal+insertDash(tengah)+ akhir;
        break;
		
    } 
	
		var header="Add Resturant Form \n-------------------------------------\n";

	var argvalue= fldVal;
	for (var n = 0; n < argvalue.length; n++){
		if ((argvalue.substring(n, n+1) != "-") && (argvalue.substring(n, n+1) < "0" || argvalue.substring(n, n+1) > "9")){
			
			alert(header+"Please Enter Numerics!");
			 namaform.elements[fname].value="";
			 namaform.elements[fname].focus();
			return false;
		}//end of if
	}//end of if
	
}
function checkdash(fldVal,formname,n,fname){
	//alert(fldVal);	
	len=fldVal.length;
	//alert(len);
	var j=0;
	for(i=0;i<len;i++){
		//alert(fldVal.substring(i,i+1));
		//alert(fldVal.indexOf("-"));
if((fldVal.substring(i, i+1) == "-") )
j++;


}
	if(j>2||j<2)
	{
alert('Please enter proper format');
 		formname.elements[fname].value="";
		formname.elements[fname].focus();
return false;
	}

}//end function
function checkdash1(fldVal,formname,n,fname){
	//alert(fldVal);	
	len=fldVal.length;
	alert(len);
	for(i=0;i<len;i++){
		//alert(fldVal.substring(i,i+1));
		//alert(fldVal.indexOf("-"));
	}
//	substr(

}



function deleteOrder(row,id)
{

	var res = window.confirm('Are Yoy Aure You Want To Delete This Record?');
	if(res == true)
	{
		div_name=row;	
		var url ="js/ajax/deleteOrder.php";
		
		var params = 'id='+id;
	
		send_ajax_request(url,params,delSuccess,reportError);
	}
}	

function deleteProduct(row,id)
{

	var res = window.confirm('Are Yoy Aure You Want To Delete This Record?');
	if(res == true)
	{
		div_name=row;	
		var url ="js/ajax/deleteProduct.php";
		
		var params = 'id='+id;
	
		send_ajax_request(url,params,delSuccess,reportError);
	}
}	

function deleteDistributer(row,id)
{

	var res = window.confirm('Are Yoy Aure You Want To Delete This Record?');
	if(res == true)
	{
		div_name=row;	
		var url ="js/ajax/deleteDistributer.php";
		
		var params = 'id='+id;
	
		send_ajax_request(url,params,delSuccess,reportError);
	}
}

function delSuccess(request)
{
	
	if(request.responseText == 'yes')
	{
		new Effect.Fade(div_name);
	}
	else
	{
		$(div_name).innerHTML = '<span style="color:red"> Sorry Error Occurred  </span>';
	}

}

function changePassDIV()
{
		Effect.SlideDown('changePassDivv');
}

function updatePass(id)
{
	var p = $('pass').value;
	if(p != '')
	{
		var url ="js/ajax/updatePass.php";
		
		var params = 'id='+id+'&pass='+p;
	
		send_ajax_request(url,params,updatePSuccess,reportError);
	}
	else
	{
		$('msgP').innerHTML = 'Empty Password';	
	}
}

function updatePSuccess(request)
{
	
	if(request.responseText == 'yes')
	{
		$('msgP').innerHTML = 'Password Updated Successfully';	
		setTimeout('closeDIV()',3000);
	}
	else
	{
		$('msgP').innerHTML = 'Error';	
	}
	
}
function closeDIV()
{
	$('msgP').innerHTML = '';
	$('pass').value = '';
	Effect.BlindUp('changePassDivv');
}

function updateStatus(id)
{

	var res = window.confirm('Are Yoy Aure You Want To Update The Status Of This Record?');
	if(res == true)
	{
		div_name='orCOM2_'+id;
		var anch = 'orCOM2_'+id;
		var st = '';
		if( $(anch).innerHTML == 'Completed' )
			st = 'No';
		else
			st = 'Yes';
		
		var url ="js/ajax/updateStatus.php";
		
		var params = 'id='+id+'&st='+st;
	
		send_ajax_request(url,params,updateROWSuccess,reportError);
	}
}

function updateROWSuccess(request)
{
	
	if(request.responseText == 'yes')
	{
		if( $(div_name).innerHTML == 'Completed' )
			$(div_name).innerHTML = 'Pending';	
		else
			$(div_name).innerHTML = 'Completed';
	}
	else
	{
		$(div_name).innerHTML = 'Error';	
	}
	
}
function approved(base_url,record_id,ancor_id,file_name,table,field_publish,field_where){
	//div_name='resultView'+div_id;
	var anchorText = $(ancor_id);
			if (anchorText.innerHTML=='Yes')
			{
				
				anchorText.innerHTML='No';
				
			}else
			{
				anchorText.innerHTML='Yes';
			}
	
			var url = file_name;
			var params = 'record_id='+ record_id +'&table='+table +'&field_publish='+ field_publish+'&field_where='+field_where;
			send_ajax_request(url,params,approved_Success,reportError);
			
	
}
function approve_orders(base_url,record_id,ancor_id,file_name,table,field_publish,field_where){
	//div_name='resultView'+div_id;
	var anchorText = $(ancor_id);
			if (anchorText.innerHTML=='Completed')
			{
				
				anchorText.innerHTML='Pending';
				
			}else
			{
				anchorText.innerHTML='Completed';
			}
	
			var url = file_name;
			var params = 'record_id='+ record_id +'&table='+table +'&field_publish='+ field_publish+'&field_where='+field_where;
			send_ajax_request(url,params,approved_Success,reportError);
			
	
}

function update_payment(base_url,record_id,ancor_id,file_name,table,field_publish,field_where){
	//div_name='resultView'+div_id;
	var anchorText = $(ancor_id);
			if (anchorText.innerHTML=='Completed')
			{
				
				anchorText.innerHTML='Pending';
				
			}else if (anchorText.innerHTML=='Pending')
			{
				anchorText.innerHTML='Cancelled';
			}
			else if (anchorText.innerHTML=='Cancelled')
			{
				anchorText.innerHTML='Completed';
			}
	
			var url = file_name;
			var params = 'record_id='+ record_id +'&table='+table +'&field_publish='+ field_publish+'&field_where='+field_where;
			send_ajax_request(url,params,approved_Success,reportError);
			
	
}

function approved_Success(request)
{
	
	///alert(request.responseText);
	request.responseText;
	//Effect.SlideDown(div_name);
}
function check_user_availablity(div_id,file_name,username){
	
	div_name=div_id;
	if(username==''){
		$(div_name).innerHTML = 'Please enter the username';
		$('username').focus();
		return;
	}
	$(div_name).innerHTML = 'Checking . . . .';
	//var anchorText = $(ancor_id);
	var url = file_name;
	var params = 'username='+ username;
	send_ajax_request(url,params,check_user_availablitySuccess,reportError);
	//anchorText.innerHTML=hide_text;
}
function check_user_availablitySuccess(request)
{
	//alert(request.responseText);
	//destory_loader();
	$(div_name).innerHTML = request.responseText;
	/*eval(document.getElementById('AjaxUpdaterCode').innerHTML);*/
	//alert($(AjaxUpdaterCode).innerHTML);
	
	//$(galleryClass).style.class='active'
	/*destory_loader();*/
	/*
	Effect.BlindDown(div_name);
	init_dw_Scroll();
	*/
	/*destory_loader();*/
	
}