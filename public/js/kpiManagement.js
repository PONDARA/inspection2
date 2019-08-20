if ($(activeKpi).prop('checked')) {
		$('#text').show();
	}else{
        $('#text').hide();          
    }
$('#activeKpi').change(function() {
	if ($(activeKpi).prop('checked')) {
		$('#text').show();
	}else{
        $('#text').hide();          
    }
	// $('#text').html('Toggle: ' + $(this).prop('checked'))
})
// var checkBox = $(activeKpi).prop('checked');
// console.log(checkBox);