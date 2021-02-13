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

        if(form.validate()) {

            // Show loading animation
            form.buttonAnimation.start();

            // notifier.success.notify('hello', 'info');

            // Save the data
            //save(form.data(), routeUrl, btnAnimate);
            store(form);

        } else {
            // do nothing
            form.transaction.warning.notify('Invalid Form Input(s).');
            console.log('invalid form input(s)');
        }
    });
});
