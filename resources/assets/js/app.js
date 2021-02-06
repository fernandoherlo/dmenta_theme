import 'bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    // A wrap
    wrap('main a:not(.post-thumbnail), aside a', '<span class="bkg"></span>', 'link');

    // Init
    setTimeout(function(){ document.querySelector('body').classList.add('loaded'); }, 300);
});


function wrap(selector, newHTML, cssClass) {
    document.querySelectorAll(selector).forEach(function(element) {
        let org_html = element.innerHTML;
        let new_html = newHTML + '<span class="wrap ' + cssClass + '">' + org_html + '</span>';
        element.innerHTML = new_html;
    });
}