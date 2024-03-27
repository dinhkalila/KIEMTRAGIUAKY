<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thông báo cập nhật nhân viên</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .thumbnail {
            width: 50px;
            border-radius: 50%;
        }

        .action-links a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .action-links a:hover {
            color: #0056b3;
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #f2f2f2;
        }

        .pagination .active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        // Kết nối đến cơ sở dữ liệu
        $connection = mysqli_connect('localhost', 'root', '', 'kiemtra');

        // Kiểm tra kết nối
        if (!$connection) {
            die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
        }

        // Lấy dữ liệu từ biểu mẫu sửa nhân viên
        $ma_nv = $_POST['ma_nv'];
        $ten_nv = $_POST['ten_nv'];
        $phai = $_POST['phai'];
        $noi_sinh = $_POST['noi_sinh'];
        $ma_phong = $_POST['ma_phong'];
        $luong = $_POST['luong'];

        // Thực hiện truy vấn để cập nhật thông tin nhân viên trong cơ sở dữ liệu
        $query = "UPDATE NHANVIEN SET Ten_NV = '$ten_nv', Phai = '$phai', Noi_Sinh = '$noi_sinh', Ma_Phong = '$ma_phong', Luong = '$luong' WHERE Ma_NV = '$ma_nv'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // URL ảnh GIF chúc mừng từ internet
            $gifUrl = "https://media1.giphy.com/media/5nj4ZZWl6ZyvK/giphy.gif";
            echo "<img src='$gifUrl' alt='Chúc mừng'><br>";
            echo "<p class='success'>Cập nhật nhân viên thành công.</p>";
        } else {
            echo "<p class='error'>Lỗi khi cập nhật nhân viên: " . mysqli_error($connection) . "</p>";
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($connection);
        ?>
    </div>
</body>
</html>
