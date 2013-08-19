function hidesubs(objId){
	
	$('#subs'+objId).toggle();
	
	if ($('#subs'+objId).css('display') == 'block') {
		$('.allow'+objId).addClass("icon-chevron-down");
		$('.allow'+objId).removeClass("icon-chevron-right");
	} else {
		$('.allow'+objId).addClass("icon-chevron-right");
		$('.allow'+objId).removeClass("icon-chevron-down");
	}
	
}

function hideends(objId){
	$('#ends'+objId).toggle();
}