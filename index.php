<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "dangkihocphan");


$query = "SELECT * FROM sinhvien";
$result = mysqli_query($connect, $query);

?> 

<!DOCTYPE html>
<html>
<head>
 <title>THÔNG TIN SINH VIÊN</title>
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
   <span class="title-word title-word-3">SINH</span>
   <span class="title-word title-word-4">VIÊN </span>
 </h2>
</div>
<button class="button2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<i class="fas fa-plus"></i> 
Thêm mới SINH VIÊN
</button>
 <br /><br />
 <div class="container">
 
  <div class="table-responsive">
   <table  class="table">
    <tr>
    <th class="textt">Mã SINH VIÊN</th>
       <th  class="textt">Họ tên</th>
       <th class="textt">Phái</th>
       <th class="textt">Nơi Sinh</th>
       <th class="textt">Hinh</th>
       <th class="textt">MaNgahn</th>
       <th class="textt">Thao tác</th>

    </tr>
    <?php
    while($row = mysqli_fetch_array($result))
    {
    ?>
    <tr>
     <td><?php echo $row["MaSV"]; ?></td>
     <td><?php echo $row["HoTen"]; ?></td>
     <td><?php echo $row["GioiTinh"]; ?></td>
    
     <td><?php echo $row["NgaySinh"]; ?></td>


     <td>
    <a href="<?php echo $row['Hinh']; ?>" target="_blank">
        <img class="imgg" width="100px" src="<?php echo $row['Hinh']; ?>" alt="Image"/>
    </a>
</td>





     <td><?php echo $row["MaNganh"]; ?></td>
    
     <td>
     <a href="edit.php?sid=<?php echo $row['MaSV'];?>" class="btn btn-info">
     <i class="fas fa-edit"></i>
     Sửa</a> 
     
  
     
       
       <a onclick="return confirm('Bạn có muốn xoá SINH VIÊN này không');" href="delete.php?userid=<?php echo $row["MaSV"]; ?>" class="btn btn-danger">
       <i class="fas fa-trash-alt"></i>
       Xoá</a></td>
      
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
 

 <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form thêm SINH VIÊN</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="themsv.php" method="post">
                    <div class="form-group">
                        <label for="MaSV">Mã SINH VIÊN</label>
                        <input type="text" id="MaSV" class="form-control" name="MaSV" required>
                    </div>
                    <div class="form-group">
                        <label for="HoTen">Họ Tên SINH VIÊN</label>
                        <input type="text" name="HoTen" id="HoTen" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="GioiTinh">Phái</label>
                        <input type="text" id="GioiTinh" name="GioiTinh" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="NgaySinh">Nơi Sinh</label>
                        <input type="text" id="NgaySinh" name="NgaySinh" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Hinh">Hình</label>
                        <input type="text" id="Hinh" name="Hinh" class="form-control" required>
                    </div>
                    <div class="form-group">
    <label for="MaNganh">Mã Ngành</label>
    <input type="text" name="MaNganh" id="MaNganh" class="form-control" required>
</div>

                    <button class="btn btn-success">Thêm SINH VIÊN</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

   </div>
 </div>
</div>
</body>
</html>



