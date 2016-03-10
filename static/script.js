function isChildOf(target, parent) {
    if(target.tagName == 'html') {
        return false;
    }

    var tempParent = '';
    var clone = target;
    while(tempParent != 'html') {
        tempParent = clone.parentNode;
        if(!tempParent) {
            break;
        }

        if(tempParent.tagName && tempParent.tagName.toLowerCase() === parent.toLowerCase()) {
            return tempParent;
        }
        clone = tempParent;
    }

    return false;
}
document.onclick= function(event) {
    // Compensate for IE<9's non-standard event model
    if (event === undefined) event = window.event;
    var target = 'target' in event ? event.target : event.srcElement;

    el = event.target;
    if(el.tagName.toLowerCase() == 'footer' || (elz = el = isChildOf(event.target, 'footer'))) {
        el.classList.toggle('show');
    }
};