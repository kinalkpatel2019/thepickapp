$(document).ready(function(){
    $(".vendor").click(function(){
        var id=$(this).attr('data-id');
        var isopen=$(this).attr('data-open');
        if(isopen==1){
            var ispopupstatus=$(this).attr('data-popupstatus');
            if(ispopupstatus==1)
            {
                $("#popupbody").html("Hello");
                $('#showopup').modal();
                $("#popupbody").html($(this).find(".popupcontent:first").html());
                $("#pouplink").attr('href',site_url+'consumer/products/index/'+id);
            }
            else{
                window.location.href=site_url+'consumer/products/index/'+id;
            }
            
        }
        else
            alert("Store is Currently not Serving in this market!");
    });
});