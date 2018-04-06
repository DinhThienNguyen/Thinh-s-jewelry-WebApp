$(document).ready(function() {
    $(".filter").change(function() {
        var id = $(".filter").val();
        $.post("fetch_data.php", { id: id }, function(data) {
            $(".product-container").html(data);
        })
    })
})