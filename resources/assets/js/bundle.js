(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _AjaxModule = require("./module/AjaxModule.js");

var _ValidationModule = require("./module/ValidationModule.js");

/**
 * Created by Kodemania on 26/5/2016.
 */

var ajaxModule = new _AjaxModule.AjaxModule();

$("#register #username").keyup(function () {
    ajaxModule.usernameAjaxCallWithValidation("#username");
});

$("#register #email").keyup(function () {
    ajaxModule.emailAjaxCallWithValidation("#email");
});

$("#register #username").focusout(function () {
    ajaxModule.usernameAjaxCallWithValidation("#username");
});

$("#register #email").focusout(function () {
    ajaxModule.emailAjaxCallWithValidation("#email");
});

$("#register #password").keyup(function () {
    var validationModule = new _ValidationModule.ValidationModule("#password");

    validationModule.validatePass("#password");
});

$("#register").submit(function (e) {
    e.preventDefault();

    ajaxModule.registerAjaxCallWithValidation("#username", "#email", "#password", "#register", "#submit");
});

$("#login").submit(function (e) {
    e.preventDefault();

    ajaxModule.loginAjaxCallWithValidation("#username", "#password", "#submit");
});

},{"./module/AjaxModule.js":5,"./module/ValidationModule.js":6}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.Ajax = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }(); /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      * Created by Kodemania on 24/5/2016.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      */

//

var _ErrorDisplayer = require("./ErrorDisplayer.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Ajax = exports.Ajax = function () {
    function Ajax(requestType, requestUrl) {
        _classCallCheck(this, Ajax);

        this.requestType = requestType;
        this.requestUrl = requestUrl;
    }

    _createClass(Ajax, [{
        key: "sendUsernameAjaxCall",
        value: function sendUsernameAjaxCall(usernameId, token) {

            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            $.ajax({
                type: this.requestType,
                url: this.requestUrl,
                data: {
                    _token: token,
                    username: $(usernameId).val()
                },
                success: function success(data) {
                    if (data == "available") {
                        errorDisplayer.displayUsernameSuccess("Username available");
                    } else if (data == "unavailable") {
                        errorDisplayer.displayUsernameError("Username unavailable");
                    }
                },
                error: function error() {
                    errorDisplayer.displayUsernameError("Network issue while checking");
                }
            });
        }
    }, {
        key: "sendEmailAjaxCall",
        value: function sendEmailAjaxCall(emailId, token) {
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            $.ajax({
                type: this.requestType,
                url: this.requestUrl,
                data: {
                    _token: token,
                    email: $(emailId).val()
                },
                success: function success(data) {
                    if (data == "available") {
                        errorDisplayer.displayEmailSuccess("Email available");
                    } else if (data == "unavailable") {
                        errorDisplayer.displayEmailError("Email already registered");
                    }
                },
                error: function error() {
                    errorDisplayer.displayEmailError("Network issue while checking");
                }
            });
        }
    }, {
        key: "sendRegisterAjaxCall",
        value: function sendRegisterAjaxCall(usernameId, emailId, passwordId, submitBtnId, token) {

            var submitBtn = $(submitBtnId).button('loading');
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            $.ajax({
                type: this.requestType,
                dataType: 'json',
                url: this.requestUrl,
                data: {
                    _token: token,
                    username: $(usernameId).val(),
                    email: $(emailId).val(),
                    password: $(passwordId).val()
                },
                error: function error(data) {
                    errorDisplayer.displayAuthError("Username or Email is already registered");
                    submitBtn.button('reset');
                },
                success: function success(data) {
                    submitBtn.button('reset');
                    try {
                        if (data.status) {
                            errorDisplayer.displayAuthProcessReturnSuccess(data, "You will be redirected to login page in 2 seconds");
                            setTimeout(function () {
                                window.location = "/login";
                            }, 2000);
                        } else {
                            errorDisplayer.displayAuthError(data.message);
                        }
                    } catch (e) {
                        // catches exception
                        console.log(e);
                        errorDisplayer.displayAuthError("Some issue occur!. Please try later");
                    }
                }
            });
        }
    }, {
        key: "sendLoginAjaxCall",
        value: function sendLoginAjaxCall(usernameId, passwordId, submitBtnId, token) {
            var submitBtn = $(submitBtnId).button('loading');
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            $.ajax({
                type: this.requestType,
                dataType: 'json',
                url: this.requestUrl,
                data: {
                    _token: token,
                    username: $(usernameId).val(),
                    password: $(passwordId).val()
                },
                error: function error(data) {
                    console.log(data);
                    errorDisplayer.displayAuthError("Some issue occur!! Please try later");
                    submitBtn.button('reset');
                },
                success: function success(data) {
                    submitBtn.button('reset');
                    try {
                        if (data.status) {
                            errorDisplayer.displayAuthProcessReturnSuccess(data, "You will be redirected to dashboard in 2 seconds");
                            setTimeout(function () {
                                window.location = "/login";
                            }, 2000);
                        } else {
                            errorDisplayer.displayLoginProcessReturnError();
                        }
                    } catch (e) {
                        // catches exception
                        console.log(e);
                        errorDisplayer.displayAuthError("Some issue occur!! Please try later");
                    }
                }
            });
        }
    }]);

    return Ajax;
}();

},{"./ErrorDisplayer.js":3}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/**
 * Created by Kodemania on 24/5/2016.
 */

var ErrorDisplayer = exports.ErrorDisplayer = function () {
    function ErrorDisplayer() {
        _classCallCheck(this, ErrorDisplayer);

        this.passwordInputId = "#password";
        this.passwordErrorId = "#pass_error";
        this.passwordIconBoxId = "#sizing-addon4";
        this.passwordIcon = "#sizing-addon4 .fa-lock";

        this.usernameInputId = "#username";
        this.usernameErrorId = "#username_error";
        this.usernameIconBoxId = "#sizing-addon2";
        this.usernameIcon = "#sizing-addon2 .fa-user";

        this.emailInputId = "#email";
        this.emailErrorId = "#email_error";
        this.emailIconBoxId = "#sizing-addon3";
        this.emailIcon = "#sizing-addon3 .fa-at";
    }

    _createClass(ErrorDisplayer, [{
        key: "displayUsernameError",
        value: function displayUsernameError(message) {
            $(this.usernameIcon).css({ 'color': '#e74f4e' });
            $(this.usernameInputId).css({ 'border': '1px solid #e74f4e', 'border-right': '1px solid #898989' });
            $(this.usernameIconBoxId).css({ 'border': '1px solid #e74f4e', 'border-left': '1px solid #898989' });
            $(this.usernameErrorId).html("<i class='fa fa-times'></i> " + message).css({ 'color': '#e74f4e' }).fadeIn(500);
        }
    }, {
        key: "displayUsernameSuccess",
        value: function displayUsernameSuccess(message) {
            $(this.usernameIcon).css({ 'color': '#5cb85c' });
            $(this.usernameInputId).css({ 'border': '1px solid #5cb85c', 'border-right': '1px solid #898989' });
            $(this.usernameIconBoxId).css({ 'border': '1px solid #5cb85c', 'border-left': '1px solid #898989' });
            $(this.usernameErrorId).html("<i class='fa fa-check'></i> " + message).css({ 'color': '#5cb85c' }).fadeIn(500);
        }
    }, {
        key: "displayPasswordError",
        value: function displayPasswordError(message) {
            $(this.passwordIcon).css({ 'color': '#e74f4e' });
            $(this.passwordInputId).css({ 'border': '1px solid #e74f4e', 'border-right': '1px solid #898989' });
            $(this.passwordIconBoxId).css({ 'border': '1px solid #e74f4e', 'border-left': '1px solid #898989' });
            $(this.passwordErrorId).html("<i class='fa fa-times'></i> " + message).css({ 'color': '#e74f4e' }).fadeIn(500);
        }
    }, {
        key: "displayPasswordSuccess",
        value: function displayPasswordSuccess(message) {
            $(this.passwordIcon).css({ 'color': '#5cb85c' });
            $(this.passwordInputId).css({ 'border': '1px solid #5cb85c', 'border-right': '1px solid #898989' });
            $(this.passwordIconBoxId).css({ 'border': '1px solid #5cb85c', 'border-left': '1px solid #898989' });
            $(this.passwordErrorId).html("<i class='fa fa-check'></i> " + message).css({ 'color': '#5cb85c' }).fadeIn(500);
        }
    }, {
        key: "displayEmailError",
        value: function displayEmailError(message) {
            $(this.emailIcon).css({ 'color': '#e74f4e' });
            $(this.emailInputId).css({ 'border': '1px solid #e74f4e', 'border-right': '1px solid #898989' });
            $(this.emailIconBoxId).css({ 'border': '1px solid #e74f4e', 'border-left': '1px solid #898989' });
            $(this.emailErrorId).html("<i class='fa fa-times'></i> " + message).css({ 'color': '#e74f4e' }).fadeIn(500);
        }
    }, {
        key: "displayEmailSuccess",
        value: function displayEmailSuccess(message) {
            $(this.emailIcon).css({ 'color': '#5cb85c' });
            $(this.emailInputId).css({ 'border': '1px solid #5cb85c', 'border-right': '1px solid #898989' });
            $(this.emailIconBoxId).css({ 'border': '1px solid #5cb85c', 'border-left': '1px solid #898989' });
            $(this.emailErrorId).html("<i class='fa fa-check'></i> " + message).css({ 'color': '#5cb85c' }).fadeIn(500);
        }
    }, {
        key: "displaySignupProcessReturnError",
        value: function displaySignupProcessReturnError(data) {
            sweetAlert('Oops...3', data.responseJSON.username[0] + "\n" + data.responseJSON.email[0], "error");
        }
    }, {
        key: "displayLoginProcessReturnError",
        value: function displayLoginProcessReturnError() {
            sweetAlert('Oops...', "Username or password is incorrect", "error");
        }
    }, {
        key: "displayAuthProcessReturnSuccess",
        value: function displayAuthProcessReturnSuccess(data, message) {
            swal({ title: "Success", text: data.message + " " + message, timer: 2000, showConfirmButton: false }, 'success');
        }
    }, {
        key: "displayAuthError",
        value: function displayAuthError(message) {
            sweetAlert('Oops...', "" + message, "error");
        }
    }]);

    return ErrorDisplayer;
}();

},{}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/**
 * Created by Kodemania on 24/5/2016.
 */

var Validation = exports.Validation = function () {
    function Validation(field) {
        _classCallCheck(this, Validation);

        this.fieldToBeValidated = field;
        this.getFieldValue();
    }

    _createClass(Validation, [{
        key: "getFieldValue",
        value: function getFieldValue() {
            this.fieldValue = $(this.fieldToBeValidated).val();
        }
    }, {
        key: "validateLength",
        value: function validateLength(min) {
            if (this.fieldValue.length > min) {
                return true;
            } else {
                return false;
            }
        }
    }, {
        key: "validateEmail",
        value: function validateEmail() {
            var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

            if (!emailRegex.test(this.fieldValue)) {
                return false;
            }
            return true;
        }
    }]);

    return Validation;
}();

},{}],5:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.AjaxModule = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }(); /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      * Created by Kodemania on 26/5/2016.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      */

var _Ajax = require("../classes/Ajax.js");

var _Validation = require("../classes/Validation.js");

var _ErrorDisplayer = require("../classes/ErrorDisplayer.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var AjaxModule = exports.AjaxModule = function () {
    function AjaxModule() {
        _classCallCheck(this, AjaxModule);

        this.passwordId = "#password";
        this.passwordVal = $(this.passwordId).val();

        this.email = "#email";
        this.emailVal = $(this.email).val();

        this.formTokenValue = $("input[name='_token']").val();

        this.usernameLengthErrorMessage = "Username is not enough long";
        this.emailErrorMessage = "Please enter valid email";
    }

    _createClass(AjaxModule, [{
        key: "usernameAjaxCallWithValidation",
        value: function usernameAjaxCallWithValidation(usernameId) {

            var validator = new _Validation.Validation(usernameId);
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            if (validator.validateLength(5)) {
                // username is longer then 6 characters or 6 characters
                var ajax = new _Ajax.Ajax("POST", "check/username");

                ajax.sendUsernameAjaxCall(usernameId, this.formTokenValue);
            } else {
                // username is less then 5 characters
                errorDisplayer.displayUsernameError(this.usernameLengthErrorMessage);
            }
        }
    }, {
        key: "emailAjaxCallWithValidation",
        value: function emailAjaxCallWithValidation(emailId) {
            var validator = new _Validation.Validation(emailId);
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            if (validator.validateLength(6) && validator.validateEmail()) {
                // email is longer then 6 characters
                var ajax = new _Ajax.Ajax("POST", "check/email");

                ajax.sendEmailAjaxCall(emailId, this.formTokenValue);
            } else {
                // email is not longer enough and is not in valid format
                errorDisplayer.displayEmailError(this.emailErrorMessage);
            }
        }
    }, {
        key: "registerAjaxCallWithValidation",
        value: function registerAjaxCallWithValidation(usernameId, emailId, passwordId, formId, submitBtnId) {
            var usernameValidator = new _Validation.Validation(usernameId);
            var emailValidation = new _Validation.Validation(emailId);
            var passValidation = new _Validation.Validation(passwordId);
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            if (!usernameValidator.validateLength(5)) {
                // show error
                errorDisplayer.displayUsernameError(this.usernameLengthErrorMessage);
            }

            if (!emailValidation.validateLength(6) && !emailValidation.validateEmail()) {
                // show error
                errorDisplayer.displayEmailError(this.emailErrorMessage);
            }

            if (usernameValidator.validateLength(5) && passValidation.validateLength(5) && emailValidation.validateLength(6) && emailValidation.validateEmail()) {
                // form is validated

                var ajax = new _Ajax.Ajax("POST", "signup/process/ajax");
                ajax.sendRegisterAjaxCall(usernameId, emailId, passwordId, submitBtnId, this.formTokenValue);
            } else {
                // sweet alert of signup error.
                errorDisplayer.displayAuthError("Sorry for inconvenience We are facing some issue right now");
            }
        }
    }, {
        key: "loginAjaxCallWithValidation",
        value: function loginAjaxCallWithValidation(usernameId, passwordId, submitBtnId) {
            var usernameValidator = new _Validation.Validation(usernameId);
            var passValidation = new _Validation.Validation(passwordId);
            var errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();

            if (!usernameValidator.validateLength(5)) {
                // show error
                errorDisplayer.displayUsernameError(this.usernameLengthErrorMessage);
            }

            if (usernameValidator.validateLength(5) && passValidation.validateLength(5)) {
                // form is validated
                var ajax = new _Ajax.Ajax("POST", "login/process/ajax");
                ajax.sendLoginAjaxCall(usernameId, passwordId, submitBtnId, this.formTokenValue);
            } else {
                // sweet alert of signup error.
                errorDisplayer.displayAuthError("Sorry for inconvenience We are facing some issue right now");
            }
        }
    }]);

    return AjaxModule;
}();

},{"../classes/Ajax.js":2,"../classes/ErrorDisplayer.js":3,"../classes/Validation.js":4}],6:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.ValidationModule = undefined;

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }(); /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      * Created by Kodemania on 30/5/2016.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      */

var _Validation = require("../classes/Validation.js");

var _ErrorDisplayer = require("../classes/ErrorDisplayer.js");

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ValidationModule = exports.ValidationModule = function () {
    function ValidationModule() {
        _classCallCheck(this, ValidationModule);

        this.errorDisplayer = new _ErrorDisplayer.ErrorDisplayer();
    }

    _createClass(ValidationModule, [{
        key: "validatePass",
        value: function validatePass(fieldId) {

            var validator = new _Validation.Validation(fieldId);

            if (validator.validateLength(5)) {
                // password is longer then 5 characters
                this.errorDisplayer.displayPasswordSuccess("Password is OK");
            } else {
                this.errorDisplayer.displayPasswordError("Password is not long enough");
            }
        }
    }]);

    return ValidationModule;
}();

},{"../classes/ErrorDisplayer.js":3,"../classes/Validation.js":4}]},{},[3,4,2,5,1]);

//# sourceMappingURL=bundle.js.map
