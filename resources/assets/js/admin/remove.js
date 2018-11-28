import $ from 'jquery';

const remove = () => {
   $('table[data-form="deleteForm"]').on('click', '.delete-item', function (e) {
      e.preventDefault();
      const form = $(this);

      $('#confirm')
         .foundation('open')
         .on('click', '#delete-btn', () => {
            form.submit();
         });
   });
};

export default remove;
