import 'bootstrap';

document.addEventListener("DOMContentLoaded", function() {
    // A wrap
    wrap('main a:not(.post-thumbnail), aside a', '<span class="bkg"></span>', 'link');

    // Init
    setTimeout(() => { document.querySelector('body').classList.add('loaded'); }, 300);

    // Links event
    document.links.onclick = clicklink;
});


function wrap(selector, newHTML, cssClass) {
    document.querySelectorAll(selector).forEach((element) => {
        let org_html = element.innerHTML;
        let new_html = newHTML + '<span class="wrap ' + cssClass + '">' + org_html + '</span>';
        element.innerHTML = new_html;
    });
}

function clicklink() {

    console.log(this.host);
    console.log(window.location.host);

    if (this.host == window.location.host) {

        console.log('asd');
        
        // Not loaded
        document.querySelector('body').classList.remove('loaded');

        // Go
        setTimeout(() => { window.location.href = this.href }, 300);

        return false;
    } else {
        return true;
    }
}