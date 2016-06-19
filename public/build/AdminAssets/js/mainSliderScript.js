/**
 * Created by Kodemania on 15/6/2016.
 */

$(document).ready(function () {
    $('#checkbox102').change(function () {
        $('#buttonText').prop('disabled', !this.checked);
        $('#buttonUrl').prop('disabled', !this.checked);
    }).change();
});
