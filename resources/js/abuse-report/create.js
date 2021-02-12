/**
 * Create Abuse Report
 */
import buttonAnimator from "../common/button-animator";
import formHelper from "../common/form-helpers";

$(function() {

    $("#abuseReport button").on('click', function (event) {
        event.preventDefault();

        let routeUrl   = "/network-abuse/report";
        let btnAnimate = new buttonAnimator($(event.currentTarget));
        let form       = new formHelper(event);

        console.log(btnAnimate);

        if(btnAnimate.isAnimated()) {
            return;
        }

        // if(isFormValidated(formId)) {
        if(form.validate()) {

            // Show loading animation
            btnAnimate.start();

            axios.post(routeUrl, form.data())
            .then(function (response) {
                // DevExpress.ui.notify('The record has been created.', 'success', 2000);

                // Remove loading animation
                btnAnimate.stop();

                // refresh
                // window.location = '/network-abuse/report';
                window.location.reload();
                console.log(response);
            })
            .catch(function (error) {
                // Display Errors
                console.log(error);
            });

        } else {
            // do nothing
            console.log('invalid form input(s)');
        }
    });

});
