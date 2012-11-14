function updateprice(){
	var tqty,btqty,stqty,i,price,qty,sqty,sprice,bprice,bqty,TotalPrice,TotalSPrice,TotalPr,GP,subtotal,bsubtotal,ssubtotal,freight,freight1;
	totalfields=parseInt($('tqty').value);
    TotalPrice=parseFloat(TotalPrice);
    subtotal=parseInt(subtotal);
    bsubtotal=parseInt(bsubtotal);
    ssubtotal=parseInt(ssubtotal);
    freight1=parseInt(freight1);
    freight=parseInt(freight);
    
    GP=0;
    TotalPr=0;
    
	for(i=0;i<totalfields;i++){
		if($('qty'+i).value==''){
			$('qty'+i).value=0;
		}
						
		qty=parseFloat($('qty'+i).value);
		price=parseFloat($('price'+i).value);
		TotalPrice=qty*price;
		if(TotalPrice=='NaN'){
			TotalPrice=0;
		}
		
		TotalPr=TotalPr+TotalPrice;
		
		$('TPrice'+i).innerHTML='$'+TotalPrice.toFixed(2);
		
	}///end of Qty
    subtotal=TotalPr;
    
    totalfields=parseInt($('stqty').value);
    TotalPrice=0;
    for(i=0;i<totalfields;i++){
		if($('sqty'+i).value==''){
			$('sqty'+i).value=0;
		}
						
		qty=parseFloat($('sqty'+i).value);
		price=parseFloat($('sprice'+i).value);
		TotalPrice=qty*price;
        if(TotalPrice=='NaN'){
		    TotalPrice=0;
		}
		
		TotalPr=TotalPr+TotalPrice;
		  
		$('sTPrice'+i).innerHTML='$'+TotalPrice.toFixed(2);
    	
	}///end of For loop sqty
    ssubtotal=TotalPr-subtotal;
    
    totalfields=parseInt($('btqty').value);
    TotalPrice=0;
    for(i=0;i<totalfields;i++){
		if($('bqty'+i).value==''){
			$('bqty'+i).value=0;
		}
						
		qty=parseFloat($('bqty'+i).value);
		price=parseFloat($('bprice'+i).value);
		TotalPrice=qty*price;
		if(TotalPrice=='NaN'){
		    TotalPrice=0;
		}
		
		TotalPr=TotalPr+TotalPrice;
		
		$('bTPrice'+i).innerHTML='$'+TotalPrice.toFixed(2);
		
	}///end of For loop sqty
    bsubtotal=TotalPr-ssubtotal-subtotal;
    
    $('subtotal').innerHTML='$'+subtotal.toFixed(2);
    $('ssubtotal').innerHTML='$'+ssubtotal.toFixed(2);
    $('bsubtotal').innerHTML='$'+bsubtotal.toFixed(2);;
    /*$('TotalPrices').innerHTML='$'+TotalPr.toFixed(2);;*/
    $('TotalOrderPrices').innerHTML='$'+TotalPr.toFixed(2);
    
    /* Calculate Freight */
    if(TotalPr > 0 && TotalPr < 5001){
        freight=4.0;
        freight1=(TotalPr*freight)/100;
    }else if(TotalPr > 5000 && TotalPr < 10001){
        freight=3.5;
        freight1=(TotalPr*freight)/100;
    }else if(TotalPr > 10000 && TotalPr < 20001){
        freight=3.0;
        freight1=(TotalPr*freight)/100;
    }else if(TotalPr > 20000 && TotalPr < 50001){    
        freight=2.0;
        freight1=(TotalPr*freight)/100;
    }else{
        freight=0;
        freight1=0;
    }
    
    $('freight').innerHTML='$'+freight1.toFixed(2);
    $('txtFreight').value=freight1.toFixed(2);
    $('TotalPrices').innerHTML='$'+(TotalPr+freight1).toFixed(2);
}////end of update price table