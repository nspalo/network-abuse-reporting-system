/**
 * Custom Button Animator
 * - author: Noel Palo
 */
export default class buttonAnimator {

    constructor(button) {
        this._buttonInstance = button;
    }

    get buttonObj() {
        return this._buttonInstance;
    }

    start() {

        let buttonContent = this.buttonObj.html();
        this.buttonObj.addClass('animated');
        this.buttonObj.attr('disabled',true);
        this.buttonObj.attr('data-text',buttonContent);
        this.buttonObj.html('Loading <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    }

    stop() {
        let buttonContent = this.buttonObj.attr('data-text');
        this.buttonObj.html(buttonContent);
        this.buttonObj.removeClass('animated');
        this.buttonObj.attr('disabled',false);
    }

    isAnimated() {
        return this.buttonObj.hasClass('animated')
    }
}
