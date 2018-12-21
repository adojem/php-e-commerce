import Vue from 'vue';
import axios from 'axios';

const homePageProducts = () => {
   const app = new Vue({
      el: '#root',
      data: {
         featured: [],
         products: [],
         count: 0,
         max: 0,
         loading: false,
      },
      methods: {
         getFeaturedProducts() {
            this.loading = true;
            axios.all([axios.get('/featured'), axios.get('/get-products')]).then(
               axios.spread((featuredResponse, productsResponse) => {
                  app.featured = featuredResponse.data.featured;
                  app.products = productsResponse.data.products;
                  app.count = productsResponse.data.count;
                  app.max = productsResponse.data.max_num;
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
         loadMoreProducts() {
            const form = new FormData();
            const { token } = document.querySelector('.display-products').dataset;
            this.loading = true;

            const data = {
               next: 2,
               token,
               count: app.count,
            };

            form.append('data', JSON.stringify(data));

            axios.post('/load-more', form).then((response) => {
               app.products = response.data.products;
               app.count = response.data.count;
               app.loading = false;
            });
         },
         throttleEvents(listener, delay) {
            let timeout;
            const throttledListener = (e) => {
               if (timeout) {
                  clearTimeout(timeout);
               }

               timeout = setTimeout(listener, delay, e);
            };

            return throttledListener;
         },
         handleScrollBottom() {
            const { documentElement } = window.document;
            if (
               Math.round(documentElement.scrollTop + documentElement.clientHeight)
               === documentElement.offsetHeight
            ) {
               if (app.count < app.max) {
                  app.loadMoreProducts();
               }
            }
         },
      },
      created() {
         this.getFeaturedProducts();
      },
      mounted() {
         window.addEventListener('scroll', this.throttleEvents(this.handleScrollBottom, 500));
      },
   });
};

export default homePageProducts;
