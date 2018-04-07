$(document).ready(function() {


    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    var tabledata = "";
    if (sPage == "bracelet.php") {
        tabledata = "bracelet";
    } else if (sPage == "watch.php") {
        tabledata = "watch";
    }

    load_data();

    function load_data(page) {
        $.post("pagination.php", { database: tabledata, page: page }, function(data) {
            $(".product-container").html(data);
        })
    }
    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
    });

    $(".filter").change(function() {
        var id = $(".filter").val();
        var arr_id = new Array();
        $("input:checked").each(function() {
            if (this.checked) {
                arr_id.push($(this).val());
            }
        })

        $.post("fetch_data.php", { database: tabledata, id: id, brand_id: arr_id }, function(data) {
            $(".product-container").html(data);
        })

    })

    $(".ant-checkbox-input").click(function() {
        var id = new Array();
        $("input:checked").each(function() {
            if (this.checked) {
                id.push($(this).val());
            }
        })

        $.post("fetch_data.php", { database: tabledata, brand_id: id }, function(data) {
            $(".product-container").html(data);
        })
    })
})