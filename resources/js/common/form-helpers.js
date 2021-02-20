import buttonAnimator from "./button-animator";
import NotificationHelper from "./notification-helper";

/**
 * Form Helper
 * - author: Noel Palo
 */
export default class FormHelper {

    constructor(event) {
        this._event = event;
        this._route = "/";
        this._redirectUrl = "/";
        this._formId = $(this._event.currentTarget).parents('form').attr('id');
        this._formObj = $("#" + this._formId);
        this._button = new buttonAnimator($(this._event.currentTarget));
        this._notifier = new NotificationHelper();

    }

    /**
     * Form Id
     */
    get id() {
        return this._formId;
    }

    /**
     * Get request's route
     */
    get route() {
        return this._route;
    }

    /**
     * Set request's route
     */
    set route(url) {
        this._route = url;
    }

    /**
     * Get redirect url
     */
    get redirectUrl() {
        return this._redirectUrl;
    }

    /**
     * Set redirect url
     */
    set redirectUrl(url) {
        this._redirectUrl = url;
    }

    /**
     * Get redirect url
     */
    get hasRedirectUrl() {
        return ! (this.redirectUrl !== "/"
            || this.redirectUrl !== ""
            || this.redirectUrl !== undefined
        );
    }

    /**
     * Get redirect url
     */
    get canAutoReload() {
        return this.hasRedirectUrl === false;
    }

    /**
     * Get form button instance
     */
    get buttonAnimation() {
        return this._button;
    }

    /**
     * Get notifier instance
     */
    get transaction() {
        return this._notifier;
    }

    /**
     * Check if the form input was valid
     */
    validate() {

        let status = this._formObj.get(0).checkValidity();

        if (status === false) {
            this._event.preventDefault();
            this._event.stopPropagation();
        }

        // Apply bootstrap field validation feedback
        this._formObj.get(0).classList.add('was-validated');

        return status;
    }

    reset() {
        this._formObj.get(0).reset();
        this._formObj.removeClass('was-validated');
    }

    /**
     * Get the raw input fields
     */
    fields() {
        return this._formObj.serializeArray()
    }

    /**
     * Get the form data as a key value pair inside an array
     */
    data() {
        let formData = {};
        $.each(this.fields(), function (i, field) {
            formData[field.name] = field.value;
        });
        return formData;
    }
}
