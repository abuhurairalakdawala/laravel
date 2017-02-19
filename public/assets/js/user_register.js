$(DOC).ready(function(){
	$('#user_form_registration').submit(function(e){
		PD(e)
		t=$(this)
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
				$.each(errors, function(index, value) {
					console.log(index)
					console.log(value)
				})
			}
		})
	})
})