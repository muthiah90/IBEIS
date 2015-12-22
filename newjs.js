
function trigger() {
    
    $('input[type="submit"][name="add"]').click();
 }
	
function check(num) {
if($('.'+num).is(':checked')) {
	$('.'+num).prop('checked',false);
	$('#'+num).css('border', "0px");
	$('#'+num).css('padding', "4px");
	$('#'+num).css('background-color', "#fff");
	$('#'+num).css('border', "1px solid #ddd");
	$('#'+num).css('border-radius', "4px");
}
else {
	$('#'+num).css('border', "solid 2px orange");
	$('.'+num).prop('checked',true);
	}
}

function triggerall(){
if($('input[type="checkbox"][name="all"]').is(':checked')) {
$('input[type="checkbox"][name="checkbox[]"]').prop('checked',true);
$('.imageDiv').css('border', "solid 2px orange");
}
else {
$('input[type="checkbox"][name="checkbox[]"]').prop('checked',false);
$('.imageDiv').css('border', "0px");
$('.imageDiv').css('padding', "4px");
$('.imageDiv').css('background-color', "#fff");
$('.imageDiv').css('border', "1px solid #ddd");
$('.imageDiv').css('border-radius', "4px");
}
}