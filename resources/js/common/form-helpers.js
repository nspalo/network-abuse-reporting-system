/**
 * Form Helper
 * - author: Noel Palo
 */
export default class formHelper {

    constructor(event) {
        this._event =  event;
        this._id = $(this._event.currentTarget).parents('form').attr('id');
    }

    get id() {
        return this._id;
    }

    validate() {
        return $("#" + this.id)[0].checkValidity();
    }

    fields() {
        return $("#" + this.id).serializeArray()
    }

    data() {
        let formData = {};
        $.each(this.fields(), function (i, field) {
            formData[field.name] = field.value;
        });
        return formData;
    }
}
