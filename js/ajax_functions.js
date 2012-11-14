//---------------Global Varibale---------------
var div_name,row_name;
var div_name2,user_name,password;
//--------------file uplder variable-----------------------
var uploader="";
var uploadDir="";
var dirname="";
var filename="";
var filepaths="";
var timeInterval="";
var idname="";

/////////// prototype ajax functions 
function reportError(request)
{
	alert('error report'+ request.responseText);
}
function reportException(request)
{
	alert('error exception'+ request.responseText);
}
function showdeadcenterdiv() {
// First, determine how much the visitor has scrolled

var scrolledX, scrolledY;
if( self.pageYoffset ) {
scrolledX = self.pageXoffset;
scrolledY = self.pageYoffset;
} else if( document.documentElement && document.documentElement.scrollTop ) {
scrolledX = document.documentElement.scrollLeft;
scrolledY = document.documentElement.scrollTop;
} else if( document.body ) {
scrolledX = document.body.scrollLeft;
scrolledY = document.body.scrollTop;
}

// Next, determine the coordinates of the center of browser's window

var centerX, centerY;
if( self.innerHeight ) {
centerX = self.innerWidth;
centerY = self.innerHeight;
} else if( document.documentElement && document.documentElement.clientHeight ) {
centerX = document.documentElement.clientWidth;
centerY = document.documentElement.clientHeight;
} else if( document.body ) {
centerX = document.body.clientWidth;
centerY = document.body.clientHeight;
}

// Xwidth is the width of the div, Yheight is the height of the
// div passed as arguments to the function:
var Xwidth=$('preloading').offsetWidth-300;
var Yheight=$('preloading').offsetHeight;
//alert(Xwidth);
//alert(Yheight);
//Xwidth=800;
//Xeight=800;
var leftoffset = scrolledX + (centerX - Xwidth) / 2;
var topoffset = (scrolledY + (centerY - Yheight) / 2)-300;
// The initial width and height of the div can be set in the
// style sheet with display:none; divid is passed as an argument to // the function
var o=document.getElementById('preloading');
var r=o.style;
r.position='absolute';
r.top = topoffset + 'px';
//r.left = leftoffset + 'px';
/*r.display = "block";*/
$('preloading').style.visibility=	"visible";
Effect.Appear('preloading');
}


function getHeight() {
	var document_body = Screen.getBody();
	var innerHeight =(defined(self.innerHeight)&&!isNaN(self.innerHeight))?self.innerHeight:0;
	if (!document.compatMode || document.compatMode=="CSS1Compat") {
		var topMargin = parseInt(CSS.get(document_body,'marginTop'),10) || 0;
		var bottomMargin = parseInt(CSS.get(document_body,'marginBottom'), 10) || 0;
		return Math.max(document_body.offsetHeight + topMargin + bottomMargin,document.documentElement.clientHeight,document.documentElement.scrollHeight, Screen.zero(self.innerHeight));
		}
	return Math.max(document_body.scrollHeight, document_body.clientHeight,Screen.zero(self.innerHeight));
}
function showLoader(request)
{
  if($('iframe_bg'))
  {	
	 var iframe = $('iframe_bg');
    iframe.style.display = 'block';
	iframe.style.height = getHeight()+'px';
	//$('preload_bg').style.display='block';
	$('preloading').style.display='block';
  }
}
function destory_loader(request)
{
  if($('iframe_bg'))
  {
   $('iframe_bg').style.display='none';
   $('preloading').style.display='none';
  }
}
function send_ajax_request(url,params,success_method,error_method)
{
	var ajax = new Ajax.Request(url,
										{
											method: 'POST',
											parameters: params,
											onSuccess: success_method,
											onFailure: error_method,
											onException: reportException,
											onLoading: showLoader
											/*onLoaded: showLoader,
											onInteractive: showLoader*/
											
										}
									)
}

/////////// end /////////// prototype ajax functions 


function fill_album(base_dir,base_url,div,file_path,id)
{
	
	div_name=div;	
	var url = base_url+"/include/ajax/php/"+file_path;
	var params = 'BASE_DIR='+base_dir+'&id='+id;
	
	send_ajax_request(url,params,ViewSuccess,reportError);
}
function imp(base_dir,base_url,file_path,id)
{
	
	
	var url = base_url+"/include/ajax/php/"+file_path;
	var params = 'BASE_DIR='+base_dir+'&id='+id;
	
	send_ajax_request(url,params,as,reportError);
	
}
function as(request){
	
	}
function user(a)
{
	user_name = a;
	
}
function pass(a)
{
	password = a;
}
function loginnn(base_dir,base_url,div,file_path)
{
		
	div_name=div;	
	var url = base_url+"/include/ajax/php/"+file_path;
	var params = 'BASE_DIR='+base_dir+'&user_name='+user_name+'&password='+password;
	
	send_ajax_request(url,params,ViewSuccess,reportError);
}

function ViewSuccess(request)
{
	$(div_name).innerHTML=request.responseText;
	
}
function paging(base_url,base_dir,file_name,start_limit,category_id,search_text,page_no,extra1,extra2){
	
	
			
			var url = base_url+"/include/ajax/php/"+file_name;
			div_height=$('main_div').offsetHeight;
			$('main_div').style.height=div_height+'px';
			margin=div_height/2;
			$('main_div').innerHTML="<img src='"+base_url+"/images/wait.gif' style='margin-top:"+margin+"px;' />"
			var i=1;
			while($('page_no'+i))
			{
				if(i==page_no)
				{
					$('page_no'+page_no).addClassName('page_link page_active');
				}
				else
				{
					$('page_no'+i).removeClassName('page_active');
					//$('page_no'+i).addClassName('page_link');
					
				}
				i++;
			}
			//$('p_no').innerHTML=page_no;
	
			var params = 'start_limit='+ start_limit+'&BASE_DIR='+ base_dir+'&category_id='+category_id+'&search_text='+search_text+'&extra1='+extra1+'&extra2='+extra2;
			send_ajax_request(url,params,paging_ViewSuccess,reportError);
			
	
}
function paging_ViewSuccess(request)
{
	
	str=request.responseText;
	if(str=='error')
	{
		alert(str);
	}else
	{
				
		$('main_div').style.height='';
		$('main_div').innerHTML=str;
		//setTimeout("Effect.Appear('main_div');",800);
		//Effect.Pulsate('main_div');
	}
	
}


function pub(id,aid)
{
		
	div_name=aid;	
	var url ="ajax/pub.php";
	if($(aid).innerHTML == 'Yes')
		var params = 'pub=no&id='+id;
	else
		var params = 'pub=yes&id='+id;
	
	send_ajax_request(url,params,ViewSuccess,reportError);
}

function ViewSuccess(request)
{
	if($(div_name).innerHTML == 'Yes')
	{
		$(div_name).innerHTML='No';
		
	}
	else
	{
		$(div_name).innerHTML='Yes';
	}
}

function editrow(rid,id)
{
	div_name=rid;	
	var url ="ajax/edit.php";
	
	var params = 'id='+id;
alert(id);
	send_ajax_request(url,params,ViewEditSuccess,reportError);
}	


function ViewEditSuccess(request)
{
	new Effect.BlindDown('iframe_bg1');
	new Effect.Appear('show_information');
	$('show_information').innerHTML=request.responseText;
}

function closee()
{
	new Effect.Fade('iframe_bg1');
	new Effect.Fade('show_information');
}

function EditSuccess(request)
{
	$(div_name).innerHTML=request.responseText;
	new Effect.Fade('iframe_bg1');
	new Effect.Fade('show_information');
}


function saveval(id)
{

	var url ="ajax/save.php";
	var t = $('id').value;
	var s = $('name').value;
	var l = $('to').value;
	var p = $('from').value;
	var c = $('carton').value;
	var w = $('weight').value;
	var st = $('status').value;
	
	var params = 'idd='+t+'&name='+s+'&carton='+c+'&to='+l+'&from='+p+'&weight='+w+'&status='+st+'&id='+id;

	send_ajax_request(url,params,EditSuccess,reportError);
}	


function addnew()
{
	
	var url ="ajax/new.php";
	
	var params = '';

	send_ajax_request(url,params,ViewEditSuccess,reportError);
}	



function savevalnew()
{

	var url ="ajax/save2.php";
	var t = $('id').value;
	var s = $('name').value;
	var l = $('to').value;
	var p = $('from').value;
	var c = $('carton').value;
	var w = $('weight').value;
	var st = $('status').value;
	
	var params = 'id='+t+'&name='+s+'&carton='+c+'&to='+l+'&from='+p+'&weight='+w+'&status='+st;

	send_ajax_request(url,params,SaveSuccess,reportError);
}	


function SaveSuccess(request)
{
	$('main_div').innerHTML=request.responseText;
	new Effect.Fade('iframe_bg1');
	new Effect.Fade('show_information');
	new Effect.Appear('main_div');
}

function del(id,rid)
{
	var res = window.confirm('Are Yoy Aure You Want To Delete This Record?');
	if(res == true)
	{
		div_name=rid;	
		var url ="ajax/delete.php";
		
		var params = 'id='+id;
	
		send_ajax_request(url,params,delSuccess,reportError);
	}
}	
function delSuccess(request)
{
	new Effect.Fade(div_name);

}
