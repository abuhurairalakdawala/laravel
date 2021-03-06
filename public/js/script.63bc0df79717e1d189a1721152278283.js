var DOC=document;
function PD(e){e.preventDefault()}
function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
$(DOC).ready(function(){
$('.checkbox_parent').click(function(){t=$(this);items = t.parents('thead').next().find('input[type="checkbox"]');if(t.is(':checked')){$.each(items,function(k,v){$(this).prop('checked',true)})}else{$.each(items,function(k,v){$(this).prop('checked',false)})}})
$('[data-toggle="tooltip"]').tooltip()



$('.dashboard-go-btn').click(function(){
	d_o = $('.dashboard-option').val()
	if(d_o == ''){
		$('.modal-text').html('Please Select An Option')
		$('.modal').modal()
	} else if(d_o == 'csv'){
		ids = []
		chk = $('.dashboard-table tbody').find('input[type="checkbox"]')
		$.each(chk, function(k,v){
			if($(this).is(':checked')){
				ids.push($(this).val())
			}
		})
		if(ids.length>0){
			$.ajax({
				type:'post',
				url:'/downloadOrders',
				data:{id:ids},
				headers:CSRF,
				dataType:'json',
				success:function(r){
					window.open('/export.csv', '_blank');
				}
			})
		} else {
			$('.modal-text').html('Please Select An Order')
			$('.modal').modal()
		}
	} else if(d_o == 'inward'){
		ids = []
		chk = $('.dashboard-table tbody').find('input[type="checkbox"]')
		$.each(chk, function(k,v){
			if($(this).is(':checked')){
				ids.push($(this).val())
			}
		})
		if(ids.length>0){
			$('.dashboard-go-spinner').show()
			$.ajax({
				type:'post',
				url:'/dashboardOptions',
				data:{id:ids},
				headers:CSRF,
				dataType:'json',
				success:function(r){
					if(r.success){
						$('.modal-text').html(r.success)
						$('.modal').modal()
					} else if(r.error) {
						$('.modal-text').html(r.error)
						$('.modal').modal()
					}
					setTimeout(function(){location.reload()}, 3000);
				}, complete:function(){
					$('.dashboard-go-spinner').hide()
				}
			})
		} else {
			$('.modal-text').html('Please Select An Order')
			$('.modal').modal()
		}
	}
})


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