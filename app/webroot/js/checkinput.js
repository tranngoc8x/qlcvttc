function docheck(status,from_){
	var alen=document.frmList.checkid.length;
	if (alen>1){
		for(var i=0;i<alen;i++)
		document.frmList.checkid[i].checked=status;
	}else
		document.frmList.checkid.checked=status;
		if(from_>0)
		document.frmList.checkall.checked=status;
		calculatechon();
}
function docheckone(){
	var alen=document.frmList.checkid.length;
	var isChecked=true;
	if (alen>1){
		for(var i=0;i<alen;i++)
		if(document.frmList.checkid[i].checked==false)
		isChecked=false;
	}else{
		if(document.frmList.checkid.checked==false)
		isChecked=false;
	}				
	document.frmList.checkall.checked=isChecked;
}
function calculatechon(){
	var strchon="";
	var isChecked=true;
	var alen=document.frmList.checkid.length;				
	if (alen>1){
		for(var i=0;i<alen;i++)
		if(document.frmList.checkid[i].checked==true)
			strchon+=document.frmList.checkid[i].value+",";
		else
			isChecked=false;
	}else{
		if(document.frmList.checkid.checked==true)
			strchon=document.frmList.checkid.value;
		else
			isChecked=false;
	}
	document.frmList.checkall.value=strchon;	
	document.frmList.checkall.checked=isChecked;
}
function checkInput(){
	var alen=document.frmList.checkid.length;
	var isChecked=false;
	if (alen>1){
		for(var i=0;i<alen;i++)
			if(document.frmList.checkid[i].checked==true)
				isChecked=true;
			}else{
			if(document.frmList.checkid.checked==true)
				isChecked=true;
			}
	calculatechon();
	if (!isChecked)											
		alert("Bạn phải chọn ít nhất 1 mục để xóa !");
	else
		return isChecked;
}