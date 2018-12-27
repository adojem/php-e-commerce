import axios from 'axios';

export const truncateString = (string, value) => {
   if (string.length > value) {
      return `${string.substring(0, value)}...`;
   }

   return string;
};

export const getDom = eleName => document.querySelector(eleName);

export const addItemToCart = (id, callback) => {
   const postData = new FormData();
   let { token } = getDom('.display-products').dataset;

   if (!token) {
      token = getDom('.product').dataset.token;
   }

   const data = {
      product_id: id,
      token,
   };

   postData.append('data', JSON.stringify(data));

   axios.post('/cart', postData).then((response) => {
      callback(response.data.success);
   });
};

export function createPostData(data) {
   const postData = new FormData();
   postData.append('data', JSON.stringify({ ...data }));

   return postData;
}
