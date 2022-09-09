$(document).ready(function(){
    // scroll to top
    $(window).on('scroll', function(){
        if ($(this).scrollTop() > 200) {
            $('#scrollToTop').fadeIn();
        } else {
            $('#scrollToTop').fadeOut();
        }
    });
    $('#scrollToTop').on('click', function(e){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    // top search
    document.addEventListener("touchstart", function(){}, true);

    $('#btnnopol').on('click', function(e){
        $("#result-nopol").fadeIn();
    });

    // player video
    $('.video-player').click(function () {
      var mediaVideo = $("#video-source").get(0);
      if (mediaVideo.paused) {
          mediaVideo.play();
          $('.video-player').addClass('playingvideo');
      } else {
          mediaVideo.pause();
          $('.video-player').removeClass('playingvideo');
     }
    });

    // external link
    $('.external_links').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
                breakpoint: 575,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
            }
        ]
    });
    
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: true
    }),
    $('.timepicker').pickatime()
    $('#date-time').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm'
    });
    $('input[type=date]').bootstrapMaterialDatePicker({
        time: false
    });
    $('input[type=time]').bootstrapMaterialDatePicker({
        date: false,
        format: 'HH:mm'
    });
   
});