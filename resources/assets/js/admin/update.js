import $ from 'jquery';

const update = () => {
   // update Product Category
   $('.update-category').on('click', function updateCategory(e) {
      e.preventDefault();

      const token = $(this).data('token');
      const id = $(this).attr('id');
      const name = $(`#item-name-${id}`).val();

      $.ajax({
         type: 'POST',
         url: `/admin/product/categories/${id}/edit`,
         data: { token, name },
         success(data) {
            const response = $.parseJSON(data);
            $('.notification')
               .css('display', 'block')
               .remove('alert')
               .addClass('primary')
               .delay(4000)
               .slideUp(300)
               .html(response.success);
         },
         error(request) {
            const errors = $.parseJSON(request.responseText);
            const ul = document.createElement('ul');
            const fragment = document.createDocumentFragment();
            let li;

            $.each(errors, (key, value) => {
               li = document.createElement('li');
               li.textContent = value;
               fragment.appendChild(li);
            });

            ul.appendChild(li);
            $('.notification')
               .css('display', 'block')
               .remove('primary')
               .addClass('alert')
               .delay(4000)
               .slideUp(300)
               .html(ul);
         },
      });
   });

   // update Subcategory
   $('.update-subcategory').on('click', function updateSubcategory(e) {
      e.preventDefault();

      const $this = $(this);
      const token = $this.data('token');
      const id = $this.attr('id');
      let categoryId = $this.data('category-sid');
      const name = $(`#item-subcategory-name-${id}`).val();
      const selectedCategoryId = `item-category-${categoryId} option:selected`;

      if (categoryId !== selectedCategoryId) {
         categoryId = selectedCategoryId;
      }

      $.ajax({
         type: 'POST',
         url: `${URLROOT}/admin/product/subcategory/${id}/edit`,
         data: { token, name, category_id: categoryId },
         success(data) {
            const response = $.parseJSON(data);
            $('.notification')
               .css('display', 'block')
               .remove('alert')
               .addClass('primary')
               .delay(4000)
               .slideUp(300)
               .html(response.success);
         },
         error(request) {
            const errors = $.parseJSON(request.responseText);
            const ul = document.createElement('ul');
            const fragment = document.createDocumentFragment();
            let li;

            $.each(errors, (key, value) => {
               li = document.createElement('li');
               li.textContent = value;
               fragment.appendChild(li);
            });

            ul.appendChild(li);
            $('.notification')
               .css('display', 'block')
               .remove('primary')
               .addClass('alert')
               .delay(4000)
               .slideUp(300)
               .html(ul);
         },
      });
   });
};

export default update;
