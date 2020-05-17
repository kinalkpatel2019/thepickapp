$(document).ready(function(){
    $(".printThis").click(function(){
        var target=$(this).attr('data-target');
        var pageTitle=$(this).attr('data-pagetitle');
        $('#'+target).printThis({
            pageTitle:pageTitle,
        });
    });
});