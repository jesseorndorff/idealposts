// JavaScript Document
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

function maskSSN(fldVal,namaform,n){
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
}
