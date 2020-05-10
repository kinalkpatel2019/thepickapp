$('#datatableDefault').DataTable({
    dom: "<'row mb-3'<'col-sm-4'l><'col-sm-8 text-right'<'d-flex justify-content-end'fB>>>t<'d-flex align-items-center'<'mr-auto'i><'mb-0'p>>",
    lengthMenu: [ 10, 20, 30, 40, 50 ],
    responsive: true,
    buttons: [ 
      { extend: 'print', className: 'btn btn-default' },
      { extend: 'csv', className: 'btn btn-default' }
    ]
  });

  $(document).ready(function(){
    $("#packsize").change(function(){
        var iscontainer=$("#packsize :selected").attr('data-iscontainer');
        if(iscontainer==1)
            $(".unit-container").show();
        else{
            $(".unit-container").hide();
        }
    });
    $("a.editInvantory").click(function(){
      var id=$(this).attr('data-invenoryid');
      var availableqty=$(this).attr('data-availableqty');
      var price=$(this).attr('data-price');
      $("#editid").val(id);
      $("#editavailableqty").val(availableqty);
      $("#editprice").val(price);
    });
});