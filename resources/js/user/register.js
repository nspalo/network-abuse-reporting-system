/**
 * Create/Register New User
 */
import FormHelper from "../common/form-helpers";
// import NotificationHelper from "../common/notification-helper";
import {store} from "../common/axios-helper";

$(function() {

    $("#registration button").on('click', function (event) {
        event.preventDefault();

        let form = new FormHelper(event);
        form.route = "/users/register";
        //form._redirectUrl = "/network-abuse/report";

        if(form.buttonAnimation.isAnimating()) {
            return;
        }

        // Show loading animation
        form.buttonAnimation.start();

        if(form.validate()) {

            // Save the data
            store(form);

        } else {
            // Do nothing, show warning
            form.transaction.warning.notify('Invalid Form Input(s).');
            form.buttonAnimation.stop();
        }
    });
});

