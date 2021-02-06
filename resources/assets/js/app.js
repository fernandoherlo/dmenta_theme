import 'bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    // A wrap
    wrap('main a:not(.post-thumbnail), aside a', '<span class="bkg"></span>', 'link');

    // Init
    setTimeout(() => { document.querySelector('body').classList.add('loaded'); }, 100);

    // Links event
    document.querySelectorAll('#app a').forEach((element) => {
        element.addEventListener('click', (event) => {

            if (element.host == window.location.host) {

                event.preventDefault();
                
                // Not loaded
                document.querySelector('body').classList.remove('loaded');

                // Go
                setTimeout(() => { window.location.href = element.href }, 150);

                return false;
            } else {
                return true;
            }

        }, false);
    });
});


function wrap(selector, newHTML, cssClass) {
    document.querySelectorAll(selector).forEach((element) => {
        let org_html = element.innerHTML;
        let new_html = newHTML + '<span class="wrap ' + cssClass + '">' + org_html + '</span>';
        element.innerHTML = new_html;
    });
}