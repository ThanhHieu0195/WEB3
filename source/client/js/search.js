removeAllCookie();

lay_danh_sach_san_bay_di();

$('#from').chosen();
$('#to').chosen();

$('#from').change(function(event) {
	var from = $('#from').val();
	if (from != "") {
		lay_danh_sach_san_bay_den(from);
	}
});

$('#search').click(function(event) {
	/* Act on the event */
	var from = $('#from').val();
	var to = $('#to').val();
	var date = $('#date').val();
	var num = $('#num').val();
	var level = $('#level').val();
	var detail_from = $("option[value = '"+from+"'").html()
	var detail_to = $("option[value = '"+to+"'").html()
	
	$.cookie('from', from);
	$.cookie('to', to);
	$.cookie('date', date);
	$.cookie('num', num);
	$.cookie('level', level);
	$.cookie('detail_from', detail_from);
	$.cookie('detail_to', detail_to);

	window.location = FLINGTS;
	return false;
});