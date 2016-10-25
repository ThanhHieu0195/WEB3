var SERVER = "../server/api/";
var FLINGTS = "flights.html";
var PAYMENT = "flight-payment-unregistered.html";
SUCCESS_PAYMENT = "success-payment.html";
// chứa data lấy từ server về
var adata = [];
// chứa trạng thái của request
var aobj = [];

var fdata = {};
var tdata = {};

function removeAllCookie() {
	var cookies = $.cookie();
	for(var cookie in cookies) {
	   $.removeCookie(cookie);
	}
}
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
			var arr = adata.DATA;
			var html = "";
			var fm = '<li><div class="booking-item-container"><div class="booking-item"><div class="row"><div class="col-md-2"><div class="booking-item-airline-logo"><img src="img/lufthansa.jpg" alt="Image Alternative text" title="Image Title" /><p>Chuyến đi</p></div></div><div class="col-md-5"><div class="booking-item-flight-details"><div class="booking-item-departure"><i class="fa fa-plane"></i><h5>{0}</h5><p class="booking-item-date">{1}</p><p class="booking-item-destination">{2}</p></div></div></div><div class="col-md-2"><h5>{3}</h5><p>{4}</p></div><div class="col-md-3"><span>{5}VND</span><span>/person</span><p class="booking-item-flight-class">Class: Economy</p><a class="btn btn-primary" onclick="select()" href="#">Select</a></div></div></div></div></li>';
			for (var i = 0; i < arr.length; i++) {
				var obj = arr[i];
				html += String.format(fm, obj.gio, obj.ngay, obj.noidi + " - " +  obj.noiden, "20h 30m", "non stop", obj.giaban, obj);
			}
			$('.booking-list').html(html);
		}
	});
}


function tao_dat_cho(tongtien) {
	var path = SERVER + "datcho/";
	$.post(path, {tongtien: tongtien}, function(data, textStatus, xhr) {
		json = jQuery.parseJSON(data);
		if (textStatus == "success") {
			$.cookie('madatcho', json.DATA.ma);
		}
	});
}

// giao diện đặt chô


// giao diện xem danh sách chuyến bay