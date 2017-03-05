$(DOC).ready(function(){
	$('#user_form_registration').submit(function(e){
		PD(e)
		t=$(this)
		$('.user_reg_btn').prop('disabled',true)
		$('.user_reg_btn .fa').removeClass('hide')
		$('.form-field-err').hide()
		$.ajax({
			type:'post',
			url:t.attr('action'),
			data:t.serialize(),
			dataType:'json',
			success:function(r){
				if(r.success){
					t[0].reset();
					window.location.href='/dashboard'
				}
			},
			error:function(err){
				if(err.status==422){
					errors = $.parseJSON(err.responseText)
					$.each(errors, function(index, value) {
						$('.'+index+'-err').show().html(value)
					})
				} else {
					alert('An Unknown Error Occured!\nPlease Try Again!')
				}
				console.log(err)
			},
			complete:function(){
				$('.user_reg_btn .fa').addClass('hide')
				$('.user_reg_btn').prop('disabled',false)
			}
		})
	})
	$('.paginator-dropdown').val(5)
})