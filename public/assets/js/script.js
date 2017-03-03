var DOC=document;
function PD(e){e.preventDefault()}
$(DOC).ready(function(){
$('.checkbox_parent').click(function(){t=$(this);items = t.parents('thead').next().find('input[type="checkbox"]');if(t.is(':checked')){$.each(items,function(k,v){$(this).prop('checked',true)})}else{$.each(items,function(k,v){$(this).prop('checked',false)})}})
$('[data-toggle="tooltip"]').tooltip()
})