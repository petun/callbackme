$(function(){
	$('.call-form--submit').click(function(){
        // upper div
        var wrapper = $(this).closest('.pcallme-form');
        // form handler
        var handler = $(wrapper).data('handler');
        /// for status messages
        var status = $('.call-form--status',wrapper);

		status.attr('class','call-form--status call-form--status__loading').text('');

		var data = $('.pcallme-form--form',wrapper).serialize();

		$.ajax({
			url: handler,
			method: 'post',
			dataType: 'json',
			data: data,
			success:function(r) {
				//console.log(r);
				status.removeClass('call-form--status__loading');
				if (r.r) {
					status.addClass('call-form--status__ok');
					window.setTimeout(function(){ closeCallMeModal(); }, 3000);
				} else {
					status.addClass('call-form--status__err');						
				}
				status.text(r.message);
			}
		});

		return false;
	});


	function closeCallMeModal() {
		$('#callMe').modal('hide');
		$('#callMe input[type=text]').val('');
		$('#callMe textarea').val('');		
		$('#callMeStatus').attr('class','call-form--status').text('');		
	}
	
});