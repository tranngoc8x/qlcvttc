(function () {
	var input = document.getElementById("file"), 
		formdata = false;

	function showUploadedItem (source) {
  		var list = document.getElementById("image-list"),
	  		li   = document.createElement("li"),
	  		img  = document.createElement("img");
  		img.src = source;
  		li.appendChild(img);
		list.appendChild(li);
	}   

	if (window.FormData) {
  		formdata = new FormData();
  		//document.getElementById("add_vbdt").style.display = "none";
	}
	
 	input.addEventListener("change", function (evt) {
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			//if (!!file.type.match(/file.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("files[]", file);
				}
			//}	
		}
	
		if (formdata) {
			//alert(formdata);
			$.ajax({
				url: "tasks/addfile/2",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
				document.getElementById("response").innerHTML = res; 
				}
			});
		}
	}, false);
}());
