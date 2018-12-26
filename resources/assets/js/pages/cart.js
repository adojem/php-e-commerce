import Vue from 'vue';
import axios from 'axios';

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
         displayItems() {
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
            }, 2000);
         },
      },
      created() {
         this.displayItems();
      },
   });
};

export default cart;
