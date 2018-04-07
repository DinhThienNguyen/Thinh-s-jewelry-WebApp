<?php 
    require "connect.php";
    $table = $_POST["database"];
    $record_per_page = 2;  
    $page = '';  
    $output = '';  
    if(isset($_POST["page"]))  {  
         $page = $_POST["page"];  
    }  
    else  {  
         $page = 1;  
    }

    $start_from = ($page - 1)*$record_per_page;  
    $query = "SELECT * FROM $table LIMIT $start_from, $record_per_page";  
    
    $result = mysqli_query($connect, $query);  

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
        <div class="productCard">
            <img id="product" src="img/'.$row["name"].'.jpg"/>
            <div class="productDesc">
            <a href="#">'.$row["name"].'</a>
            </div>
                <div class="productDesc">
                    <a href="#">'.number_format($row["price"], 0, ",", ".").'vnđ</a>
                </div>
            </div>    
        </div>            
        ';
    }

    $page_query = "SELECT * FROM $table";  
    $page_result = mysqli_query($connect, $page_query);  
    $total_records = mysqli_num_rows($page_result);  
    $total_pages = ceil($total_records/$record_per_page); 
    $output .= "<div style='clear: float'></div><div class='pagination'>";
    
    for($i=1; $i<=$total_pages; $i++)  
    {  
        $output .= "<span class='pagination_link' id='".$i."'>".$i."</span>"; 
    }  
    $output .= '</div><br /><br /></div';  
    echo $output;  
?>