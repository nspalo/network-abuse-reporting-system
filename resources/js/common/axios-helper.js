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

            // refresh
            // window.location = '/network-abuse/report';
            // window.location.reload();

        })
        .catch(function (error) {
            // Display Errors
            form.transaction.danger.notify('Error! Unable to process request.');
            console.log(error);
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

            // refresh
            // window.location = '/';
            window.location.reload();

        })
        .catch(function (error) {
            // Display Errors
            form.transaction.danger.notify('Error! Unable to process request.');
            console.log(error);
        });
}
