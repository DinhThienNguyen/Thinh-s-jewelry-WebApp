
<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'user', '', 'jewelry');

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        echo "Failed";
    }
    if (empty($password)) {
        echo "Failed";
    }
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username && $row['password'] == $password){
        session_start();
        $_SESSION['username'] = $username;        
        $_SESSION['login_time'] = time();          
        header('location: admin.php');
    }
    else{
        echo "login failed";
    }
  }

  if (isset($_POST['AddWatchProduct'])) {

    $productname = mysqli_real_escape_string($db, $_POST['productname']);
    $productprice = mysqli_real_escape_string($db, $_POST['productprice']);
    $brandid = mysqli_real_escape_string($db, $_POST['brandid']);    
    $image = $_FILES['image']['name'];
    $ext = '.jpg';
    $destFile = "img/".$productname.$ext;

    $query = "INSERT INTO watch (`name`, price, brand_id) VALUES ('$productname', $productprice, $brandid)";
    mysqli_query($db, $query);
    move_uploaded_file($_FILES['image']['tmp_name'], $destFile);
    header('location: admin.php');
  }

  if (isset($_POST['AddBraceletProduct'])) {

    $productname = mysqli_real_escape_string($db, $_POST['productname']);
    $productprice = mysqli_real_escape_string($db, $_POST['productprice']);
    $brandid = mysqli_real_escape_string($db, $_POST['brandid']);    
    $image = $_FILES['image']['name'];
    $ext = '.jpg';
    $destFile = "img/".$productname.$ext;

    $query = "INSERT INTO bracelet (`name`, price, brand_id) VALUES ('$productname', $productprice, $brandid)";
    mysqli_query($db, $query);
    move_uploaded_file($_FILES['image']['tmp_name'], $destFile);
    header('location: admin.php');
  }

  if (isset($_POST['UpdateWatchProduct'])) {
    $productid = mysqli_real_escape_string($db, $_POST['productid']);

    $query = "SELECT name from watch WHERE id = $productid";
    $result = mysqli_query($db, $query);
    $oldproductname = "";
    while($row = mysqli_fetch_array($result))
    {
        $oldproductname = $row['name'];
    }
    $productname = mysqli_real_escape_string($db, $_POST['productname']);    
    $productprice = mysqli_real_escape_string($db, $_POST['productprice']);
    str_replace(".", "", $productprice);   
    $brandid = mysqli_real_escape_string($db, $_POST['brandid']);    
    
    $ext = '.jpg';
    $oldDestFile = "img/".$oldproductname.$ext;
    $newDestFile = "img/".$productname.$ext;

    $query1 = "UPDATE watch SET `name` = '$productname', price = $productprice, brand_id = $brandid WHERE id = $productid";
    mysqli_query($db, $query1);

    rename($oldDestFile, $newDestFile);
    echo "Chỉnh sửa thành công";    
    header( "refresh:5;url=admin.php" );
  }

  if (isset($_POST['DeleteWatchProductImage'])) {
    
    $productname = mysqli_real_escape_string($db, $_POST['productname']);
    $ext = '.jpg';
    $destFile = "img/".$productname.$ext;

    if (!unlink($destFile))
    {
        echo ("Lỗi khi xóa $destFile");
    }
    else
    {
        echo ("Xóa thành công $destFile");
    } 
    header( "refresh:5;url=admin.php" );
  }

  if (isset($_POST['UpdateWatchProductImage'])) {
    $productname = mysqli_real_escape_string($db, $_POST['productname']);
    $image = $_FILES['image']['name'];
    $ext = '.jpg';
    $destFile = "img/".$productname.$ext;
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $destFile))
    {
        echo ("Lỗi khi cập nhật $destFile");
    }
    else
    {
        echo ("Cập nhật thành công $destFile");
    } 
    
    header( "refresh:5;url=admin.php" );
  }

  if (isset($_POST['DeleteWatchProduct'])) {
    $productid = mysqli_real_escape_string($db, $_POST['productid']);
    $query = "DELETE FROM watch WHERE id = $productid";
    mysqli_query($db, $query);

    $productname = mysqli_real_escape_string($db, $_POST['productname']);
    $image = $_FILES['image']['name'];
    $ext = '.jpg';
    $destFile = "img/".$productname.$ext;
    if (!unlink($destFile))
    {
        echo ("Lỗi khi xóa $destFile");
    }
    else
    {
        echo ("Xóa thành công $destFile");
    } 
    
    header( "refresh:5;url=admin.php" );
  }
?>