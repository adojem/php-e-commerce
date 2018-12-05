import $ from 'jquery';
import 'foundation-sites';
import admin from './admin';

$(document).foundation();
$(document).ready(() => {
   switch ($('body').data('page-id')) {
      case 'home':
         break;

      case 'adminProduct':
         admin.changeEvent();
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
