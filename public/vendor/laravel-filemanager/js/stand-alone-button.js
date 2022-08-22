(function( $ ){

  $.fn.filemanager = function(type, options) {
    type = type || 'file';

    this.on('click', function(e) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = $('#' + $(this).data('input'));
      var target_preview = $('#' + $(this).data('preview'));
      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=768,height=400');
      window.SetUrl = function (items) {

        console.log(items[0],'items');
       /*  var file_path = items.map(function (item) {
          return item.url;
        }).join(','); */
        //console.log(items,'items');
        // set the value of the desired input to image url
        target_input.val(items[0].url);

        // clear previous preview
       // target_preview.html('');

        // set or change the preview image src
        //items.forEach(function (item) {
         // target_preview.append(
          target_preview.attr('src', items[0].url)
        //  );
        //});

        // trigger change event
       //target_preview.trigger('change');
      };
      return false;
    });
  }

})(jQuery);
