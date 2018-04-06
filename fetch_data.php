<?php
            $host = "localhost";
            $username = "user";
            $password = "";
            $database = "jewelry";
        
            $connect = mysqli_connect($host, $username, $password, $database);
            $connect->set_charset("utf8");

            //Load nhãn hiệu 
            

            //Load dữ liệu 
            $key = $_POST['id'];
            if($key == 'high') {
              $sql = "SELECT * FROM watch ORDER BY price DESC";
            }
            else if($key == 'low') {
              $sql = "SELECT * FROM watch ORDER BY price ASC";
            }
            else 
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
