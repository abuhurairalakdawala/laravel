$(DOC).ready(function(){
	$('#user_form_registration').submit(function(e){
		PD(e)
		t=$(this)
		$('.user_reg_btn').prop('disabled',true)
		$('.user_reg_btn .fa').removeClass('hide')
		$.ajax({
			type:'post',
			url:t.attr('action'),
			data:t.serialize(),
			dataType:'json',
			success:function(){
				alert('done')
			},
			error:function(err){
				errors = $.parseJSON(err.responseText)
				console.log(errors)
				$('.form-field-err').hide()
				$.each(errors, function(index, value) {
					console.log(index)
					$('.'+index+'-err').show().html(value)
					console.log(value)
				})
			},
			complete:function(){
				$('.user_reg_btn .fa').addClass('hide')
				$('.user_reg_btn').prop('disabled',false)
			}
		})
	})
})