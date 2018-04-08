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
                <li class="activeNav">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">Sign in</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="navbar">
        <div class="dropdown">
            <button class="dropbtn">Watch
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Necklace
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Bracelet
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
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
            <a href="watch.php" style='padding-left: 10px'>Sản phẩm vòng đeo tay</a>
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
</body>
</html>