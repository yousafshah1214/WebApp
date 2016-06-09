/**
 * Created by Kodemania on 24/5/2016.
 */

export class ErrorDisplayer{

    constructor(){
        this.passwordInputId    = "#password";
        this.passwordErrorId    = "#pass_error";
        this.passwordIconBoxId  = "#sizing-addon4";
        this.passwordIcon       = "#sizing-addon4 .fa-lock";

        this.usernameInputId    =   "#username";
        this.usernameErrorId    =   "#username_error";
        this.usernameIconBoxId  =   "#sizing-addon2";
        this.usernameIcon       =   "#sizing-addon2 .fa-user";

        this.emailInputId       =   "#email";
        this.emailErrorId       =   "#email_error";
        this.emailIconBoxId     =   "#sizing-addon3";
        this.emailIcon          =   "#sizing-addon3 .fa-at";
    }

    displayUsernameError(message){
        $(this.usernameIcon).css({'color':'#e74f4e'});
        $(this.usernameInputId).css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
        $(this.usernameIconBoxId).css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
        $(this.usernameErrorId).html(`<i class='fa fa-times'></i> ${message}`).css({'color':'#e74f4e'}).fadeIn(500);
    }

    displayUsernameSuccess(message){
        $(this.usernameIcon).css({'color':'#5cb85c'});
        $(this.usernameInputId).css({'border':'1px solid #5cb85c','border-right':'1px solid #898989'});
        $(this.usernameIconBoxId).css({'border':'1px solid #5cb85c','border-left':'1px solid #898989'});
        $(this.usernameErrorId).html(`<i class='fa fa-check'></i> ${message}`).css({'color':'#5cb85c'}).fadeIn(500);
    }

    displayPasswordError(message){
        $(this.passwordIcon).css({'color':'#e74f4e'});
        $(this.passwordInputId).css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
        $(this.passwordIconBoxId).css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
        $(this.passwordErrorId).html(`<i class='fa fa-times'></i> ${message}`).css({'color':'#e74f4e'}).fadeIn(500);
    }

    displayPasswordSuccess(message){
        $(this.passwordIcon).css({'color':'#5cb85c'});
        $(this.passwordInputId).css({'border':'1px solid #5cb85c','border-right':'1px solid #898989'});
        $(this.passwordIconBoxId).css({'border':'1px solid #5cb85c','border-left':'1px solid #898989'});
        $(this.passwordErrorId).html(`<i class='fa fa-check'></i> ${message}`).css({'color':'#5cb85c'}).fadeIn(500);
    }

    displayEmailError(message){
        $(this.emailIcon).css({'color':'#e74f4e'});
        $(this.emailInputId).css({'border':'1px solid #e74f4e','border-right':'1px solid #898989'});
        $(this.emailIconBoxId).css({'border':'1px solid #e74f4e','border-left':'1px solid #898989'});
        $(this.emailErrorId).html(`<i class='fa fa-times'></i> ${message}`).css({'color':'#e74f4e'}).fadeIn(500);
    }
    displayEmailSuccess(message){
        $(this.emailIcon).css({'color':'#5cb85c'});
        $(this.emailInputId).css({'border':'1px solid #5cb85c','border-right':'1px solid #898989'});
        $(this.emailIconBoxId).css({'border':'1px solid #5cb85c','border-left':'1px solid #898989'});
        $(this.emailErrorId).html(`<i class='fa fa-check'></i> ${message}`).css({'color':'#5cb85c'}).fadeIn(500);
    }

    displaySignupProcessReturnError(data){
        sweetAlert('Oops...3',data.responseJSON.username[0] + "\n" + data.responseJSON.email[0],"error");
    }

    displayLoginProcessReturnError(){
        sweetAlert('Oops...',"Username or password is incorrect","error");
    }

    displayAuthProcessReturnSuccess(data,message){
        swal({   title: "Success",   text: `${data.message} ${message}`,   timer: 2000,   showConfirmButton: false },'success');
    }

    displayAuthError(message){
        sweetAlert('Oops...',`${message}`,"error");
    }
}
