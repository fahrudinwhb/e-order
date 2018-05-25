$('.main-slider').on('init', function(){
    var slide = ".item-0";
    var caption = slide+" "+".caption-bg";
    // alert(caption);
    $(caption).velocity({
        properties : { bottom : "0%" ,opacity : 1 },
        options : {
            duration : 1,
        }
    })
    .velocity({
        properties : { bottom : "-10%" ,opacity : 0 },
        options : {
            delay : 3500,
            duration : 1200,
        }
    });
  });
$(".main-slider").slick({
    nextArrow : $('.slider-next'),
    prevArrow : $('.slider-prev'),
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnHover : false,
    adaptiveHeight : true,
});
$('.main-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    var slide = ".item-"+nextSlide;
    var caption = slide+" "+".caption-bg";
    // alert(caption);
    $(caption).velocity({
        properties : { bottom : "0%" ,opacity : 1 },
        options : {
            duration : 1200,
        }
    })
    .velocity({
        properties : { bottom : "-10%" ,opacity : 0 },
        options : {
            delay : 3500,
            duration : 1200,
        }
    });
  });
