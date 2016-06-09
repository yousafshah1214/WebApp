/**
 * Created by Kodemania on 26/5/2016.
 */

import {Ajax} from "../classes/Ajax.js";
import {Validation} from "../classes/Validation.js";
import {ErrorDisplayer} from "../classes/ErrorDisplayer.js";

export class AjaxModule{
    constructor(){

        this.passwordId =   "#password";
        this.passwordVal = $(this.passwordId).val();

        this.email      =   "#email";
        this.emailVal   =   $(this.email).val();

        this.formTokenValue = $("input[name='_token']").val();

        this.usernameLengthErrorMessage =   "Username is not enough long";
        this.emailErrorMessage          =   "Please enter valid email";
    }

    usernameAjaxCallWithValidation(usernameId){

        let validator           =   new Validation(usernameId);
        let errorDisplayer      =   new ErrorDisplayer();

        if(validator.validateLength(5)){
            // username is longer then 6 characters or 6 characters
            let ajax = new Ajax("POST","check/username");

            ajax.sendUsernameAjaxCall(usernameId,this.formTokenValue);

        }
        else{
            // username is less then 5 characters
            errorDisplayer.displayUsernameError(this.usernameLengthErrorMessage);
        }
    }

    emailAjaxCallWithValidation(emailId){
        let validator           =   new Validation(emailId);
        let errorDisplayer      =   new ErrorDisplayer();

        if(validator.validateLength(6) && validator.validateEmail()){
            // email is longer then 6 characters
            let ajax = new Ajax("POST","check/email");

            ajax.sendEmailAjaxCall(emailId,this.formTokenValue);
        }
        else{
            // email is not longer enough and is not in valid format
            errorDisplayer.displayEmailError(this.emailErrorMessage);
        }
    }

    registerAjaxCallWithValidation(usernameId,emailId,passwordId,formId,submitBtnId){
        let usernameValidator   =   new Validation(usernameId);
        let emailValidation     =   new Validation(emailId);
        let passValidation      =   new Validation(passwordId);
        let errorDisplayer      =   new ErrorDisplayer();

        if(! usernameValidator.validateLength(5)){
            // show error
            errorDisplayer.displayUsernameError(this.usernameLengthErrorMessage);
        }

        if (! emailValidation.validateLength(6) && ! emailValidation.validateEmail()){
            // show error
            errorDisplayer.displayEmailError(this.emailErrorMessage);
        }

        if(usernameValidator.validateLength(5) && passValidation.validateLength(5) && emailValidation.validateLength(6) && emailValidation.validateEmail()){
            // form is validated

            let ajax = new Ajax("POST","signup/process/ajax");
            ajax.sendRegisterAjaxCall(usernameId,emailId,passwordId,submitBtnId,this.formTokenValue);
        }
        else{
            // sweet alert of signup error.
            errorDisplayer.displayAuthError("Sorry for inconvenience We are facing some issue right now");
        }
    }

    loginAjaxCallWithValidation(usernameId,passwordId,submitBtnId){
        let usernameValidator   =   new Validation(usernameId);
        let passValidation      =   new Validation(passwordId);
        let errorDisplayer      =   new ErrorDisplayer();

        if(! usernameValidator.validateLength(5)){
            // show error
            errorDisplayer.displayUsernameError(this.usernameLengthErrorMessage);
        }

        if(usernameValidator.validateLength(5) && passValidation.validateLength(5)){
            // form is validated
            let ajax = new Ajax("POST","login/process/ajax");
            ajax.sendLoginAjaxCall(usernameId,passwordId,submitBtnId,this.formTokenValue);
        }
        else{
            // sweet alert of signup error.
            errorDisplayer.displayAuthError("Sorry for inconvenience We are facing some issue right now");
        }
    }
}
