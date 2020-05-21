$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = json.url;
				} else {
					if(json.message == "show") {
						$(".section-photo__submit").click(function(){
							$(".overlay").addClass("active")
							$(".section-modal").addClass("active--block ")
							$(".section-modal__text").html("Вы успешно зарегистированы на данный тур <br> Ожидайте ответа")
						})
					}else if(json.message == "showError") {
						$(".section-photo__submit").click(function(){
							$(".overlay").addClass("active")
							$(".section-modal").addClass("active--block ")
							$(".section-modal__text").text("Вами уже был зарегистрирован тур")
						})
					}
						else {
						console.log("don`t show")
						alert(json.status + ' - ' + json.message);
					}
					
				}
			},
		});
	});
});