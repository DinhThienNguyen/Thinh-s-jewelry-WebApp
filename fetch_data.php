<?php
            require "connect.php";
            //Load nhãn hiệu 
            $arr = $_POST['brand_id'];
            $sql ="SELECT * FROM watch WHERE TRUE";
            
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
