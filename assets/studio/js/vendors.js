$(document).ready(function(){
    $(".vendor").click(function(){
        var id=$(this).attr('data-id');
        var isopen=$(this).attr('data-open');
        if(isopen==1)
            window.location.href=site_url+'consumer/products/index/'+id;
        else
            alert("Store is Currently not Serving in this market!");
    });
});