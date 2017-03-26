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