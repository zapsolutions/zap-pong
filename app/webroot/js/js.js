$(function () {
  var offset = 5;
  $('#smack-more').bind('click', function() {
    $.ajax({
      url: "/smacks/load_more/" + offset,
      success: function(result) {
        $("#smack-box").append(result);
        offset = offset + 5;
      }
    });
  });
});

function showBtn(el) {
  $(el).show();
}