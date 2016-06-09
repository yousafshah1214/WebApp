/**
 * Created by Kodemania on 24/5/2016.
 */

//

import {ErrorDisplayer} from "./ErrorDisplayer.js";

export class Ajax{

    constructor(requestType,requestUrl){
        this.requestType    =   requestType;
        this.requestUrl     =   requestUrl;
    }

    sendUsernameAjaxCall(usernameId,token){

        let errorDisplayer = new ErrorDisplayer();

        $.ajax({
            type: this.requestType,
            url: this.requestUrl,
            data: {
                _token : token,
                username : $(usernameId).val()
            },
            success:function(data){
                if(data == "available"){
                    errorDisplayer.displayUsernameSuccess("Username available");
                }
                else if (data == "unavailable"){
                    errorDisplayer.displayUsernameError("Username unavailable");
                }
            },
            error:function(){
                errorDisplayer.displayUsernameError("Network issue while checking");
            }
        });
    }

    sendEmailAjaxCall(emailId,token){
        let errorDisplayer = new ErrorDisplayer();

        $.ajax({
            type: this.requestType,
            url:  this.requestUrl,
            data:{
                _token  :   token,
                email   :   $(emailId).val()
            },
            success:function(data){
                if(data == "available"){
                    errorDisplayer.displayEmailSuccess("Email available");
                }
                else if (data == "unavailable"){
                    errorDisplayer.displayEmailError("Email already registered");
                }
            },
            error:function(){
                errorDisplayer.displayEmailError("Network issue while checking");
            }
        });
    }

    sendRegisterAjaxCall(usernameId,emailId,passwordId,submitBtnId,token){

        let submitBtn = $(submitBtnId).button('loading');
        let errorDisplayer = new ErrorDisplayer();

        $.ajax({
            type: this.requestType,
            dataType: 'json',
            url : this.requestUrl,
            data: {
                _token      :   token,
                username    :   $(usernameId).val(),
                email       :   $(emailId).val(),
                password    :   $(passwordId).val()
            },
            error: function(data){
                errorDisplayer.displayAuthError("Username or Email is already registered");
                submitBtn.button('reset');
            },
            success : function(data){
                submitBtn.button('reset');
                try{
                    if(data.status){
                        errorDisplayer.displayAuthProcessReturnSuccess(data,"You will be redirected to login page in 2 seconds");
                        setTimeout(function() {
                            window.location = "/login";
                        }, 2000);
                    }
                    else{
                        errorDisplayer.displayAuthError(data.message);
                    }
                }
                catch(e){
                    // catches exception
                    console.log(e);
                    errorDisplayer.displayAuthError("Some issue occur!. Please try later");
                }
            }
        });
    }

    sendLoginAjaxCall(usernameId,passwordId,submitBtnId,token){
        let submitBtn = $(submitBtnId).button('loading');
        let errorDisplayer = new ErrorDisplayer();

        $.ajax({
            type: this.requestType,
            dataType: 'json',
            url : this.requestUrl,
            data: {
                _token      :   token,
                username    :   $(usernameId).val(),
                password    :   $(passwordId).val()
            },
            error: function(data){
                console.log(data);
                errorDisplayer.displayAuthError("Some issue occur!! Please try later");
                submitBtn.button('reset');
            },
            success : function(data){
                submitBtn.button('reset');
                try{
                    if(data.status){
                        errorDisplayer.displayAuthProcessReturnSuccess(data,"You will be redirected to dashboard in 2 seconds");
                        setTimeout(function() {
                            window.location = "/login";
                        }, 2000);
                    }
                    else{
                        errorDisplayer.displayLoginProcessReturnError();
                    }
                }
                catch(e){
                    // catches exception
                    console.log(e);
                    errorDisplayer.displayAuthError("Some issue occur!! Please try later");
                }
            }
        });
    }
}
