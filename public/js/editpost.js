function setPreviousValues() {
    document.getElementById('titleI').value = document.getElementById('titleP').value;
    document.getElementById('contentI').value = document.getElementById('contentP').value;

    // var ESAPI = require('node-esapi');
    // const titlePValue = document.getElementById('titleP').value;
    // const contentPValue = document.getElementById('contentP').value;
    // document.getElementById('titleI').value = '<%=ESAPI.encoder().encodeForJavascript(titlePValue)%>';
    // document.getElementById('contentI').value = '<%=ESAPI.encoder().encodeForJavascript(contentPValue)%>';

    const postCategories = JSON.parse(document.getElementById('postCategoriesP').value);
    const postCategoryCheckboxes = document.getElementsByName('categories[]');
    postCategoryCheckboxes.forEach(checkbox => {
        postCategories.forEach(postCategory => {
            if(checkbox.value == postCategory.category_id) {
                checkbox.checked = true;
            }
        });
    });

}

setPreviousValues();
