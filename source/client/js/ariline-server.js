var SERVER = "../server/api/";
// chứa data lấy từ server về
var adata = [];
// chứa trạng thái của request
var aobj = [];

var fdata = {};
var tdata = {};
// Giao diện tìm kiếm
function lay_danh_sach_san_bay_di() {
	var path = SERVER + "chuyendi/";
	aobj = $.get(path, function(data, status) {
		if (status == 'success') {
			adata = jQuery.parseJSON(data);
			
			fdata['parameters'] = [];
			var arr = adata.DATA;

		    for(var i=0; i < arr.length; i++) {
		    	var obj = arr[i];
		    	if (!fdata[obj.KHUVUC]) {
		    		fdata[obj.KHUVUC] = [];
		    		fdata['parameters'].push(obj.KHUVUC);
		    	}
		    	fdata[obj.KHUVUC].push(obj);
		    }

		    for (var i = 0; i<fdata['parameters'].length; i++) {
			    var html = "<optgroup label='{0}'>{1}<optgroup>";
			    var fm = "";
			    var arr_fdata = fdata[fdata['parameters'][i]];

			    for (var j=0; j < arr_fdata.length; j++) {
			    	var obj = arr_fdata[j];
		    		fm += String.format(" <option value='{0}'>{1}</option>", obj.MA, obj.MOTA);
			    }
		    	html = String.format(html, fdata['parameters'][i], fm);
		    	$('#from').append(html);
		    }
		    $("#from").trigger("chosen:updated");
		}
	});
}

function lay_danh_sach_san_bay_den(masanbaydi) {
	var path = SERVER + "chuyendi/?sanbayden/" + masanbaydi;
	aobj = $.get(path, function(data, status) {
		if (status == 'success') {
			adata = jQuery.parseJSON(data);
			tdata = [];
			tdata['parameters'] = [];
			
			var arr = adata.DATA;
		    for(var i=0; i < arr.length; i++) {
		    	var obj = arr[i];
		    	if (!tdata[obj.KHUVUC]) {
		    		tdata[obj.KHUVUC] = [];
		    		tdata['parameters'].push(obj.KHUVUC);
		    	}
		    	tdata[obj.KHUVUC].push(obj);
		    }

		   	$('#to').html("");

		    for (var i = 0; i<tdata['parameters'].length; i++) {
			    var html = "<optgroup label='{0}'>{1}<optgroup>";
			    var fm = "";
			    var arr_fdata = tdata[tdata['parameters'][i]];

			    for (var j=0; j < arr_fdata.length; j++) {
			    	var obj = arr_fdata[j];
		    		fm += String.format(" <option value='{0}'>{1}</option>", obj.MA, obj.MOTA);
			    }
		    	html += String.format(html, tdata['parameters'][i], fm);
		    	$('#to').append(html);
		    }
		    $("#to").trigger("chosen:updated");
		}
	});
}
// giao diện chọn chuyến bay sẽ đi
function tim_kiem_chuyen_bay(sanbayden, sanbaydi, ngay, soluong) {
	var path = SERVER + "chuyenbay/?{0}/{1}/{2}/{3}";
	path = String.format(path, sanbayden, sanbaydi, ngay, soluong);
	aobj =  $.get(path, function(data, status) {
		if (status == 'success') {
			adata = jQuery.parseJSON(data);
		}
	});
}
// giao diện đặt chô


// giao diện xem danh sách chuyến bay