import Vue from 'vue';
import axios from 'axios';
import { createPostData, displayMessage, getDom } from './lib';

const cart = () => {
   const {
      dataset: { stripeKey },
   } = getDom('#properties');

   const app = new Vue({
      el: '#shopping_cart',
      data: {
         items: [],
         cartTotal: 0,
         loading: false,
         fail: false,
         authenticated: false,
         message: '',
         amountInCents: 0,
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
                     app.authenticated = response.data.authenticated;
                     app.amountInCents = response.data.amountInCents;
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
               displayMessage('.notify', response.data.success);
               app.displayItems(200);
            });
         },
         clearCartItems() {
            axios.get('/cart/clear_items').then((response) => {
               displayMessage('.notify', response.data.success);
               app.displayItems(200);
            });
         },
         checkout() {
            Stripe.open({
               name: 'ACME Store, Inc.',
               description: 'Shopping Cart Items',
               email: getDom('#properties').dataset.customerEmail,
               amount: app.amountInCents,
               zipCode: true,
            });
         },
      },
      created() {
         this.displayItems(2000);
      },
   });

   const Stripe = StripeCheckout.configure({
      key: stripeKey,
      locale: 'auto',
      token(token) {
         const data = createPostData({
            stripeToken: token.id,
            stripeEmail: token.email,
         });

         axios
            .post('/cart/payment', data)
            .then((response) => {
               displayMessage('.notify', response.data.success);
               app.displayItems(200);
            })
            .catch(error => console.log(error));
      },
   });
};

export default cart;
