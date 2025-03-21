<?php
include_once 'ketnoi.php';
$sql = "DELETE FROM sinhvien WHERE MaSV='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location:index.php");
} else {
    echo "Xóa Thất Bại " . mysqli_error($conn);
}
mysqli_close($conn); 
?>