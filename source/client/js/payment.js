var num = parseInt($.cookie('num'));
var html ="";
for (var i = 0; i < num; i++) {
	var fm = '<div class="row"><div class="col-md-4"><div class="form-group"><label>Danh xưng</label><input name="danhxung" class="form-control" type="text" /></div></div><div class="col-md-4"> <div class="form-group"><label>Họ</label> <input name="ho" class="form-control" type="text" /></div></div><div class="col-md-4"> <div class="form-group"><label>Tên</label><input name="ten" class="form-control" type="text" /></div></div></div>';
	html+=fm;
}

$('#fdata').html(html);

function checkout() {
	console.log('lick');
	window.location = SUCCESS_PAYMENT;
}
// tao_dat_cho(num);