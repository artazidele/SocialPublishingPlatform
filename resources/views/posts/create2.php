<!-- <input value={{ $category->id }} type="checkbox" name="categories[]" {{ old('categories[]') == true ? 'checked' : '' }}> -->
                                <!-- <input value="{{ $category->id }}" type="checkbox" name="categories[]" {{ in_array($category->id, old('categories[]')) == true ? 'checked' : '' }}> -->
                                <input {{ in_array(1, [1,2,3]) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]">
                                <!-- <input {{ in_array($category->name, $checkedCategories) == true ? 'checked' : '' }} value="{{ $category->id }}" type="checkbox" name="categories[]"> -->
                                