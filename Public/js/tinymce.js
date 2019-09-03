
$(document).ready(function(){
	var content = 'hello';		
	$("#textarea").html(content);
	tinymce.get("textarea").setContent(content);
	return false;
});