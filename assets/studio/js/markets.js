$(document).ready(function(){
    $(".market").click(function(){
        var id=$(this).attr('data-id');
        window.location.href=site_url+'consumer/markets/setMarket/'+id;
    });
});