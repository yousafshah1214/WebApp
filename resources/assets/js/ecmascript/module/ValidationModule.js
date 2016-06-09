/**
 * Created by Kodemania on 30/5/2016.
 */

import {Validation} from "../classes/Validation.js";
import {ErrorDisplayer} from "../classes/ErrorDisplayer.js";

export class ValidationModule{

    constructor(){
        this.errorDisplayer = new ErrorDisplayer();
    }

    validatePass(fieldId){

        let validator = new Validation(fieldId);

        if(validator.validateLength(5)){
            // password is longer then 5 characters
            this.errorDisplayer.displayPasswordSuccess("Password is OK");
        }
        else{
            this.errorDisplayer.displayPasswordError("Password is not long enough");
        }
    }

}
