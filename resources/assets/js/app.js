// import 'bootstrap';
import { Dropdown } from 'bootstrap';
import { Collapse } from 'bootstrap';
import SimpleLightbox from 'simplelightbox';

document.addEventListener("DOMContentLoaded", function() {
    // A wrap
    wrap('main a:not(.post-thumbnail), aside a', '<span class="bkg"></span>', 'link');

    // Init
    setTimeout(() => { document.querySelector('body').classList.add('loaded'); }, 300);

    // Links event
    document.querySelectorAll('#app a').forEach((element) => {

        // If gallery
        if (element.closest('.wp-block-gallery') === null) {

            // Link
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
        }

    });

    // Lightbox
    document.querySelectorAll('.wp-block-gallery').forEach((element) => {
        new SimpleLightbox(element.querySelectorAll('a'), { /* options */ });
    });

    // Menu
    const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
    if ( vw > 991.98) {
    } else {
   
        var ul = document.getElementById('menu-principal');
        var li = document.createElement('li');
        var a = document.createElement('a');

        a.appendChild(document.createTextNode('X'));
        a.onclick = () => jQuery('#primary-menu').collapse('hide');

        li.classList.add('close');
        li.appendChild(a);
        ul.appendChild(li);
    }
    
});


function wrap(selector, newHTML, cssClass) {
    document.querySelectorAll(selector).forEach((element) => {
        let org_html = element.innerHTML;
        let new_html = newHTML + '<span class="wrap ' + cssClass + '">' + org_html + '</span>';
        element.innerHTML = new_html;
    });
}