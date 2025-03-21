<?php
// Start the session
session_start();

// Ensure UTF-8 encoding for correct display of Vietnamese characters
header('Content-Type: text/html; charset=UTF-8');

// Handle login
if (isset($_POST['dangnhap'])) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "dangkihocphan");
    
    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the username from the form input
    $MaSV = mysqli_real_escape_string($conn, $_POST['MaSV']);
    
    // Check if the input is empty
    if (!$MaSV) {
        echo "Vui lòng nhập đầy đủ mã sv";
        exit;
    }

    // Query to check if the student exists
    $query = "SELECT MaSV FROM sinhvien WHERE MaSV='$MaSV'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Check if a row was returned
    $row = mysqli_fetch_array($result);

    if ($MaSV != $row['MaSV']) {
        echo "Mã SV ko đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // Store the username in the session
    $_SESSION['username'] = $MaSV;

    // Redirect to the home page after successful login
    header('Location: index.php');
    exit();
}
?>
