$(document).ready(function(){

    //login validation 
    $("#frmlogin").validate({
        rules:{
            email:{
                required:true,
                email:true,
            },
            password:{
                required:true
            }
        },
        errorClass:"is-invalid",
        messages:{
            email:{
                required:"Please enter email address",
                email:"Please enter valid email address"
            },
            password:{
                required:"Please enter password"
            }
        },
    });


    //register
    var options = {};
    options.ui = {
        container: "#pwdstrength-container",
        showVerdictsInsideProgressBar: true,
        viewports: {
        progress: ".pwstrength_viewport_progress"
        },
        progressExtraCssClasses: "progress-sm"
    };
    options.common = {
        debug: true,
        onLoad: function () {
        $('#messages').text('Start typing password');
        }
    };
    $('#password').pwstrength(options);


    //register validation
    $("#frmregister").validate({
        rules:{
            firstname:{
                required:true,
            },
            lastname:{
                required:true,
            },
            email:{
                required:true,
                email:true,
                remote: {
                    url: site_url+"users/checkemail",
                    type: "post"
                 }
            },
            password:{
                required:true,
                minlength: 6,
                maxlength: 15,
            },
            accounttype:{
                required:true,
            }
        },
        errorClass:"is-invalid",
        messages:{
            firstname:{
                required:"Please enter first name",
            },
            lastname:{
                required:"Please enter last name",
            },
            email:{
                required:"Please enter email address",
                email:"Please enter valid email address",
                remote: "Email already in use!"
            },
            password:{
                required:"Please enter password"
            },
            
        },
        
    });

    //forgot password
    $("#frmforgotpassword").validate({
        rules:{
            email:{
                required:true,
                email:true,
                remote: {
                    url: site_url+"users/checkemail/available",
                    type: "post",
                 }
            },
        },
        errorClass:"is-invalid",
        messages:{
            email:{
                required:"Please enter email address",
                email:"Please enter valid email address",
                remote: "Email is not register!"
            },
            
        },
        
    });

    //frmresetpassword
    $("#frmresetpassword").validate({
        rules:{
            password:{
                required:true,
                minlength: 6,
                maxlength: 15,
            },
        },
        errorClass:"is-invalid",
        messages:{
            password:{
                required:"Please enter password"
            },
            
        },
        
    });

});