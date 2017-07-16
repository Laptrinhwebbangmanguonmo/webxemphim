<h1 style="text-align: center;">Xây Dựng WebSite Xem Phim</h1>
<hr>
<h2>I. Tạo CSDL</h2>
<img src="HinhRM/CSDL.png" width="50%">
<h3>Trong Đó: (Mình Tạo Bằng Dòng lệnh)</h3>
<h4>Bảng Danh Mục</h4>
<p>CREATE TABLE PHIM.DANHMUC(ID SMALLINT PRIMARY KEY NOT NULL GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),TEN VARGRAPHIC(255) NOT NULL,TENKHONGDAU VARGRAPHIC(255) NOT NULL)</p>
<h4>Bảng Phim</h4>
<p>CREATE TABLE PHIM.PHIM(ID SMALLINT PRIMARY KEY NOT NULL GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),TIEUDE VARGRAPHIC(255) NOT NULL,TIEUDEKHONGDAU VARGRAPHIC(255) NOT NULL,NOIDUNG DBCLOB,VIDEO VARGRAPHIC(500) NOT NULL,HINHANH VARGRAPHIC(255) NOT NULL,NOIBAT INTEGER NOT NULL,SOLUOTXEM INTEGER NOT NULL,IDDANHMUC SMALLINT NOT NULL FOREIGN REFERENCES PHIM.DANHMUC(ID) ON DELETE cascade,TACGIA VARGRAPHIC(255) NOT NULL)</p>
<h4>Bảng User</h4>
<p>CREATE TABLE PHIM.USER(ID SMALLINT PRIMARY KEY NOT NULL GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),LASTNAME VARGRAPHIC(255) NOT NULL,FIRSTNAME VARGRAPHIC(255) NOT NULL,EMAIL VARGRAPHIC(255)NOT NULL,PASSWORD VARGRAPHIC(255) NOT NULL,NGAYSINH DATE NOT NULL,HINH VARGRAPHIC(255) NOT NULL,GIOITINH VARGRAPHIC(255) NOT NULL,LEVEL INTEGER NOT NULL)</p>
<h4>Bảng Slide</h4>
<p>CREATE TABLE PHIM.SLIDE(ID SMALLINT PRIMARY KEY NOT NULL GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),TEN VARGRAPHIC(255) NOT NULL,HINH VARGRAPHIC(255) NOT NULL,NOIDUNG VARGRAPHIC(2000) NOT NULL,LINK VARGRAPHIC(255) NOT NULL,HIENTHI INTERGER NULL)</p>
<h4>Bảng Quảng Cáo</h4>
<p>CREATE TABLE PHIM.QUANGCAO(ID SMALLINT PRIMARY KEY NOT NULL GENERATED ALWAYS AS IDENTITY(START WITH 1 INCREMENT BY 1),lINKLERTABS VARGRAPHIC(255) NOT NULL,IMGLERTABS VARGRAPHIC(255) NOT NULL,lINKRIGHTABS VARGRAPHIC(255) NOT NULL,IMGRIGHTABS VARGRAPHIC(255) NOT NULL,HIENTHI VARGRAPHIC(50))</p>
<h2>II.Bố Cục Source Code</h2>
<h4>Bố Cục Gồm 3 Phần Chính</h4>
<p>*Thư Mục chứa code Giao Diên Admin Và Thư viện<br>*Thư Mục Chứa Kết Nối Và Tạo Bảng Trong CSDL DB2 <br>*Phân còn lại chứa Code PHP giao diện người dùng</p>
<img src="HinhRM/giaodien.png" width="50%">
<h4>1.Thư Mục Chứa Các Thư Viện Và Các File PHP giao diên Admin</h4>
<img src="HinhRM/Admin.png" width="50%;">
<div><p>Bên Trong Thư Mục Admin Gôm Có </p></div>
<p>a. Các file Thư Viên Và tệp Đính kèm Được xây dựng sẵn Bởi Template Boostrap</p>
<img src="HinhRM/Cadmin.png" width="50%;">
<p>b.Các file PHP giao diên Admin Được Nhóm Phát triển Phần mềm Viết Ra</p>
<img src="HinhRM/Cadmin2.png" width="50%;">
<h4>2.Thư Mục Chứa Kết Nối Và Tạo Bảng Trang CSDL</h4>
<img src="HinhRM/sql.png" width="50%">
<h2>III. Chức Năng Đã Hoàn Thành Của Web</h2>
<h3>1. Giao Diện Người Dùng</h3>
<p>Đếm Số Lượt Xem Tương Tác Với Website</p>
<p>Mỗi Lần Người Dùng Click Xem Phim Thì Lượt Xem được cộng thêm 1</p>
<img src="HinhRM/slx.png" width="50%">
<h4>2. Chức Năng xem Phim Và Like Share Gửi Tin Nhắn Bằng FaceBook</h4>
<img src="HinhRM/like.png" width="50%">
<h4>3. Chức Năng Comment Bằng FaceBook</h4>
<img src="HinhRM/comment.png" width="50%">
<h4>4. MENU Động Lấy Từ Danh Mục Trong CSDL</h4>
<img src="HinhRM/menu.png" width="50%">
<h4>5.Chức Năng Tìm Kiếm Theo Tên</h4>
<img src="HinhRM/seach.png" width="50%">
<h2>IV. Chức Năng Giao Điện Admin Đã Hoàn Thành</h2>
<h4>1. Chức Năng Đăng Nhập Và Đăng Xuất</h4>
<p>Đăng Nhập Bằng Email</p>
<img src="HinhRM/login.png" width="50%;">
<p>Đăng Xuất</p>
<img src="HinhRM/signout.png" width="50%;">
<h4>2. Chức Năng Thêm Xóa Sửa Thành Viên</h4>
<p>Thêm Thành Viên</p>
<img src="HinhRM/them.png" width="50%;">
<p>Xóa Sửa Thành Viên</p>
<img src="HinhRM/xoasua.png" width="50%;">
<h4>3. Chức Năng Thêm Xóa Sữa Danh Mục</h4>
<p>Thêm Danh Mục</p>
<img src="HinhRM/themdm.png" width="50%;">
<p>Xóa Sữa Danh Mục</p>
<img src="HinhRM/xoasuadm.png" width="50%;">
<h4>4. Chức Năng Thêm Xóa Sữa Slide</h4>
<p>Thêm Slide</p>
<img src="HinhRM/themsl.png" width="50%;">
<p>Xóa Sữa Slide</p>
<img src="HinhRM/xoasuasl.png" width="50%;">
<h4>3. Chức Năng Thêm Xóa Sữa Phim</h4>
<p>Thêm Phim</p>
<img src="HinhRM/themp.png" width="50%;">
<p>Xóa Sữa Phim</p>
<img src="HinhRM/xoasuap.png" width="50%;">
<h4>3. Chức Năng Cập Nhật Quảng Cáo</h4>
<img src="HinhRM/update.png" width="50%;">
