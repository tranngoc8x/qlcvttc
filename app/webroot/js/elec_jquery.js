function getElecs(d,id){
	var url = "getJsElec/" + d + "/" + id;
	$.ajax({	url: url,
				dataType: "html", 
				cache: false,
				success: function (data) 
				{
					var ar = data.split('_');
					//date-id-chiso-sotieuthu
					$("#item_"+ar[0]+"_"+ar[1]).html(ar[2]);
					$("#cso_"+(ar[0])+"_"+ar[1]).html(ar[3]);
				}
	});
}