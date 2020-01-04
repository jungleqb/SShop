(function($){
	$('.addCart').click(function(event){
		event.preventDefault();
		$.get($(this).attr('href'),{},function(data){
			if(data.error){
				alert(data.message);
			}
			else{
				if(confirm(data.message + '. Bạn có muốn xem giỏ hàng ?')){
					location.href = 'gio-hang';
				}
				else{
					$('#total').empty().append(data.total);
					$('#count').empty().append(data.count);
				}
			}
		},'json');
		return false;
	})
})(jQuery);