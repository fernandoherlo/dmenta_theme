import 'bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    console.log('asd');

    wrap('main a', 'link');
});


function wrap(selector, cssClass) {
    document.querySelectorAll(selector).forEach(function(element) {
        let org_html = element.innerHTML;
        let new_html = '<div id="wrap ' + cssClass + '">' + org_html + '</div>';
        element.innerHTML = new_html;
    });
}