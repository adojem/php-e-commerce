import $ from 'jquery';

const changeEvent = () => {
   $('#product-category').on('change', () => {
      const categoryId = $('#product-category option:selected').val();

      $('#product-subcategory').html('<option>Select Subcategory</option>');

      if (!categoryId) {
         return false;
      }

      $.ajax({
         type: 'GET',
         url: `/admin/category/${categoryId}/selected`,
         data: { category_id: categoryId },
         success(response) {
            const $subcategorySelect = $('#product-subcategory');
            const $subcategories = $.parseJSON(response);
            const fragment = document.createDocumentFragment();

            $subcategorySelect.empty();

            if ($subcategories.length) {
               $.each($subcategories, (key, value) => {
                  const $option = $('<option>');
                  $option.attr('value', value.id);
                  $option.text(value.name);

                  fragment.appendChild($option[0]);
               });
            }
            else {
               const $option = $('<option>');
               $option.text('No record found');
               fragment.appendChild($option[0]);
            }

            $subcategorySelect.append(fragment);
         },
      });
   });
};

export default changeEvent;
