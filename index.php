<?php
session_start();
?>

<html>
<head>
    <meta http-equiv="Cache-control" content="no-cache">    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial-scale=1">
    <title>Thịnh's jelwery | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
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
            <button class="dropbtn">Dây chuyền
                <i class="fa fa-caret-down"></i>
            </button>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Bông tai
                <i class="fa fa-caret-down"></i>
            </button>
        </div>
    </div>
    <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="img/nature.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="img/nature.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="img/yoga.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- The dots/circles -->
            <div class="navBtn">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>        
        </div>    

    <!-- Watch product bar -->  
    <div class="productTitle">
        <a href="watch.php">Sản phẩm đồng hồ</a>
    </div>      
    <div class="productBar">
        <?php
            require "connect.php";
            $count = 0;
            $sql = "SELECT * FROM watch";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                if($count === 6)
                    break;
                ?>                
                <div class="productCard">                 
                    <form method="post" action="productpage.php" enctype="multipart/form-data">               
                        <input type="hidden" name="productid" value="<?php echo $row['id'] ?>" >
                        <input type="hidden" name="table" value="watch">
                        <button id="product" type="submit" name="display"><img src="img/<?php echo $row['name'] ?>.jpg" width = "200px"></button>                          
                    </form>
                    <div class="productDesc">
                        <a><?php echo $row['name'] ?></a>
                    </div>
                    <div class="productDesc">
                        <a><?php echo number_format($row['price'], 0, ',', '.') ?> vnđ</a>
                    </div>                
                </div>                                
                <?php
                $count++;
            }
        ?>
    </div>

    <!--Bracelet product bar -->
    <div class="productTitle">
        <a href="bracelet.php">Sản phẩm vòng đeo tay</a>
    </div>
    <div class="productBar">
        <?php
            require "connect.php";
            $count = 0;
            $sql = "SELECT * FROM bracelet";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                if($count === 6)
                    break;
        ?>
        <div class="productCard">
        <form method="post" action="productpage.php" id = "productPage">
            <input type="hidden" name="productid" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="table" value="bracelet">
            <button id="product" type="submit" name="display"><img src="img/<?php echo $row['name'] ?>.jpg" width = "200px"></button>                
            <div class="productDesc">
                <a><?php echo $row['name'] ?></a>
            </div>
            <div class="productDesc">
                <a><?php echo number_format($row['price'], 0, ',', '.') ?> vnđ</a>
            </div>
        </form>
        </div>                
            <?php
            $count++;
            }
            ?>
    </div>

    <!--Necklace product bar -->
    <div class="productTitle">
        <a href="necklace.php">Sản phẩm dây chuyền</a>
    </div>
    <div class="productBar">
        <?php
            require "connect.php";
            $count = 0;
            $sql = "SELECT * FROM necklace";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                if($count === 6)
                    break;
        ?>
        <div class="productCard">
        <form method="post" action="productpage.php" id = "productPage">
            <input type="hidden" name="productid" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="table" value="necklace">
            <button id="product" type="submit" name="display"><img src="img/<?php echo $row['name'] ?>.jpg" width = "200px"></button>                
            <div class="productDesc">
                <a><?php echo $row['name'] ?></a>
            </div>
            <div class="productDesc">
                <a><?php echo number_format($row['price'], 0, ',', '.') ?> vnđ</a>
            </div>
        </form>
        </div>                
            <?php
            $count++;
            }
            ?>
    </div>
    
<!--Earring product bar -->
    <div class="productTitle">
        <a href="earring.php">Sản phẩm bông tai</a>
    </div>
    <div class="productBar">
        <?php
            require "connect.php";
            $count = 0;
            $sql = "SELECT * FROM earring";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result))
            {           
                if($count === 6)
                    break;
        ?>
        <div class="productCard">
        <form method="post" action="productpage.php" id = "productPage">
            <input type="hidden" name="productid" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="table" value="earring">
            <button id="product" type="submit" name="display"><img src="img/<?php echo $row['name'] ?>.jpg" width = "200px"></button>                
            <div class="productDesc">
                <a><?php echo $row['name'] ?></a>
            </div>
            <div class="productDesc">
                <a><?php echo number_format($row['price'], 0, ',', '.') ?> vnđ</a>
            </div>
        </form>
        </div>                
            <?php
            $count++;
            }
            ?>
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
    <script src="js/myjs1.js"></script>
</body>
</html>