import $ from 'jquery';
import URLROOT from '../../../../env';

const update = () => {
   $('.update-category').on('click', function updateCategory(e) {
      e.preventDefault();

      const token = $(this).data('token');
      const id = $(this).attr('id');
      const name = $(`#item-name-${id}`).val();

      $.ajax({
         type: 'POST',
         url: `${URLROOT}/admin/product/categories/${id}/edit`,
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
         }
      });
   });
};

export default update;
