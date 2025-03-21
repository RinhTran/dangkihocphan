<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "dangkihocphan");


$query = "SELECT * FROM HOCPHAN";
$result = mysqli_query($connect, $query);

?> 

<!DOCTYPE html>
<html>
<head>
 <title>THÔNG TIN HỌC PHẦN</title>
 <link rel="stylesheet" href="responsive.css"/>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

 
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

 
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
 .fixed-button {
 right: 0;
 height: 100%;
 display: flex;
 align-items: center;
 pointer-events: none;
}
.fixed-button .btn {
 font-size: 18px;
 padding: 1px 15px;
 background: #000;
 color: #fff;
 text-decoration: none;
 pointer-events: all;
}

.fixed-button .btnn {
 font-size: 18px;
 padding: 1px 15px;
 background: #000;
 color: #fff;
 text-decoration: none;
 pointer-events: all;
 margin-left:10px;
}
    </style>

   <body>
<?php 
      if (isset($_SESSION['username']) && $_SESSION['username']){
          echo 'Bạn đã đăng nhập với tài khoản tên là '.$_SESSION['username']."<br/>";
      }
      else{
          echo 'Bạn chưa đăng nhập';
      }
      ?>
     
     <div class="fixed-button">
   <a href="login.php" class="btn">Login</a>
   <a href="logout.php" class="btnn">Logout</a>
   <a href="dangkihocphan.php" class="btnn">Danh sach hoc phan</a>

     </div>




<div class="containerr">
 <h2 class="title">
   <span class="title-word title-word-1">THÔNG</span>
   <span class="title-word title-word-2">TIN</span>
   <span class="title-word title-word-3">Học</span>
   <span class="title-word title-word-4">Phần </span>
 </h2>
</div>
<button class="button2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<i class="fas fa-plus"></i> 
Thêm mới HỌC PHẦN
</button>
 <br /><br />
 <div class="container">
 
  <div class="table-responsive">
   <table  class="table">
    <tr>
    <th class="textt">Mã HỌC PHẦN</th>
       <th  class="textt">Tên học phần</th>
       <th class="textt">Số tín chỉ</th>
       <th class="textt">Thao tác</th>

    </tr>
    <?php
    while($row = mysqli_fetch_array($result))
    {
    ?>
    <tr>
     <td><?php echo $row["MaHP"]; ?></td>
     <td><?php echo $row["TenHP"]; ?></td>
     <td><?php echo $row["SoTinChi"]; ?></td>
    
    <td>
    <a href="edit.php?sid=<?php echo $row['MaHP'];?>" class="btn btn-info">
     <i class="fas fa-edit"></i>
     Dang ki</a> 
    </td>

     
  

      
</a>
     </tr>
    <?php
    }
    ?>
   </table>
   <div align="center">
   <br />

   </div>
   <br /><br />
  </div>
 </div>
 
 </div>
</div>
</body>
</html>



