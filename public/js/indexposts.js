// function to add new input
function addNewKeywordInput() {
    const keywordDiv = document.getElementById("keyword_div");
    let input = document.createElement('input');
    input.classList.add('form-control');
    input.classList.add('m-2');
    input.name = "keyword[]";
    input.type = "text";
    let span = document.createElement('span');
    span.classList.add("removeDiv");
    let i = document.createElement('i');
    i.classList.add('fa');
    i.classList.add('fa-trash-o');
    i.classList.add('text-danger');
    i.classList.add('m-2');
    i.style.fontSize = '32px';
    span.appendChild(i);
    let div = document.createElement('div');
    div.classList.add('form-group');
    div.classList.add('mt-3');
    div.classList.add('w-100');
    div.classList.add('d-flex');
    div.classList.add('flex-row');
    div.classList.add('align-items-center');
    div.appendChild(input);
    div.appendChild(span);

    span.addEventListener('click', function(e) {
        e.currentTarget.parentNode.remove();
    }, false);

    keywordDiv.appendChild(div);
}

// function to add remove div functionality
function addRemoveDivFunctionality() {
    var removeDivSpans = document.getElementsByClassName('removeDiv')
    for (var i = 0; i < removeDivSpans.length; i++) {
        removeDivSpans[i].addEventListener('click', function(e) {
            e.currentTarget.parentNode.remove();
        }, false);
    }
}

addRemoveDivFunctionality();

// function that checks all checkboxes
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
