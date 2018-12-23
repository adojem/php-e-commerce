import Vue from 'vue';
import axios from 'axios';
import { truncateString, addItemToCart } from './lib';

const productDetails = () => {
   const app = new Vue({
      el: '#product',
      data: {
         product: [],
         category: [],
         subCategory: [],
         similarProducts: [],
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
                  app.similarProducts = response.data.similarProducts;
                  app.loading = false;
               });
            }, 1000);
         },
         stringLimit(string, value) {
            return truncateString(string, value);
         },
         addToCart(id) {
            const message = addItemToCart(id);
            alert(message);
         },
      },
      created() {
         this.getProductDetails();
      },
   });
};

export default productDetails;
