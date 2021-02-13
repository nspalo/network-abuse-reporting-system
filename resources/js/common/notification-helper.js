/**
 * Custom Notification
 * - author: Noel Palo
 */
export default class NotificationHelper {

    constructor() {
        this._targetContainer     = "#notification";
        this._notificationMessage = "Action Completed.";
        this._notificationType    = "success";
        this._notificationIcon    = "check-circle";
        this._notificationTimeout = 3000;
    }

    /**
     * Set the Notification Type and Icon
     * - warning - exclamation-triangle
     */
    get warning() {
        this._notificationType = "warning";
        this._notificationIcon = "fas fa-exclamation-triangle";

        return this;
    }

    /**
     * Set the Notification Type and Icon
     * - info - exclamation-circle
     */
    get info() {
        this._notificationType = "info";
        this._notificationIcon = "fas fa-exclamation-circle";

        return this;
    }

    /**
     * Set the Notification Type and Icon
     * - success - check-circle
     */
    get success() {
        this._notificationType = "success";
        this._notificationIcon = "far fa-check-circle";

        return this;
    }

    /**
     * Set the Notification Type and Icon
     * - danger - times-circle
     */
    get danger() {
        this._notificationType = "danger";
        this._notificationIcon = "far fa-times-circle";

        return this;
    }

    /**
     * Set a custom target container for the alert element
     * - this is where the alert will be attached upon call
     */
    set targetContainer(selector) {
        this._targetContainer = selector;
    }

    /**
     * Set a custom timeout
     * - value in seconds
     */
    set timeout(seconds) {
        this._notificationTimeout = seconds;
    }

    /**
     * Raw Alert Element
     */
    alertElement(message) {

        if(message === undefined) {
            message = this._notificationMessage;
        }

        return `` + // Build the Boostrap alert element with font-awesome icon
            `<div class="alert alert-dismissible alert-${this._notificationType} flex-fill align-items-center animate fade show" role="alert">` +
                `<i class="${this._notificationIcon} fa-lg"></i>&nbsp;<span class="align-middle">${message}</span>` +
            `</div>`;
    }

    /**
     * Call the notification
     * - Display the Alert element for a given time on the target container
     */
    notify(message) {

        // Insert the Alert element to the target container
        $(this._targetContainer).html(this.alertElement(message));

        // Set timer for auto dismissal
        setTimeout(() => {
            $(this._targetContainer + " .alert").alert('close');
        }, this._notificationTimeout);
    }
}
