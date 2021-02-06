import 'bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    console.log('asd');

    wrap('main a', 'link');
});


function wrap(selector, cssClass) {
    org_html = document.querySelector(selector).innerHTML;
    new_html = '<div id="wrap ' + cssClass + '">' + org_html + '</div>';
    document.querySelector(selector).innerHTML = new_html;
}