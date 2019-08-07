$(function(){
apps={};
	 apps.resize =function(X){
	 	var color=$('.invisibleJS').css('color');
	 	if (color=='rgb(255, 0, 0)'){
		var size_height=$(window).height();
		var size_left=$(window).width();
		$(X).css('top',(size_height-50) + 'px');

	} else {
			$(X).css('top','0');
		}
	};
	apps.resize('.bar_menu');
	apps.time;
	apps.wait;
	apps.sizetcheck=function(){
apps.time=setInterval(function(){
		apps.resize('.bar_menu');
},100);
	}
apps.sizetcheck();


// apps.compte= function(){

// 	$('.compte').click(function(){
// 	var text= $("textarea").val();
// 						alert (text);

// 	$.post("view.model.php", {
// 		texte_admin: text}, function(data){
// 					alert (data);
// 			$('.comptage').html(data);
// 		});
// });
// }

// apps.compte();
apps.deroule=function () {
	$('a.lien').click(function(){
var color=$('.invisibleJS').css('color');
	 	if (color=='rgb(255, 0, 0)'){
		$('.menu').css('visibility', 'visible');
		return false;}
})

};

apps.deroule();


})


