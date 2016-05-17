
    /**
     * Created by Kodemania on 11/5/2016.
     */

    $(document).ready(function(){

        $("#username").focusout(function(){

            var usernameTxt = $("#username").val();

            if(usernameTxt.length > 5){
                $.ajax({
                    type: 'POST',
                    url: "check/username",
                    data: {
                        _token : $("input[name='_token']").val(),
                        username : usernameTxt
                    },
                    success:function(data){
                        if(data == "unavailable"){
                            $("#sizing-addon2 .fa-user").css({'color':'#e74f4e'});
                            $("#username").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                            $("#sizing-addon2").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                            $("#username_error").html("<i class='fa fa-times'></i> Username not available").css({'color':'#e74f4e'}).fadeIn(500);
                        }
                        else if(data == "available"){
                            $("#sizing-addon2 .fa-user").css({'color':'#5cb85c'});
                            $("#username").css({'border':'1px solid #5cb85c','border-right':'1px solid #898989'});
                            $("#sizing-addon2").css({'border':'1px solid #5cb85c','border-left':'1px solid #898989'});
                            $("#username_error").html("<i class='fa fa-check'></i> Username available").css({'color':'#5cb85c'}).fadeIn(500);
                        }
                    }
                });
            }

        });

        $("#email").focusout(function(){

            var emailTxt = $("#email").val();

            if(emailTxt.length > 5){
                $.ajax({
                    type: 'POST',
                    url: "check/email",
                    data: {
                        _token : $("input[name='_token']").val(),
                        email : emailTxt
                    },
                    success:function(data){
                        if(data == "unavailable"){
                            $("#sizing-addon3 .fa-at").css({'color':'#e74f4e'});
                            $("#email").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                            $("#sizing-addon3").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                            $("#email_error").html("<i class='fa fa-times'></i> Email not available").css({'color':'#e74f4e'}).fadeIn(500);
                        }
                        else if(data == "available"){
                            $("#sizing-addon3 .fa-at").css({'color':'#5cb85c'});
                            $("#email").css({'border':'1px solid #5cb85c','border-right':'1px solid #898989'});
                            $("#sizing-addon3").css({'border':'1px solid #5cb85c','border-left':'1px solid #898989'});
                            $("#email_error").html("<i class='fa fa-check'></i> Email available").css({'color':'#5cb85c'}).fadeIn(500);
                        }
                    }
                });
            }

        });

        $('#register').submit(function(e){
            e.preventDefault();
            var submitBtn = $('#submit').button('loading');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url : 'signup/process/ajax',
                data: {
                    _token      :   $("input[name='_token']").val(),
                    username    :   $("#username").val(),
                    email       :   $("#email").val(),
                    password    :   $("#password").val()
                },
                error: function(data){
                    sweetAlert('Oops...',data.responseJSON.username[0] + "\n" + data.responseJSON.email[0],"error");
                    submitBtn.button('reset');
                },
                success : function(data){
                    submitBtn.button('reset');
                    try{
                        if(data.status){
                            swal({   title: "Success",   text: data.message + "You will be redirected to login page in 2 seconds",   timer: 2000,   showConfirmButton: false },'success');

                            setTimeout(function() {
                                window.location = "/login";
                            }, 2000);
                        }
                    }
                    catch(e){
                        // catches exception
                        console.log(e);
                        sweetAlert('Oops...',"Some issue occur!. Please try later","error");
                    }

                }
            });
        });
    });