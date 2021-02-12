/**
 * Auto Scale Container
 * - author: Noel Palo
 */

/**
 * Variables
 */
let containerHeaderHeight = 104,
    containerFooterHeight = 104,
    containerOffsetHeight = containerHeaderHeight + containerFooterHeight,
    containerId = "#page-body";

/**
 * Auto Scale Container Function
 * - This function will determine the page body size by getting the offset of the header and footer content.
 * - Regardless of the page content, we will adjust the container size so that it will always fill the browser window.
 *   This will make the footer stay at the bottom of the page (like a sticky footer) when there's too few content in the page.
 */
function autoScaleContainer() {
    $(containerId).css( "min-height", $(window).height() - containerOffsetHeight + "px" );
}

/**
 * Bind the function to the browser's load and resize event
 */
$(window).on( "load",  autoScaleContainer);
$(window).on( "resize", autoScaleContainer);
