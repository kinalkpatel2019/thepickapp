$(document).ready(function(){
  $("#packsize").change(function(){
      var iscontainer=$("#packsize :selected").attr('data-iscontainer');
      if(iscontainer==1)
          $(".unit-container").show();
      else{
          $(".unit-container").hide();
      }
  });
  $("#datatable").on("click","a.editInvantory",function(){
    var id=$(this).attr('data-invenoryid');
    var availableqty=$(this).attr('data-availableqty');
    var price=$(this).attr('data-price');
    $("#editid").val(id);
    $("#editavailableqty").val(availableqty);
    $("#editprice").val(price);
  });

  $('#datatableDefault').DataTable({
    dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 text-right'<'d-flex justify-content-end'fB>>>t<'d-flex align-items-center'<'mr-auto'i><'mb-0'p>>",
    lengthMenu: [ 10, 20, 30, 40, 50 ],
    responsive: true,
    buttons: [ 
      { extend: 'print', className: 'btn btn-default' },
      { extend: 'csv', className: 'btn btn-default' }
    ]
  });


  $("#market,#item").change(function(){
    var market_id=$("#market").val();
    var itemname=$("#item").val();
    window.location.href="?market_id="+market_id+"&itemname="+itemname;
  });
  $("#category,#from_date,#to_date").change(function(){
		var category_id=$("#category").val();
		var from_date=$("#from_date").val();
		var to_date=$("#to_date").val();
		//var itemname=$("#item").val();
		window.location.href="?category_id="+category_id+"&from_date="+from_date+"&to_date="+to_date;
  });
   $("#market_report,#category_market,#from_date_market,#to_date_market").change(function(){
		var market=$("#market_report").val();
		var category_id=$("#category_market").val();
		var from_date=$("#from_date_market").val();
		var to_date=$("#to_date_market").val();
		//var itemname=$("#item").val();
		window.location.href="?market_id="+market+"&category_id="+category_id+"&from_date="+from_date+"&to_date="+to_date;
  });
});



