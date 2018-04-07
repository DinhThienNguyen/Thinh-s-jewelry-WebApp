$(document).ready(function() {
    $(".filter").change(function() {
        var id = $(".filter").val();
        var arr_id = new Array();
        $("input:checked").each(function() {
            if (this.checked) {
                arr_id.push($(this).val());
            }
        })

        $.post("fetch_data.php", { id: id, brand_id: arr_id }, function(data) {
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
        $.post("fetch_data.php", { brand_id: id }, function(data) {
            $(".product-container").html(data);
        })
    })
})