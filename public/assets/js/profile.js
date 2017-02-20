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