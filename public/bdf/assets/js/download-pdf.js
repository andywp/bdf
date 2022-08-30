$(function() {
	$('.download_count').text('0');
	
	var generallen = $(".form-check-input:checked").length;
	if(generallen>0){$(".download_count").text(generallen);}else{$(".download_count").text('0');}
})

function updateCounter() {
  var len = $(".form-check-input:checked").length;
  if(len>0){
    $(".download_count").text(len);
    $(".reset-btn").addClass("activated");
  }else{
    $(".download_count").text('0');
    $(".reset-btn").removeClass("activated");
  }
}

$(".form-check-input:checkbox").on("change", function() {
	updateCounter();
  $(this).attr('checked','checked');
});

$('#reset_download').click(function () {
  $('[type=checkbox]').prop("checked", false);
  $(".download_count").text('0');
  $(".reset-btn").removeClass("activated");
});