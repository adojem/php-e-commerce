import Vue from 'vue';

const productDetails = () => {
   const app = new Vue({
      el: '#product',
      data: {
         product: [],
         category: [],
         subCategory: [],
         productId: document.getElementById('product').dataset.id,
         loading: false,
      },
   });
};

export default productDetails;
