var num = parseInt($.cookie('num'));
var tongtien = parseInt($.cookie('tongtien'));
var html ="";
for (var i = 0; i < num; i++) {
	var fm = '<div class="row"><div class="col-md-4"><div class="form-group"><label>Danh xưng</label><input name="danhxung" class="form-control" type="text" placeholder="Mr hoặc Ms" /></div></div><div class="col-md-4"> <div class="form-group"><label>Họ</label> <input name="ho" placeholder="Ví dụ: Trần" class="form-control" type="text" /></div></div><div class="col-md-4"> <div class="form-group"><label>Tên</label><input name="ten" placeholder="Ví dụ: Hiếu" class="form-control" type="text" /></div></div></div>';
	html+=fm;
}

$('#fdata').html(html);

function isvalueEmpty(arr) {
	for (var i = 0; i < arr.length; i++) {
		var obj = arr[i];
		if (obj.value == "") {
			return false;
		}
	}
	return true;
}

function checkout() {
	var danhxungs = $('input[name="danhxung"]');
	var hos = $('input[name="ho"]');
	var tens = $('input[name="ten"]');

	if (isvalueEmpty(danhxungs) && isvalueEmpty(hos) && isvalueEmpty(tens)) {
		var adanhxung = [];
		var aho = [];
		var aten = [];
		var madatcho = $.cookie('madatcho');

		for (var i = 0; i < num; i++) {
			adanhxung.push(danhxungs[i].value);
			aho.push(hos[i].value);
			aten.push(tens[i].value);
		}
		var path = SERVER + "hanhkhach/"
		$.post(path, {arr:"", adanhxung: adanhxung, aho:aho, aten:aten, madatcho:madatcho}, function(data, textStatus, xhr) {
			if (textStatus == "success") {
				window.location = SUCCESS_PAYMENT;
			}
		});
	} else {
		alert('Thông tin điền còn thiếu! Kiểm trả lại');
	}
}

tao_dat_cho(tongtien);