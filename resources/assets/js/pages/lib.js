import axios from 'axios';
import $ from 'jquery';

export const truncateString = (string, value) => {
   if (string.length > value) {
      return `${string.substring(0, value)}...`;
   }

   return string;
};

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

export const getDom = eleName => document.querySelector(eleName);

export function createPostData(data) {
   const postData = new FormData();
   postData.append('data', JSON.stringify({ ...data }));

   return postData;
}

export const displayMessage = (element, message) => {
   $(element)
      .css('display', 'block')
      .delay(4000)
      .slideUp(300)
      .html(message);
};
