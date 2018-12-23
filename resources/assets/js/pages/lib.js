export const truncateString = (string, value) => {
   if (string.length > value) {
      return `${string.substring(0, value)}...`;
   }

   return string;
};

export const addItemToCart = id => id;
