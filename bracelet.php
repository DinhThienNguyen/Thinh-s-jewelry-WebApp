<html>
<head>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial-scale=1">
    <title>Thịnh's jelwery | Đồng hồ</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/watch-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
	<script src="js/ajax.js" type="text/javascript"></script>
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div id="logo">
                <a href="index.php">
                    <img src="img/logo.png" alt="Thinh's Jelwery logo" class="logo">
                </a>
            </div>
            <ul class="main-nav">
                <li>
                <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign in</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="navbar">
        <div class="dropdown">
            <a href="watch.php" class="button">Đồng hồ</a> 
        </div>
        <div class="dropdown">
            <a href="bracelet.php" class="button">Vòng tay</a>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Vòng tay
                <i class="fa fa-caret-down"></i>
            </button>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Bông tai
                <i class="fa fa-caret-down"></i>
            </button>
        </div>
    </div>

    <div class="main-container">
        <div class="brand">
            <span>Thương hiệu</span>
            <div class = "checkbox">
                <?php 
                    require "connect.php";
                    $sql = "SELECT * FROM braceletbrand";
                    $result = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_array($result)) {           
                ?>
                    <lable class ="checkbox-wrapper">
                        <span class="ant-checkbox">
                            <input type ="checkbox" class="ant-checkbox-input" value="<?php echo $row['id'] ?>"/>
                        </span>
                        <span><?php echo $row['name'] ?></span>
                    </lable>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class ="block">
            <a href="bracelet.php" style='padding-left: 10px'>Sản phẩm vòng đeo tay</a>
            <div style="float:right">
            <span>Sắp xếp theo: </span>
            <select class="filter">
                <option value="noibat">Nổi bật</option>
                <option value="high">Giá từ cao đến thấp</option>
                <option value="low">Giá từ thấp đến cao</option>
            </select>           
            </div>
        </div>
        <div class="product-container">
        <?php
            require "connect.php";
            $sql = "SELECT * FROM bracelet";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                ?>
                <div class="productCard">
                    <img id="product" src="img/<?php echo $row['name'] ?>.jpg">            
                    <div class="productDesc">
                        <a href="#"><?php echo $row['name'] ?></a>
                    </div>
                    <div class="productDesc">
                        <a href="#"><?php echo number_format($row['price'], 0, ',', '.') ?> vnđ</a>
                    </div>
                </div>                
                <?php
            }
        ?>
        </div>
    </div>

    <div id="id01" class="modal">
  
  <form method="post" class="modal-content animate" action="server.php">

  <div class="containerLogin">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required>
      
    <button class = "loginButton" type="submit" name="login_user">Login</button>    
  </div>
</form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>