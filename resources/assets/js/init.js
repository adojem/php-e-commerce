import $ from 'jquery';
import 'foundation-sites';
import admin from './admin';
import pages from './pages';

$(document).foundation();
$(document).ready(() => {
   switch ($('body').data('page-id')) {
      case 'home':
         pages.initCarousel();
         pages.homePageProducts();
         break;

      case 'product':
         pages.productDetails();
         break;

      case 'cart':
         pages.cart();
         break;

      case 'adminProduct':
         admin.changeEvent();
         admin.remove();
         break;

      case 'adminCategories':
         admin.update();
         admin.remove();
         admin.create();
         break;

      default:
      // do nothing
   }
});
