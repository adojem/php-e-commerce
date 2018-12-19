import Vue from 'vue';
import axios from 'axios';

const homePageProducts = () => {
   const app = new Vue({
      el: '#root',
      data: {
         featured: [],
         products: [],
         loading: false,
      },
      methods: {
         getFeaturedProducts() {
            this.loading = true;
            axios.all([axios.get('/featured'), axios.get('/get-products')]).then(
               axios.spread((featuredResponse, productsResponse) => {
                  app.featured = featuredResponse.data.featured;
                  app.products = productsResponse.data.products;
                  app.loading = false;
               }),
            );
         },
         stringLimit(string, value) {
            if (string.length > value) {
               return `${string.substring(0, value)}...`;
            }

            return string;
         },
      },
      created() {
         this.getFeaturedProducts();
      },
   });
};

export default homePageProducts;
