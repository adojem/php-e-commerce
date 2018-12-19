import Vue from 'vue';
import axios from 'axios';

const homePageProducts = () => {
   const app = new Vue({
      el: '#root',
      data: {
         featured: [],
         loading: false,
      },
      methods: {
         getFeaturedProducts() {
            this.loading = true;
            axios
               .get('/featured')
               .then((response) => {
                  console.log(response.data);
                  app.featured = response.data.featured;
                  app.loading = false;
               })
               .catch(err => console.log(err));
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
