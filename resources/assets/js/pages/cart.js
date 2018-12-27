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
            const postData = new FormData();
            const data = {
               product_id,
               operator,
            };

            postData.append('data', JSON.stringify(data));
            axios.post('/cart/update-qty', postData).then(response => app.displayItems(200));
         },
      },
      created() {
         this.displayItems(2000);
      },
   });
};

export default cart;
