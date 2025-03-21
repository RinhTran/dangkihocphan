<?php
// Get the data from the form
if (isset($_POST['MaSV'])) {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $Hinh = $_POST['Hinh'];
    $MaNganh = $_POST['MaNganh'];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "dangkihocphan");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the student information in the database
    $update_sql = "UPDATE sinhvien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$Hinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";

    if (mysqli_query($conn, $update_sql)) {
        // Redirect to the list page after update
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
