import $ from 'jquery';
import 'slick-carousel';

const initCarousel = () => {
   $('.hero-slider').slick({
      slidesToShow: 1,
      autoplay: true,
      arrows: false,
      dots: false,
      fade: true,
      autoplayHoverPause: true,
      slidesToScroll: 1,
   });
};

export default initCarousel;
