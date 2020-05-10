$(document).ready(function(){
    $(".vendor").click(function(){
        var id=$(this).attr('data-id');
        window.location.href=site_url+'consumer/products/index/'+id;
    });
});