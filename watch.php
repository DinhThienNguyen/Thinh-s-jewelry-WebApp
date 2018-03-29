<html>
<head>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial-scale=1">
    <title>Thịnh's jelwery | Đồng hồ</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/watch-style.css">
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
        <div class ="block">
            <a href="watch.php">Sản phẩm đồng hồ</a>
            <div style="float:right">
            <span>Sắp xếp theo: </span>
            <select name ="sort">
                <option value="noibat">Nổi bật</option>
                <option value="high">Giá từ cao đến thấp</option>
                <option value="low">Giá từ thấp đến cao</option>
            </select>           
            </div>
        </div>
        <div class="product-container">
        <?php
            $host = "localhost";
            $username = "user";
            $password = "";
            $database = "jewelry";
        
            $connect = mysqli_connect($host, $username, $password, $database);
            $connect->set_charset("utf8");
            $sql = "SELECT * FROM watch";
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