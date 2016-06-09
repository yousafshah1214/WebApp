/**
 * Created by Kodemania on 24/5/2016.
 */

export class Validation{

    constructor(field){
        this.fieldToBeValidated     =   field;
        this.getFieldValue();
    }

    getFieldValue(){
       this.fieldValue  = $(this.fieldToBeValidated).val();
    }

    validateLength(min){
            if(this.fieldValue.length > min){
                return true;
            }
            else{
                return false;
            }
    }

    validateEmail(){
        let emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

        if(!emailRegex.test(this.fieldValue)){
            return false;
        }
        return true;
    }

}
