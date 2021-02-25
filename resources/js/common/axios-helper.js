/**
 * Axios helper functions
 */

export function store(form) {

    axios.post(form.route, form.data())
        .then(function (response) {

            // Remove loading animation
            form.buttonAnimation.stop();

            if(response.status === 200) {
                form.transaction.success.notify('A new record was successfully created.');
                form.reset();
            }

            /**
             * If there's a redirect url, auto reloading is allowed,
             * - Reload the page if can auto reload, otherwise
             *   use the provided redirect url
             */
            if(form.canAutoReload) {
                // Reload the page
                window.location.reload();
            }
            else if(form.hasRedirectUrl) {
                // Redirect
                window.location = form.redirectUrl;
            }

        })
        .catch(function (error) {
            // Display Errors
            form.transaction.danger.notify('Error! Unable to process request.');
            console.log(error.message);
            form.buttonAnimation.stop(5000);
        });
}

export function update(form) {

    axios.patch(form.route, form.data())
        .then(function (response) {

            // Remove loading animation
            form.buttonAnimation.stop();

            if(response.status === 200) {
                form.transaction.success.notify('An existing record was successfully updated.');
                form.reset();
            }

            /**
             * If there's a redirect url, auto reloading is allowed,
             * - Reload the page if can auto reload, otherwise
             *   use the provided redirect url
             */
            if(form.canAutoReload) {
                // Reload the page
                window.location.reload();
            }
            else if(form.hasRedirectUrl) {
                // Redirect
                window.location = form.redirectUrl;
            }

        })
        .catch(function (error) {
            // Display Errors
            form.transaction.danger.notify('Error! Unable to process request.');
            console.log(error.message);
            form.buttonAnimation.stop(5000);
        });
}
