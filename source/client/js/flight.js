var from = $.cookie('from');
var to = $.cookie('to');
var date = $.cookie('date');
var num = $.cookie('num');
var level = $.cookie('level');
tim_kiem_chuyen_bay(from, to, date, num);
function select() {
	console.log(1);
	window.location = PAYMENT;
}