function openWindow(id) {
    document.getElementById(id).classList.remove('hiddenDiv');
    document.getElementById(id).classList.add('visibleDiv');
}

function closeWindow(id) {
    document.getElementById(id).classList.remove('visibleDiv');
    document.getElementById(id).classList.add('hiddenDiv');
}

