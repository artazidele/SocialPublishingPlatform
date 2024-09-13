function addNewKeywordInput() {
    const keywordDiv = document.getElementById("keyword_div");
    let input = document.createElement('input');
    input.name = "keyword[]";
    input.type = "text";
    let span = document.createElement('span');
    span.classList.add("removeDiv");
    span.innerHTML = "&times;";
    let div = document.createElement('div');
    div.appendChild(input);
    div.appendChild(span);

    span.addEventListener('click', function(e) {
        e.currentTarget.parentNode.remove();
    }, false);

    keywordDiv.appendChild(div);
}

function addRemoveDivFunctionality() {
    var removeDivSpans = document.getElementsByClassName('removeDiv')
    for (var i = 0; i < removeDivSpans.length; i++) {
        removeDivSpans[i].addEventListener('click', function(e) {
            e.currentTarget.parentNode.remove();
        }, false);
    }
}

addRemoveDivFunctionality();

function checkAll() {
    const categoriesInputs = document.getElementsByName('categories[]');
    const allCheckbox = document.getElementById('allCheckbox');
    if (allCheckbox.checked == true) {
        categoriesInputs.forEach(input => {
            input.checked = true;
        });
    } else {
        categoriesInputs.forEach(input => {
            input.checked = false;
        });
    }
}