$(function() {
	$('.repeat').each(function() {
      $(this).repeatable_fields({
        wrapper: 'table',
        container: 'tbody',
      });
	});

});

$(document).ready(function(){
  $(".product").click(function(){
      var id=$(this).attr('data-id');
      window.location.href=site_url+'consumer/products/view/'+id;
  });
});