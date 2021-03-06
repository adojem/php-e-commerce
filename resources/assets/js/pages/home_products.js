import Vue from 'vue';
import axios from 'axios';
import {
   truncateString, addItemToCart, createPostData, getDom, displayMessage,
} from './lib';

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
            return truncateString(string, value);
         },
         requestProducts() {
            const { token } = getDom('.display-products').dataset;
            this.loading = true;
            const data = createPostData({
               next: 2,
               token,
               count: app.count,
            });

            axios.post('/load-more/notFeatured', data).then((response) => {
               app.products = response.data.products;
               app.count = response.data.count;
               app.loading = false;
            });
         },
         loadMoreProducts() {
            if (app.handleScrollBottom() && app.count < app.max && !app.loading) {
               app.requestProducts();
            }
         },
         addToCart(id) {
            addItemToCart(id, (message) => {
               displayMessage('.notify', message);
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
               return true;
            }

            return false;
         },
      },
      created() {
         this.getFeaturedProducts();
      },
      mounted() {
         window.addEventListener('scroll', this.throttleEvents(this.loadMoreProducts, 500));
      },
   });
};

export default homePageProducts;
