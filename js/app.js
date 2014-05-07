console.log('zzz...');
$(function(){
  var draw = function(event){
    var url = $('#text_field').val();
    $.ajax({
      url: '/fetch'
      type: 'POST',
      data: {'url': encodeURIComponent(url)},
      success: function(data){},
      error: function(response){}
    });
  };
  $('#draw').click(draw);
  $('#text_field').on('keydown', function (event){
    if(event.keyCode == 13)
      draw(event);
  });
})();
