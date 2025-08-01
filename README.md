# 🏥 Hệ Thống Quản Lý Phòng Khám Đa Khoa C&G

[![PHP Version](https://img.shields.io/badge/PHP-7.0%2B-blue)](https://php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.6%2B-orange)](https://mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.0-purple)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)

## 📋 Mô tả dự án

Hệ thống quản lý phòng khám đa khoa C&G là một ứng dụng web được phát triển bằng PHP, MySQL và Bootstrap. Hệ thống cung cấp giải pháp quản lý toàn diện cho phòng khám bao gồm quản lý bệnh nhân, bác sĩ, lịch hẹn và tin tức y tế.

## 🎯 Tính năng chính

### 👥 Quản lý người dùng
- **Bệnh nhân**: 
  - Đăng ký tài khoản mới
  - Đăng nhập/đăng xuất an toàn
  - Cập nhật thông tin cá nhân
  - Upload và thay đổi ảnh đại diện
  - Tạo mã QR cho thông tin cá nhân
  
- **Bác sĩ**: 
  - Quản lý hồ sơ cá nhân
  - Xem và cập nhật lịch làm việc
  - Quản lý thông tin bệnh nhân
  - Cập nhật ảnh đại diện
  
- **Admin**: 
  - Quản lý toàn bộ hệ thống
  - Thêm/sửa/xóa tài khoản
  - Quản lý tin tức và nội dung

### 📅 Quản lý lịch hẹn
- **Đặt lịch khám trực tuyến** với giao diện calendar trực quan
- **Hiển thị lịch theo tháng** với các ca làm việc:
  - Ca 1: 07:00 - 09:00
  - Ca 2: 09:00 - 11:00  
  - Ca 3: 15:00 - 17:00
  - Ca 4: 17:00 - 19:00
- **Quản lý lịch bận** và lịch nghỉ của bác sĩ
- **Validation thời gian** đặt lịch
- **Hiển thị trạng thái** slot thời gian (trống/đã đặt)

### 📰 Quản lý tin tức
- Đăng và quản lý tin tức y tế
- Upload hình ảnh cho tin tức
- Hiển thị tin tức nổi bật trên trang chủ
- Phân loại và tìm kiếm tin tức

### 🏥 Giao diện người dùng
- **Trang chủ** với slider giới thiệu
- **Phần giới thiệu** đội ngũ bác sĩ
- **Form liên hệ** và hỏi đáp
- **Giao diện responsive** tương thích mobile
- **QR Code Generator** cho thông tin liên hệ

## 🛠 Công nghệ sử dụng

### Backend
- **PHP 7.0+** - Ngôn ngữ lập trình chính
- **MySQL 5.6+** - Cơ sở dữ liệu quan hệ
- **MVC Pattern** - Kiến trúc phần mềm
- **Session & Cookie** - Quản lý phiên đăng nhập
- **MD5 Encryption** - Mã hóa mật khẩu

### Frontend
- **HTML5/CSS3** - Cấu trúc và giao diện
- **Bootstrap 4** - Framework CSS responsive
- **JavaScript/jQuery** - Tương tác phía client
- **Owl Carousel** - Slider và carousel
- **QRCode.js** - Tạo mã QR
- **Font Awesome** - Thư viện icon

### Thư viện và Plugin
- **Composer** - Dependency management
- **QR Code Generator** - Tạo mã QR
- **jQuery UI** - Enhanced UI components
- **iCheck** - Custom checkboxes và radio buttons

## 📁 Cấu trúc dự án

```
Alo3/
├── 📁 admin/                    # Giao diện quản trị
│   ├── 📁 assets/              # CSS, JS, images cho admin
│   ├── 📁 plugins/             # Plugin và thư viện admin
│   ├── 📁 vendor/              # Vendor libraries
│   └── 📁 view-dr/             # Views cho admin
├── 📁 bacsi/                   # Giao diện bác sĩ
│   ├── 📄 signin.php           # Đăng nhập bác sĩ
│   ├── 📄 info_doctor.php      # Thông tin bác sĩ
│   └── 📁 controller-mb/       # Controllers cho mobile
├── 📁 css/                     # File CSS chính
│   ├── 📄 core.css             # CSS cốt lõi
│   └── 📁 shortcode/           # CSS components
├── 📁 images/                  # Hình ảnh
├── 📁 js/                      # File JavaScript
├── 📁 mvc/                     # Kiến trúc MVC
│   ├── 📁 controller/          # Controllers
│   ├── 📁 model/               # Models  
│   └── 📁 view/                # Views và templates
├── 📁 vendor/                  # Composer packages
├── 📄 index.php                # Trang chủ
├── 📄 calendar1.php            # Lịch đặt hẹn
├── 📄 info_Patient.php         # Thông tin bệnh nhân
├── 📄 makeAppointmentStep1.php # Bước 1 đặt lịch
├── 📄 signin.php               # Đăng nhập bệnh nhân
└── 📄 signout.php              # Đăng xuất
```

## 🗄 Cơ sở dữ liệu

### Bảng chính
- **`patient`** - Thông tin bệnh nhân (username, fullname, age, sdt, address, image)
- **`doctor`** - Thông tin bác sĩ (id_doctor, username, fullname, gioitinh, age, sdt, address, password, image)
- **`admin`** - Tài khoản quản trị
- **`appointment`** - Lịch hẹn khám (ngayhen, giohen, username, id_doctor)
- **`tin_tuc`** - Tin tức y tế (id, TuaDe, TinTuc, NgayDang, img)

### Mối quan hệ
- `appointment.username` → `patient.username`
- `appointment.id_doctor` → `doctor.id_doctor`

## ⚙️ Cài đặt và chạy dự án

### Yêu cầu hệ thống
- **PHP** >= 7.0
- **MySQL** >= 5.6
- **Apache/Nginx** Web Server
- **XAMPP/WAMP** (khuyến nghị cho development)
- **Composer** (optional, cho dependency management)

### Hướng dẫn cài đặt

1. **Clone dự án**
```bash
git clone https://github.com/yourusername/alo3-clinic-management.git
cd alo3-clinic-management
```

2. **Cài đặt XAMPP**
```bash
# Tải XAMPP từ https://www.apachefriends.org/
# Cài đặt và khởi động Apache + MySQL
# Copy thư mục dự án vào C:\xampp\htdocs\Alo3
```

3. **Import cơ sở dữ liệu**
```sql
-- Mở phpMyAdmin: http://localhost/phpmyadmin
-- Tạo database: clinic_management
-- Import file: database/clinic_management.sql
```

4. **Cấu hình kết nối database**
```php
// Cập nhật file: mvc/controller/source.php
$host = "localhost";
$username = "root";
$password = "";
$database = "clinic_management";
```

5. **Chạy ứng dụng**
```bash
# Khởi động Apache và MySQL trong XAMPP Control Panel
# Truy cập: http://localhost/Alo3
```

## 👤 Tài khoản mặc định

### 🔐 Admin
```
Username: admin
Password: admin123
URL: http://localhost/Alo3/admin/
```

### 👨‍⚕️ Bác sĩ
```
Username: doctor1
Password: doctor123
URL: http://localhost/Alo3/bacsi/
```

### 👤 Bệnh nhân
```
Đăng ký tài khoản mới tại: http://localhost/Alo3/signup.php
```

## 📱 Tính năng nổi bật

### 🎨 Giao diện hiện đại
- **Design responsive** tương thích mọi thiết bị
- **Color scheme chuyên nghiệp**: 
  - Primary: `#01c9f6` (xanh nhạt)
  - Secondary: `#0B243B` (xanh đậm)
  - Background: `#f9f9f9` (xám nhạt)
- **Smooth animations** và hover effects
- **Professional typography** với font Lato

### 📋 Quản lý lịch thông minh
```php
// Ví dụ code quản lý lịch
$caLamViec = "<br>
<label>
    <input type='radio' name='ngayhen' value='1_$date'>07:00 - 09:00
</label>";
```
- **Calendar widget** hiển thị trực quan
- **Real-time availability** checking
- **Automatic slot management**
- **Date/time validation**

### 🔐 Bảo mật
- **Password encryption** với MD5
- **Session management** an toàn
- **SQL injection protection**
- **CSRF protection**
- **Input validation** và sanitization

### 📊 QR Code Integration
```javascript
// QR Code generation
function generateQRCode() {
    var qrcodeContainer = document.getElementById('qrcode');
    qrcodeContainer.innerHTML = "";
    new QRCode(qrcodeContainer, {
        text: "https://www.facebook.com/cooniesetthespree",
        width: 128,
        height: 128
    });
}
```

## 🔧 API và Functions

### Core Functions
```php
// Ví dụ một số functions chính
class Mclass {
    public function show_info($username) { /* ... */ }
    public function exist_doctor($username) { /* ... */ }
    public function multipleFunc($sql) { /* ... */ }
    public function connDB() { /* ... */ }
}
```

### CSS Framework
```css
/* Responsive design */
@media (max-width: 768px) {
    .doctor-box {
        margin-bottom: 20px;
    }
}

/* Footer styling */
#htc__footer {
    background-color: #0B243B;
    color: white;
    padding: 40px 0;
}
```

## 🚀 Deployment

### Production Setup
1. **Upload files** lên hosting
2. **Create database** trên hosting
3. **Import SQL** file
4. **Update config** với thông tin hosting
5. **Set permissions** cho thư mục upload

### Hosting Requirements
- **PHP 7.0+**
- **MySQL 5.6+**
- **Apache mod_rewrite** enabled
- **File upload** permissions
- **SSL certificate** (recommended)

## 🤝 Đóng góp

Chúng tôi hoan nghênh mọi đóng góp! Để đóng góp:

1. **Fork** repository này
2. **Tạo feature branch** (`git checkout -b feature/AmazingFeature`)
3. **Commit** thay đổi (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to branch (`git push origin feature/AmazingFeature`)
5. **Tạo Pull Request**

### Guidelines
- Tuân thủ coding standards
- Viết tests cho features mới
- Update documentation
- Follow commit message conventions

## 📝 Changelog

### v1.0.0 (2024-08-01)
- ✨ Initial release
- 👥 User management system
- 📅 Appointment booking
- 📰 News management
- 🎨 Responsive design

## 🐛 Bug Reports

Nếu bạn tìm thấy bug, vui lòng tạo issue với:
- **Mô tả chi tiết** về bug
- **Steps to reproduce**
- **Expected vs actual** behavior
- **Screenshots** (nếu có)
- **Environment info** (PHP version, browser, etc.)

## 📞 Liên hệ và Support

- **Developer**: [Luu Lam Cong]
- **Email**: luuconghn.lamcong.contacts@gmail.com
- **Project Link**: https://github.com/luuconghoangnam/clinic-booking-system.git
- **Documentation**: [Wiki Link]
- **Support**: [Support Link]

## 📄 License

Dự án này được phân phối dưới **MIT License**. Xem file [LICENSE](LICENSE) để biết thêm chi tiết.

```
MIT License

Copyright (c) 2024 [Your Name]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software...
```

## 🙏 Acknowledgments

- **Bootstrap team** cho framework tuyệt vời
- **jQuery team** cho thư viện JavaScript
- **Owl Carousel** cho component slider
- **QRCode.js** cho QR code generation
- **Font Awesome** cho icon library
- **Tất cả contributors** đã đóng góp cho dự án

## 📈 Statistics

![GitHub stars](https://img.shields.io/github/stars/yourusername/alo3-clinic-management)
![GitHub forks](https://img.shields.io/github/forks/yourusername/alo3-clinic-management)
![GitHub issues](https://img.shields.io/github/issues/yourusername/alo3-clinic-management)

---

<div align="center">

⭐ **Nếu bạn thấy dự án hữu ích, hãy cho một star nhé!** ⭐

**Made with ❤️ by [Your Name]**

[⬆ Back to top](#-hệ-thống-quản-lý-phòng-khám-đa-khoa-cg)

</div>