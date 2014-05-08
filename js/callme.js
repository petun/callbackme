$(function(){
	console.log('tst');

	$('#callMeSubmit').click(function(){
		var status = $('#callMeStatus');
		status.attr('class','call-form--status call-form--status__loading');
		status.text('');

		var data = $('.pcallme-form--form').serialize();

		$.ajax({
			url: 'mail.php',
			method: 'post',
			dataType: 'json',
			data: data,
			success:function(r) {
				console.log(r);
				status.removeClass('call-form--status__loading');
				if (r.r) {
					status.addClass('call-form--status__ok');
					window.setTimeout(function(){$('#callMe').modal('hide')}, 3000);
				} else {
					status.addClass('call-form--status__err');						
				}
				status.text(r.message);
			}
		})
		return false;
	});

	
});