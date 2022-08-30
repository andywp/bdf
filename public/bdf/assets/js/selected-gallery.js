$(document).on('change', '#selectGallery', function(e) {
    var idSize = $(this).val();
    console.log(idSize);
    $('.list-gallery').fadeOut();
    $('#'+idSize+'.list-gallery').fadeIn();
})

// $('.is-close').on('click', function(e){
//     $('.video-item').trigger('pause');
// });