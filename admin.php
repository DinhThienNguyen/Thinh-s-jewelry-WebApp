<?php
// Start the session
session_start();
if (!isset($_SESSION['username']) || time() - $_SESSION['login_time'] > 120) {
    $_SESSION['msg'] = "You must log in first";
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('location: index.php');
}
else{
    // uncomment the next line to refresh the session, so it will expire after ten minutes of inactivity, and not 10 minutes after login
    $_SESSION['login_time'] = time();
    echo ( "this session is ". $_SESSION['username'] );
    //show rest of the page and all
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.loginButton {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    border: none;
    color: white;
    width: auto;
    margin: 8px 0;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.containerLogin {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

img{
    width: 10%;
    height: 10%;
}

</style>
</head>
<body>

<div class="tab">
  <button class="tablinks" onclick="openProduct(event, 'watch')">Đồng hồ</button>
  <button class="tablinks" onclick="openProduct(event, 'bracelet')">Vòng tay</button>
  <button class="tablinks" onclick="openProduct(event, 'ring')">Nhẫn</button>
</div>

<div id="watch" class="tabcontent">
<table>
  <col width="5%">
  <col width="55%">
  <col width="15%">
  <col width="10%">
  <col width="5%">
  <col width="5%">

  <tr>
    <th>Mã</th>
    <th>Tên đồng hồ</th>
    <th>Giá</th>
    <th>Thương hiệu</th>    
    <th>Hình ảnh</th>    
    <th>Thao tác</th> 
  </tr>

  <tr>
  <form method="post" action="server.php" enctype="multipart/form-data">
    <th>Mã</th>
    <th><input type="text" placeholder="Nhập tên sản phẩm" id="productname" name="productname" required></th>
    <th><input type="text" placeholder="Nhập giá sản phẩm" id="productprice" name="productprice" required></th>
    <th>
        <select name="brandid">
        <?php
            require "connect.php";
            $sql = "SELECT * FROM watchbrand";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                ?>                   
                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php
            }
        ?>
        </select>
    </th>
    <th><input type="file" name="image" required></th>
    <th><input type="submit" name="AddWatchProduct" value="Thêm sản phẩm"></th>
  </form>
  </tr>

  <?php
            require "connect.php";
            $sql = "SELECT watch.id, watch.name, watch.price, watchbrand.name brandname FROM watch INNER JOIN watchbrand ON watch.brand_id = watchbrand.id";
            $sql1 = "SELECT id, `name` FROM watchbrand";
            $result = mysqli_query($connect, $sql);            
            while($row = mysqli_fetch_array($result))
            {           
                ?>
                    <tr><form action = "server.php" method = "post" enctype="multipart/form-data">
                      <th><input type="text" name="productid" value=<?php echo $row['id']?> readonly></th>
                      <th><input type="text" name="productname" value='<?php echo $row['name']?>'></th>
                      <th><input type="text" name="productprice" value='<?php echo number_format($row['price'], 0, ',', '.') ?>'>vnđ</th>
                      <th>
                        <select name="brandid">
                            <?php                  
                                $result1 = mysqli_query($connect, $sql1);          
                                while($row1 = mysqli_fetch_array($result1))
                                {           
                            ?>      
                            <?php if ($row1['name'] == $row['brandname']){?>
                                <option value="<?php echo $row1['id']?>" selected><?php echo $row1['name']?></option>
                            <?php }else { ?>
                                <option value="<?php echo $row1['id']?>"><?php echo $row1['name']?></option>
                            <?php } ?>
                            <?php
                            }
                            ?>
                        </select>
                      </th>
                      <th><img src="img/<?php echo $row['name'] ?>.jpg"><input type="submit" name="DeleteWatchProductImage" value="Xóa ảnh"><br>Thay ảnh mới
                      <input type="file" name="image" value="Thay ảnh mới"><input type="submit" name="UpdateWatchProductImage" value="Cập nhật ảnh vừa thay"></th>
                      <th><input type="submit" name="UpdateWatchProduct" value="Chỉnh sửa"><input type="submit" name="DeleteWatchProduct" value="Xóa"></th>
                      </form>
                    </tr>
                    <?php
            }
        ?>
</table>
</div>

<div id="bracelet" class="tabcontent">
<table>
  <col width="5%">
  <col width="55%">
  <col width="15%">
  <col width="10%">
  <col width="5%">
  <col width="5%">

  <tr>
    <th>Mã</th>
    <th>Tên vòng tay</th>
    <th>Giá</th>
    <th>Thương hiệu</th>    
    <th>Hình ảnh</th>    
    <th>Thao tác</th> 
  </tr>

  <tr>
  <form method="post" action="server.php" enctype="multipart/form-data">
    <th>Mã</th>
    <th><input type="text" placeholder="Nhập tên sản phẩm" id="productname" name="productname" required></th>
    <th><input type="text" placeholder="Nhập giá sản phẩm" id="productprice" name="productprice" required></th>
    <th>
        <select name="brandid">
        <?php
            require "connect.php";
            $sql = "SELECT * FROM braceletbrand";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                ?>                   
                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php
            }
        ?>
        </select>
    </th>
    <th><input type="file" name="image" required></th>
    <th><input type="submit" name="AddBraceletProduct" value="Thêm sản phẩm"></th>
  </form>
  </tr>

  <?php
            require "connect.php";
            $sql = "SELECT bracelet.id, bracelet.name, bracelet.price, braceletbrand.name brandname FROM bracelet INNER JOIN braceletbrand ON bracelet.brand_id = braceletbrand.id";
            $sql1 = "SELECT id, `name` FROM braceletbrand";
            $result = mysqli_query($connect, $sql);            
            while($row = mysqli_fetch_array($result))
            {           
                ?>
                    <tr><form action = "server.php" method = "post" enctype="multipart/form-data">
                      <th><input type="text" name="productid" value=<?php echo $row['id']?> readonly></th>
                      <th><input type="text" name="productname" value='<?php echo $row['name']?>'></th>
                      <th><input type="text" name="productprice" value='<?php echo number_format($row['price'], 0, ',', '.') ?>'>vnđ</th>
                      <th>
                        <select name="brandid">
                            <?php                  
                                $result1 = mysqli_query($connect, $sql1);          
                                while($row1 = mysqli_fetch_array($result1))
                                {           
                            ?>      
                            <?php if ($row1['name'] == $row['brandname']){?>
                                <option value="<?php echo $row1['id']?>" selected><?php echo $row1['name']?></option>
                            <?php }else { ?>
                                <option value="<?php echo $row1['id']?>"><?php echo $row1['name']?></option>
                            <?php } ?>
                            <?php
                            }
                            ?>
                        </select>
                      </th>
                      <th><img src="img/<?php echo $row['name'] ?>.jpg"><input type="submit" name="DeleteBraceletProductImage" value="Xóa ảnh"><br>Thay ảnh mới
                      <input type="file" name="image" value="Thay ảnh mới"><input type="submit" name="UpdateBraceletProductImage" value="Cập nhật ảnh vừa thay"></th>
                      <th><input type="submit" name="UpdateBraceletProduct" value="Chỉnh sửa"><input type="submit" name="DeleteBraceletProduct" value="Xóa"></th>
                      </form>
                    </tr>
                    <?php
            }
        ?>
</table>
</div>

<div id="ring" class="tabcontent">
  
</div>

<script>
function openProduct(evt, productName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(productName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
    

</body>
</html> 

