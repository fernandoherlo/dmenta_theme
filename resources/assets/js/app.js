import 'bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    console.log('asd');

    wrap('main a:not(.post-thumbnail), aside a', '<span class="bkg"></span>', 'link');
});


function wrap(selector, newHTML, cssClass) {
    document.querySelectorAll(selector).forEach(function(element) {
        let org_html = element.innerHTML;
        let new_html = newHTML + '<span class="wrap ' + cssClass + '">' + org_html + '</span>';
        element.innerHTML = new_html;
    });
}