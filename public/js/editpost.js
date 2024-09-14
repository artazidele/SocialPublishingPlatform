function setPreviousValues() {
    document.getElementById('titleI').value = document.getElementById('titleP').value;
    document.getElementById('contentI').value = document.getElementById('contentP').value;

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
