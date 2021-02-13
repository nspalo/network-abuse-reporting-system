/**
 * Custom Button Animator
 * - author: Noel Palo
 */

export default class buttonAnimator {

    constructor(button) {
        this._animationIcon = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        this._animationLabel = "Loading";
        this._buttonInstance = button;
    }

    /**
     * Get the button instance
     */
    get buttonObj() {
        return this._buttonInstance;
    }

    /**
     * Start the animation
     */
    start() {
        let buttonContent = this.buttonObj.html();
        this.buttonObj.addClass('animating');
        this.buttonObj.attr('disabled',true);
        this.buttonObj.attr('data-text',buttonContent);
        this.buttonObj.html(this._animationLabel + '&nbsp;'+this._animationIcon);
    }

    /**
     * Stop the animation
     */
    stop(timeout) {

        if(timeout===undefined) {
            timeout = 1000;
        }

        // Set timer for auto dismissal
        setTimeout(() => {
            let buttonContent = this.buttonObj.attr('data-text');
            this.buttonObj.html(buttonContent);
            this.buttonObj.removeClass('animating');
            this.buttonObj.attr('disabled',false);
        }, timeout);
    }

    /**
     * Check if the button is in animating state
     */
    isAnimating() {
        return this.buttonObj.hasClass('animating')
    }
}
