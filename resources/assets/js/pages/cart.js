import Vue from 'vue';
import axios from 'axios';
import $ from 'jquery';
import { createPostData } from './lib';

const cart = () => {
   const app = new Vue({
      el: '#shopping_cart',
      data: {
         items: [],
         cartTotal: [],
         loading: false,
         fail: false,
         message: '',
      },
      methods: {
         displayItems(time) {
            this.loading = true;
            setTimeout(() => {
               axios.get('/cart/items').then((response) => {
                  if (response.data.fail) {
                     app.fail = true;
                     app.message = response.data.fail;
                     app.loading = false;
                  }
                  else {
                     app.items = response.data.items;
                     app.cartTotal = response.data.cartTotal;
                     app.loading = false;
                  }
               });
            }, time);
         },
         updateQuantity(product_id, operator) {
            const postData = createPostData({ product_id, operator });

            axios.post('/cart/update-qty', postData).then(response => app.displayItems(200));
         },
         removeItem(item_index) {
            const postData = createPostData({ item_index });

            axios.post('/cart/remove_item', postData).then((response) => {
               $('.notify')
                  .css('display', 'block')
                  .delay(4000)
                  .slideUp(300)
                  .html(response.data.success);
               app.displayItems(200);
            });
         },
         clearCartItems() {
            axios.get('/cart/clear_items').then((response) => {
               $('.notify')
                  .css('display', 'block')
                  .delay(4000)
                  .slideUp(300)
                  .html(response.data.success);
               app.displayItems(200);
            });
         },
      },
      created() {
         this.displayItems(2000);
      },
   });
};

export default cart;
