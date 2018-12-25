import Vue from 'vue';

const cart = () => {
   const app = new Vue({
      el: '#shopping_cart',
      data: {
         items: [],
         cartTotal: [],
         loading: false,
         fail: false,
         message: ''
      }
   })
}

export default cart;