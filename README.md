# ĐỒ ÁN GIỮA KỲ - CÁC CÔNG NGHỆ MỚI TRONG PHÁT TRIỂN PHẦN MỀM #
## AIRLINE RESERVATION - HỆ THỐNG ĐẶT VÉ MÁY BAY ##

### THỰC HIỆN ###
1312150 - Trần Văn Đức
1312179 - Đặng Văn Quốc Hân
1312193 - Trần Cao Thanh Hiếu

### REST API ###
o Trả về các mã sân bay đi có trong CSDL
o Trả về các mã sân bay đến tương ứng với sân bay đi có trong CSDL
o Tạo đặt chỗ mới => phát sinh mã đặt chỗ, trạng thái Đang đặt chỗ
o Thông tin mã đặt chỗ
o Cập nhật trạng thái 0 -> 1 khi hoàn thành đặt chỗ, kiểm tra các thông tin liên
quan
o Danh sách chặng bayo Thêm chặng bay mới
o Danh sách hành khách
o Thêm hành khách mới
o Tìm các chuyến bay thỏa mãn nơi đi, nơi đến, ngày đi và số lượng hành khách

### Front-end ###
1. Chọn điểm đi
2. Hiển thị danh sách điểm đến
3. Chọn ngày đi, ngày về (nếu có), số lượng hành khách, hạng vé (Y hoặc C)
4. Tìm vé máy bay thỏa mã số lượng hành khách với ngày đi và ngày về theo yêu cầu.
Nếu không có trả về lỗi hết vé.
5. Tạo đặt chỗ, thêm các chặng bay tương ứng
6. Nhập thông tin hành khách
7. Hoàn tất đặt chỗ

