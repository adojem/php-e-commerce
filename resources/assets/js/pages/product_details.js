import Vue from 'vue';
import axios from 'axios';

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

      methods: {
         getProductDetails() {
            this.loading = true;
            setTimeout(() => {
               axios.get(`/product-details/${this.productId}`).then((response) => {
                  app.product = response.data.product;
                  app.category = response.data.category;
                  app.subCategory = response.data.subCategory;
                  app.loading = false;
               });
            }, 1000);
         },
      },

      created() {
         this.getProductDetails();
      },

      stringLimit(string, value) {
         if (string.length > value) {
            return `${string.substring(0, value)}...`;
         }

         return string;
      },
   });
};

export default productDetails;
