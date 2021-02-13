/**
 * Create Abuse Report
 */
import formHelper from "../common/form-helpers";
import NotificationHelper from "../common/notification-helper";
import {store} from "../common/axios-helper"

$(function() {

    $("#abuseReport button").on('click', function (event) {
        event.preventDefault();

        let form       = new formHelper(event);
            form.route = "/network-abuse/report";

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
