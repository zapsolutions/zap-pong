$(function () {
	var load = 5;
	$('#smack-more').bind('click', function() {
  		$.ajax({
  			url: "/smacks/load_more/" + load,
  			success: function(result) {
    			$("#smack-box").append(result);
  				load = load + 5;
  			}
  		});
	});
});