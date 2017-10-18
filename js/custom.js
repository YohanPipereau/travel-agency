$(document).ready(function () {

$.vegas('slideshow', {
backgrounds: [
{ src: '/img/1.jpg', fade: 1000, delay: 9000 },
{ src: '/img/2.jpg', fade: 1000, delay: 9000 }
]
});

$('#myCarousel').carousel({
interval: 2000
});

$('.scroll-menu a').bind('click', function (event) { //just pass scroll-me in design and start scrolling
var $anchor = $(this);
$('html, body').stop().animate({
scrollTop: $($anchor.attr('href')).offset().top
}, 1200, 'easeInOutExpo');
event.preventDefault();
});

$('.fancybox').fancybox({
openEffect: 'elastic',
closeEffect: 'elastic',
helpers: {
title: {
type: 'inside'
}
}
});


});
