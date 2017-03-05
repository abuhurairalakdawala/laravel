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