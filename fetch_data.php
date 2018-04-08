<?php
    require "connect.php";
    //Load nhãn hiệu 
    $arr = $_POST['brand_id'];
    $table = $_POST['database'];
    $sql ="SELECT * FROM $table WHERE TRUE";
            
    foreach ($arr as $key =>$keyval) {
        if($key == 0) {
            $sql .= " AND brand_id ='$keyval'";
        } 
        else $sql .= " OR brand_id ='$keyval'";
    }

            
    //Load dữ liệu 
    $key = $_POST['id'];
    if($key == 'high') {
        $sql .= " ORDER BY price DESC";
    }
    else if($key == 'low') {
        $sql .= " ORDER BY price ASC";
    }

    /*$record_per_page = 2;  
    $page = '';  
    if(isset($_POST["page"]))  {  
        $page = $_POST["page"];  
    }  
    else  {  
        $page = 1;  
    }
    
    $page_query = $sql;  
    $page_result = mysqli_query($connect, $page_query);  
    $total_records = mysqli_num_rows($page_result);  
    $total_pages = ceil($total_records/$record_per_page); 

    //phân trang
    $start_from = ($page - 1)*$record_per_page;  
    $sql .= " LIMIT $start_from, $record_per_page";  
           */ 
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
 <!--   <div style="clear:float">
    </div>
    <div class="pagination">
<?php    
    /*for($i=1; $i<=$total_pages; $i++)  
    {  
?>
        <span class="pagination_link" id="<?php echo $i; ?>"><?php echo $i; ?></span>
<?php
    }  
?>
    </div>

