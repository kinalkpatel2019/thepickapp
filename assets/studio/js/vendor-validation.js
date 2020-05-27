$(document).ready(function(){
    //update profile
    $("#frmupdateprofile").validate({
        rules:{
            businesstype_id:{
                required:true
            },
            businessname:{
                required:true
            },
            address1:{
                required:true
            },
            address2:{
                required:true
            },
            phonenumber:{
                required:true,
                phoneUS:true,
            },
            zipcode:{
                required:true,
                zipcodeUS:true,
            },
            image: {
                required: function(element) {
                    return $("#filename").val() == "";
                  },
                extension: "jpg|jpeg|png|gif"
            }
        },
        errorClass:"is-invalid",
        messages:{
            businesstype_id:{
                required:"Please select Business Type"
            },
            businessname:{
                required:"Please enter Business Name"
            },
            address1:{
                required:"Please select Business Address1"
            },
            address2:{
                required:"Please select Business Address2"
            },
            phonenumber:{
                required:"Please select Business Phonenumber"
            },
            zipcode:{
                required:"Please select Business Zipcode"
            },
            image: {
                required: "Please uplaod image",
                extension: "Invalid File Type"
            }
        }
    });

    $.validator.addMethod( "phoneUS", function( phone_number, element ) {
        phone_number = phone_number.replace( /\s+/g, "" );
        return this.optional( element ) || phone_number.length > 9 &&
            phone_number.match( /^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]\d{2}-?\d{4}$/ );
    }, "Please specify a valid phone number" );

    $.validator.addMethod( "zipcodeUS", function( value, element ) {
        return this.optional( element ) || /^\d{5}(-\d{4})?$/.test( value );
    }, "The specified US ZIP Code is invalid" );


    //frmsettings
    $("#frmsettings").validate({
        rules:{
            "markets[]":{
                required:true
            },
        },
        errorClass:"is-invalid",
        messages:{
            "markets[]":{
                required:"Please select Market(s)"
            },
        }
    });

    //frmproduct
    $("#frmproduct").validate({
        rules:{
            category_id:{
                required:true,
            },
            title:{
                required:true,
            },
            description:{
                required:true,
            },
            "markets[]":{
                required:true,
            },
            tax:{
                required: function(element) {
                    return $("#is_taxable").val() == 1;
                  },
                  number: true
            },
            mainimage: {
                required: function(element) {
                    return $("#mainimagefile").val() == "";
                  },
            }

        },
        errorClass:"is-invalid",
        messages:{
            category_id:{
                required:"Please select a category",
            },
            title:{
                required:"Please enter Title",
            },
            description:{
                required:"Please enter description",
            },
            "markets[]":{
                required:"Please select market(s)",
            },
            tax:{
                required: "Please enter tax",
                number: "Please enter valid tax"
            },
            mainimage: {
                required: "Please upload product image",
            }
        }
    });

    //inventory 
    $("#frminventory").validate({
        rules:{
            packsize:{
                required:true,
            },
            availableqty:{
                required:true,
                number: true
            },
            price:{
                required:true,
                number: true
            }

        },
        errorClass:"is-invalid",
        messages:{
            packsize:{
                required:"Please select Pack Size",
            },
            availableqty:{
                required:"Please enter available qty",
            },
            price:{
                required:"Please enter price",
            }
        }
    });

    //frminventoryedit
    $("#frminventoryedit").validate({
        rules:{
            availableqty:{
                required:true,
            },
            price:{
                required:true,
                number: true
            }

        },
        errorClass:"is-invalid",
        messages:{
            availableqty:{
                required:"Please enter available qty",
            },
            price:{
                required:"Please enter price",
            }
        }
    });

    
});