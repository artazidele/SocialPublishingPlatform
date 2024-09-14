let opened = false;
function openMenu() {
    const menuDiv = document.getElementById('menu');
    if (opened === false) {
        menuDiv.classList.remove('d-none');
        menuDiv.classList.add('d-block');
        opened = true;
    } else {
        menuDiv.classList.remove('d-block');
        menuDiv.classList.add('d-none');
        opened = false;
    }
}