<?php
error_reporting(0);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect data from the form
    $id = $_POST['MaSV'];
    $ht = $_POST['HoTen'];
    $phai = $_POST['GioiTinh'];
    $noisinh = $_POST['NgaySinh'];
    $hinh = $_POST['Hinh'];
    $manghanh = $_POST['MaNganh'];

    // Connect to the database
    require_once 'ketnoi.php';

    // Sanitize the input data to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    $ht = mysqli_real_escape_string($conn, $ht);
    $phai = mysqli_real_escape_string($conn, $phai);
    $noisinh = mysqli_real_escape_string($conn, $noisinh);
    $hinh = mysqli_real_escape_string($conn, $hinh);
    $manghanh = mysqli_real_escape_string($conn, $manghanh);

    // Check if MaNganh exists in nganhhoc table
    $checkMaNganhQuery = "SELECT * FROM nganhhoc WHERE MaNganh = '$manghanh'";
    $result = mysqli_query($conn, $checkMaNganhQuery);

    if (mysqli_num_rows($result) > 0) {
        // MaNganh exists, proceed with the insert
        $themsql = "INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                    VALUES ('$id', '$ht', '$phai', '$noisinh', '$hinh', '$manghanh')";

        if (mysqli_query($conn, $themsql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $themsql . "<br>" . mysqli_error($conn);
        }
    } else {
        // MaNganh does not exist, display an error message
        echo "Error: MaNganh '$manghanh' does not exist in the nganhhoc table.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
