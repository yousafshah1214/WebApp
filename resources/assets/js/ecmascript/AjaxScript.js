/**
 * Created by Kodemania on 26/5/2016.
 */

import {AjaxModule} from "./module/AjaxModule.js";
import {ValidationModule}  from "./module/ValidationModule.js";

var ajaxModule = new AjaxModule();


$("#register #username").keyup(function(){
    ajaxModule.usernameAjaxCallWithValidation("#username");
});

$("#register #email").keyup(function(){
    ajaxModule.emailAjaxCallWithValidation("#email");
});

$("#register #username").focusout(function(){
    ajaxModule.usernameAjaxCallWithValidation("#username");
});

$("#register #email").focusout(function(){
    ajaxModule.emailAjaxCallWithValidation("#email");
});

$("#register #password").keyup(function(){
    let validationModule = new ValidationModule("#password");

    validationModule.validatePass("#password");
});

$("#register").submit(function(e){
    e.preventDefault();

    ajaxModule.registerAjaxCallWithValidation("#username","#email","#password","#register","#submit");

});

$("#login").submit(function(e){
    e.preventDefault();

    ajaxModule.loginAjaxCallWithValidation("#username","#password","#submit");

});





