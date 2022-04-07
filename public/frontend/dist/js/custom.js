// top promo
$(".promo > li:gt(0)").hide();	
setInterval(function(){	$(".promo > li:first").fadeOut(1000).next().fadeIn(1000).end().appendTo('.promo');	}, 5000);

$('#rpc-item-slider').owlCarousel({
  loop: false,
  margin: 10,
  responsiveClass: true,
  navText: ["",""],
  responsive: {
      0: {
          items: 1,
          nav: true,
          dots: false
      },
      768: {
          items: 2,
          nav: true,
          dots: false,
          margin: 20
      },
      1024: {
          items: 3,
          nav: true,
          dots: false,
          margin: 30
      }
  }
});
$('#wocs-item-slider').owlCarousel({
  loop: false,
  margin: 10,
  responsiveClass: true,
  navText: ["",""],
  responsive: {
      0: {
          items: 1,
          nav: true,
          dots: false
      },
      768: {
          items: 2,
          nav: true,
          dots: false,
          margin: 20
      },
      1024: {
          items: 4,
          nav: false,
          dots: true,
          margin: 15
      }
  }
});

// image-gallery
$('#image-gallery').lightSlider({
  item:1,
  thumbItem:1,
  slideMargin: 0,
  speed:1000,
  auto:false,
  loop:true,
  controls: true,
  prevHtml: '',
  nextHtml: '',
});

// image-gallery
$('#image-gallery2').lightSlider({
  item:1,
  thumbItem:1,
  slideMargin: 0,
  speed:1000,
  auto:false,
  loop:true,
  controls: true,
  prevHtml: '',
  nextHtml: '',
});

$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

   //>=, not <=
  if (scroll >= 1) {
      //clearHeader, not clearheader - caps H
      $(".main-header").addClass("sticky");
  }
  else {
    $(".main-header").removeClass("sticky");
}
});
    