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
});