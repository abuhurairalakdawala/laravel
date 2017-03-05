var DOC=document;
function PD(e){e.preventDefault()}
$(DOC).ready(function(){
$('.checkbox_parent').click(function(){t=$(this);items = t.parents('thead').next().find('input[type="checkbox"]');if(t.is(':checked')){$.each(items,function(k,v){$(this).prop('checked',true)})}else{$.each(items,function(k,v){$(this).prop('checked',false)})}})
$('[data-toggle="tooltip"]').tooltip()
})
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
					window.location.href='/home'
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
})
$(DOC).ready(function(){
	$('.add-row').click(function(){
		html = '<tr>'
		html += '<td><input type="text" class="form-control" name="header[]" placeholder="Dashboard Item Heading"></td>'
		html += '<td><select name="filter_type[type][]" class="filter_type form-control"><option value="0">Select Filter Type</option><option value="1">Text Field</option><option value="2">Dropdown</option><option value="3">Date Range</option></select><textarea class="form-control" name="filter_type[value][]" placeholder="Dropdown Value" style="display:none;margin-top:5px"></textarea></td>'
		html += '<td><input type="text" class="form-control" name="input_name[]" placeholder="Filter Name [name=\'input_name\']"></td>'
		html += '<td><input type="text" class="form-control" name="model[]" placeholder="Model Mapping"></td>'
		html += '<td><button type="button" data-toggle="tooltip" data-placement="top" title="Remove Row" class="btn-default btn btn-sm btn-remove"><i class="glyphicon glyphicon-remove"></i></button></td>'
		html += '</tr>'
		$('.dashboard-table tbody').append(html)
	})
	$('.generator_form').submit(function(e){
		PD(e)
		t=$(this)
		$.ajax({
			type:'post',
			url:'/generate_code_process',
			data:t.serialize(),
			success:function(res){
				$('.response').html(res)
			}
		})
	})
})
$(DOC).on('click','.btn-remove',function(){
	$(this).parents('tr').remove()
})
$(DOC).on('change','.filter_type',function(){
	if($(this).val()==2){
		$(this).next().show()
	} else {
		$(this).next().hide()
	}
})
$(DOC).ready(function(){
	$('#new_post_form').submit(function(e){
		PD(e)
		t=$(this)
		$.ajax({
			type:'post',
			url:t.attr('action'),
			dataType:'json',
			data:new FormData(this),
			contentType:false,
			processData:false,
			success:function(r){
				if(r.data){
					$('.post_box').val('')
					$('.profile_posts').prepend('<li class="list-group-item" data-id="'+r.data.id+'">'+r.data.post_content+'</li>')
				}
			}
		})
	})
})
$(DOC).on('dblclick','.list-group-item',function(){
	t=$(this)
	if(confirm('Are you sure ?\nYou want to delete this post ?')){
		$.ajax({
			type:'get',
			url:'/delete_post/'+t.data('id'),
			dataType:'json',
			success:function(r){
				console.log(r)
				if(r.success){
					t.slideUp()
				} else {
					alert('Error!')
				}
			}
		})
	}
})