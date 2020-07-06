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
	$("#btnCopyToClipboard").click(function(){
		var clipboardText = "";
		clipboardText = $( '#link' ).val(); 
		copylink( clipboardText );
		alert( "Link Copied" );
	});
	function copylink(text) {
	   var textArea = document.createElement( "textarea" );
	   textArea.value = text;
	   document.body.appendChild( textArea );       
	   textArea.select();
	   try {
		  var successful = document.execCommand( 'copy' );
		  var msg = successful ? 'successful' : 'unsuccessful';
		  console.log('Copying text command was ' + msg);
	   } catch (err) {
		  console.log('Oops, unable to copy',err);
	   }    
	   document.body.removeChild( textArea );
	}
});