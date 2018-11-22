import $ from 'jquery';
import 'foundation-sites';
import update from './admin/update';

$(document).foundation();
$(document).ready(() => {
   switch ($('body').data('page-id')) {
      case 'home':
         break;

      case 'adminCategories':
         update();
         break;

      default:
      // do nothing
   }
});
