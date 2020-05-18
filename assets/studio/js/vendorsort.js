$(document).ready(function(){

    function updatePosition(){
        var sortorder=0;
        $(".txtvendors").each(function(){
            $(this).val(sortorder);
            sortorder++;
        });
    }

    $( "#sortable" ).sortable({
        stop: function( event, ui ) {
            updatePosition();
        }
    });
    $( "#sortable" ).disableSelection();

});
