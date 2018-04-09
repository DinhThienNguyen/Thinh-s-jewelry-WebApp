<?php 
session_start();
$db = mysqli_connect('localhost', 'user', '', 'jewelry');
if (isset($_POST['display'])) {
    $productid = mysqli_real_escape_string($db, $_POST['productid']);
    $table = mysqli_real_escape_string($db, $_POST['table']);
    $row;
    $result;
    if($table === 'watch')
    {
        $query = "SELECT watch.id, watch.name, watch.price, watchbrand.name brandname FROM watch INNER JOIN watchbrand ON watch.brand_id = watchbrand.id WHERE watch.id = $productid";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
    }
    else if($table === 'bracelet')
    {
        $query = "SELECT bracelet.id, bracelet.name, bracelet.price, braceletbrand.name brandname FROM bracelet INNER JOIN braceletbrand ON bracelet.brand_id = braceletbrand.id WHERE bracelet.id = $productid";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
    }
    else if($table === 'earring')
    {
        $query = "SELECT earring.id, earring.name, earring.price, earringmaterial.name materialname FROM earring INNER JOIN earringmaterial ON earring.material_id = earringmaterial.id WHERE earring.id = $productid";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
    }else if($table === 'necklace')
    {
        $query = "SELECT necklace.id, necklace.name, necklace.price, necklacematerial.name materialname FROM necklace INNER JOIN necklacematerial ON necklace.material_id = necklacematerial.id WHERE necklace.id = $productid";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
    }
}
?>
<html>
<head>
    <meta http-equiv="Cache-control" content="no-cache">    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial-scale=1">
    <title>Thịnh's jelwery | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
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
</style>
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
    <div style="display:inline-block;vertical-align:top;">
        <img style="width:500px;" src="img/<?php echo $row['name'] ?>.jpg">
    </div>
    <div style="display:inline-block;">
        <div style="padding-left: 1%;padding-top: 10%;font-size: 25px;"><?php echo $row['name'] ?></div>
        <div style="padding-left: 1%;padding-top: 1%;font-size: 20px;">Giá bán: <?php echo number_format($row['price'], 0, ',', '.') ?> vnđ</div>
        <?php if($table === 'watch' || $table === 'bracelet')
                { ?>
                    <div style="padding-left: 1%;padding-top: 1%;font-size: 20px;">Thương hiệu: <?php echo $row['brandname']; ?> </div>
                    <?php                                        
                } 
                else if($table === 'necklace' || $table === 'earring')
                { ?>
                    <div style="padding-left: 1%;padding-top: 1%;font-size: 20px;">Chất liệu: <?php echo $row['materialname']; ?> </div>
                    <?php                                        
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
</body>
</html>