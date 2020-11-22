function xulysubmit()
{
	//alert("chao ban");
	//C1: truy xuat thanh phan nam tren form theo ten cua form:  document.frmdangky.txtHoTen (truy xuat den doi tuong <input type="text" value="" name="txtHoTen" placeholder="Usser Name" />)
	//C2: truy xuat theo ID cua đối tượng (document.getElementById("idtxtDiaChi")
	//C3: Lay theo document.getElementsByName("demo");
	var username=document.frmdangky.txtHoTen;
	var CMT=document.getElementsByName("txtCMT");

	if(username.value=="")
	{	
		alert("Vui lòng nhập họ và tên");
		username.focus();
		document.getElementById("txtHoTenError").style.display="block";
		return false;
	}
	else 
	{
		document.getElementById("txtHoTenError").style.display="none";
	}
	if(CMT[0].value=="")
	{
		alert("Vui lòng điền số chứng minh nhân dân");
		CMT[0].focus;
		document.getElementById("txtCMTError").style.display="block";
		CMT[0].focus();
		return false;
	}
	else
	{
		document.getElementById("txtCMTError").style.display="none";
	}
	
	return true;
}
function hideerrormessage()
{
	document.getElementById("txtHoTenError").style.display="none";
	document.getElementById("txtCMTError").style.display="none";
	document.getElementById("txtNgayThueError").style.display="none";
	document.getElementById("txtNgayTraError").style.display="none";
}

window.onload = function()
{
    hideerrormessage();
};
function tinhTien() 
{
	var selectBox = document.getElementById("idtxtMucGia");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	var mucgia=document.getElementById("idtxtMucGia");
	var loaiphong=document.getElementById("idtxtPTT");
	var mucgia_loaiphong = parseInt(mucgia.value) + parseInt(mucgia.value*loaiphong.value);	
	var ansang=document.getElementById("idtxtAnSang");
	var	antrua=document.getElementById("idtxtAnTrua");
	var antoi =document.getElementById("idtxtAnToi" );
	var dichvu= 0;

	if ( selectedValue< 300 )
	{
		if ( ansang.checked ) dichvu = parseFloat(dichvu) + parseFloat(ansang.value);
	}
	if ( antrua.checked ) dichvu = parseFloat(dichvu) + parseFloat(antrua.value);
	if ( antoi.checked ) dichvu  = parseFloat(dichvu) + parseFloat(antoi.value);

	dichvu = parseFloat(dichvu) * parseInt(mucgia_loaiphong);
	mucgia_loaiphong = parseInt(dichvu) + parseInt(mucgia_loaiphong);
	document.getElementById("idtxtDonGia").value = mucgia_loaiphong + " VND";
}
function changeFunc() 
{
    var selectBox = document.getElementById("idtxtMucGia");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	if ( selectedValue > 150 ) 
	{
		document.getElementById("idtxtAnSang").checked= true;
	}
}