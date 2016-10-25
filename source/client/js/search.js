lay_danh_sach_san_bay_di();

$('#from').chosen();
$('#to').chosen();

$('#from').change(function(event) {
	var from = $('#from').val();
	if (from != "") {
		lay_danh_sach_san_bay_den(from);
	}
});