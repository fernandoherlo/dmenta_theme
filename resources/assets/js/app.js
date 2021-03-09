// import 'bootstrap';
import { Dropdown } from 'bootstrap';
import SimpleLightbox from 'simplelightbox';

document.addEventListener("DOMContentLoaded", function() {
    // A wrap
    wrap('main a:not(.post-thumbnail), aside a', '<span class="bkg"></span>', 'link');

    // Init
    setTimeout(() => { document.querySelector('body').classList.add('loaded'); }, 300);

    // Links event
    document.querySelectorAll('#app a').forEach((element) => {
        element.addEventListener('click', (event) => {

            if (element.host == window.location.host) {

                event.preventDefault();

                if (element.href != window.location.href) {
                    
                    // Not loaded
                    document.querySelector('body').classList.remove('loaded');

                    // Go
                    setTimeout(() => { window.location.href = element.href }, 150);
                }                    

                return false;
            } else {
                return true;
            }

        }, false);
    });

    // Lightbox
    new SimpleLightbox('.wp-block-gallery a', { /* options */ });
});


function wrap(selector, newHTML, cssClass) {
    document.querySelectorAll(selector).forEach((element) => {
        let org_html = element.innerHTML;
        let new_html = newHTML + '<span class="wrap ' + cssClass + '">' + org_html + '</span>';
        element.innerHTML = new_html;
    });
}