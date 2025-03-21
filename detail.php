<?php
// Kết nối cơ sở dữ liệu
session_start();
$connect = mysqli_connect("localhost", "root", "", "dangkihocphan");

// Kiểm tra xem có mã sinh viên không
if (isset($_GET['sid'])) {
    $maSV = $_GET['sid'];

    // Lấy thông tin chi tiết sinh viên từ bảng sinhvien
    $query = "SELECT * FROM sinhvien WHERE MaSV = '$maSV'";
    $result = mysqli_query($connect, $query);

    // Kiểm tra nếu sinh viên tồn tại
    if (mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "Sinh viên không tồn tại.";
        exit();
    }
} else {
    echo "Không có mã sinh viên.";
    exit();
}

// Đóng kết nối
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .student-detail img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Chi Tiết Sinh Viên</h2>
        <div class="student-detail">
            <p><strong>Mã Sinh Viên:</strong> <?php echo $student['MaSV']; ?></p>
            <p><strong>Họ và Tên:</strong> <?php echo $student['HoTen']; ?></p>
            <p><strong>Giới Tính:</strong> <?php echo $student['GioiTinh']; ?></p>
            <p><strong>Ngày Sinh:</strong> <?php echo $student['NgaySinh']; ?></p>
            <p><strong>Mã Ngành:</strong> <?php echo $student['MaNganh']; ?></p>
            <p><strong>Hình Ảnh:</strong> <img src="<?php echo $student['Hinh']; ?>" alt="Hình ảnh sinh viên"></p>
        </div>

        <a href="index.php" class="btn btn-primary">Quay lại danh sách</a>
    </div>

    <!-- Các thư viện JS của Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
