
    /**
     * Created by Kodemania on 11/5/2016.
     */

    $(document).ready(function(){

        $("#password").keydown(function(){
            var pass = $(this).val();

            if(pass.length > 5 ){
                $("#sizing-addon4 .fa-lock").css({'color':'#5cb85c'});
                $("#password").css({'border':'1px solid #5cb85c','border-right':'1px solid #898989'});
                $("#sizing-addon4").css({'border':'1px solid #5cb85c','border-left':'1px solid #898989'});
                $("#pass_error").html("<i class='fa fa-check'></i> Acceptable Password").css({'color':'#5cb85c'}).fadeIn(500);
            }
            else{
                $("#sizing-addon4 .fa-lock").css({'color':'#e74f4e'});
                $("#password").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon4").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#pass_error").html("<i class='fa fa-times'></i> Password is not enough long").css({'color':'#e74f4e'}).fadeIn(500);
            }
        });

        $('#register').submit(function(e){
            e.preventDefault();
            var submitBtn = $('#submit').button('loading');
            var username = $("#username").val();
            var email = $("#email").val();
            var pass  = $("#password").val();
            var sendAjax = true;

            if(username.length < 6 ){
                $("#sizing-addon2 .fa-user").css({'color':'#e74f4e'});
                $("#username").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon2").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#username_error").html("<i class='fa fa-times'></i> Username should be longer then 6 characters").css({'color':'#e74f4e'}).fadeIn(500);
                sendAjax = false;
            }

            if(email.length < 6 ){
                $("#sizing-addon3 .fa-at").css({'color':'#e74f4e'});
                $("#email").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon3").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#email_error").html("<i class='fa fa-times'></i> Email should be longer then 6 characters").css({'color':'#e74f4e'}).fadeIn(500);
                sendAjax = false;
            }

            if(pass.length < 6 ){
                $("#sizing-addon4 .fa-lock").css({'color':'#e74f4e'});
                $("#password").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon4").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#pass_error").html("<i class='fa fa-times'></i> Password Should be Longer then 6 characters").css({'color':'#e74f4e'}).fadeIn(500);
                sendAjax = false;
            }

            if(sendAjax){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url : 'signup/process/ajax',
                    data: {
                        _token      :   $("input[name='_token']").val(),
                        username    :   username,
                        email       :   email,
                        password    :   pass
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
            }
            submitBtn.button('reset');

        });

        $("#login").submit(function (e){
            e.preventDefault();

            var submitBtn = $('#submit').button('loading');
            var username = $("#username").val();
            var email = $("#email").val();
            var pass  = $("#password").val();
            var sendAjax = true;

            if(username.length < 6 ){
                $("#sizing-addon2 .fa-user").css({'color':'#e74f4e'});
                $("#username").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon2").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#username_error").html("<i class='fa fa-times'></i> Username should be longer then 6 characters").css({'color':'#e74f4e'}).fadeIn(500);
                sendAjax = false;
            }

            if(email.length < 6 ){
                $("#sizing-addon3 .fa-at").css({'color':'#e74f4e'});
                $("#email").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon3").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#email_error").html("<i class='fa fa-times'></i> Email should be longer then 6 characters").css({'color':'#e74f4e'}).fadeIn(500);
                sendAjax = false;
            }

            if(pass.length < 6 ){
                $("#sizing-addon4 .fa-lock").css({'color':'#e74f4e'});
                $("#password").css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
                $("#sizing-addon4").css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
                $("#pass_error").html("<i class='fa fa-times'></i> Password Should be Longer then 6 characters").css({'color':'#e74f4e'}).fadeIn(500);
                sendAjax = false;
            }

            if(sendAjax) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'login/process/ajax',
                    data: {
                        _token: $("input[name='_token']").val(),
                        username: username,
                        password: pass
                    },
                    error: function (data) {
                        sweetAlert('Oops...', data.responseJSON.username[0] + "\n" + data.responseJSON.email[0], "error");
                        submitBtn.button('reset');
                    },
                    success: function (data) {
                        submitBtn.button('reset');
                        try {
                            if (data.status) {
                                swal({
                                    title: "Success",
                                    text: data.message + "You will be redirected to dashboard in 2 seconds",
                                    timer: 2000,
                                    showConfirmButton: false
                                }, 'success');

                                setTimeout(function () {
                                    window.location = "/dashboard";
                                }, 2000);
                            }
                        }
                        catch (e) {
                            // catches exception
                            console.log(e);
                            sweetAlert('Oops...', "Some issue occur!. Please try later", "error");
                        }

                    }
                });
            }
        });

    });