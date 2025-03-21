<?php
// Get the student ID from the URL
$id = $_GET['sid'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dangkihocphan");

// Query to get the student details based on the ID
$edit_sql = "SELECT * FROM sinhvien WHERE MaSV='" . $id . "'";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="update.php" method="post">
            <div class="form-group">
                <h1>Sửa Thông Tin Sinh Viên</h1>
            </div>
            <div class="form-group">
                <label for="MaSV">Mã Sinh Viên</label>
                <input type="text" readonly id="MaSV" class="form-control" name="MaSV" value="<?php echo $row['MaSV']; ?>">
            </div>
            <div class="form-group">
                <label for="HoTen">Họ Tên</label>
                <input type="text" name="HoTen" id="HoTen" class="form-control" value="<?php echo $row['HoTen']; ?>">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới Tính</label>
                <input type="text" id="GioiTinh" name="GioiTinh" class="form-control" value="<?php echo $row['GioiTinh']; ?>">
            </div>
            <div class="form-group">
                <label for="NgaySinh">Ngày Sinh</label>
                <input type="date" id="NgaySinh" name="NgaySinh" class="form-control" value="<?php echo $row['NgaySinh']; ?>">
            </div>
            <div class="form-group">
                <label for="Hinh">Hình</label>
                <input type="text" id="Hinh" name="Hinh" class="form-control" value="<?php echo $row['Hinh']; ?>">
            </div>
            <div class="form-group">
                <label for="MaNganh">Mã Ngành</label>
                <input type="text" id="MaNganh" name="MaNganh" class="form-control" value="<?php echo $row['MaNganh']; ?>">
            </div>
            <button type="submit" class="btn btn-success">Cập nhật thông tin</button>
        </form>
    </div>
</body>

</html>
