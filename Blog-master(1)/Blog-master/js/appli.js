$(function(){
apps={};
	 apps.scroll =function(x){
var size =$(window).scrollTop();
console.log (size);
if (size>=x) {
$('.navig').css('position','fixed');
$('.navig').css('top','O');
} else {
	$('.navig').css('position','relative');

}}

apps.detect=function(x){
	var size =$(window).scrollTop();
	if (size>=200){
$(x).css('opacity','1');
$(x).addClass('isFade');
	} else {
$(x).removeClass('isFade');
$(x).css('opacity','0.4');

	}
}

$(window).scroll(function(){
	 apps.scroll(534);
	 apps.detect('.bloc-gauche');
	apps.detect('.container_text');
		apps.detect('.bloc_extrait_index');
				apps.detect('.big_blox');



	 
})
$('.hide_windows').click(function(){
$('.bloc-gauche').css('opacity','1');
})
})



// 	 	var color=$('.invisibleJS').css('color');
// 	 	if (color=='rgb(255, 0, 0)'){
// 		var size_height=$(window).height();
// 		var size_left=$(window).width();
// 		$(X).css('top',(size_height-50) + 'px');

// 	} else {
// 			$(X).css('top','0');
// 		}
// 	};
// 	apps.resize('.bar_menu');
// 	apps.time;
// 	apps.wait;
// 	apps.sizetcheck=function(){
// apps.time=setInterval(function(){
// 		apps.resize('.bar_menu');
// },100);
// 	}
// apps.sizetcheck();


// // apps.compte= function(){

// // 	$('.compte').click(function(){
// // 	var text= $("textarea").val();
// // 						alert (text);

// // 	$.post("view.model.php", {
// // 		texte_admin: text}, function(data){
// // 					alert (data);
// // 			$('.comptage').html(data);
// // 		});
// // });
// // }

// // apps.compte();
// apps.deroule=function () {
// 	$('a.lien').click(function(){
// var color=$('.invisibleJS').css('color');
// 	 	if (color=='rgb(255, 0, 0)'){
// 		$('.menu').css('visibility', 'visible');
// 		return false;}
// })

// };

// apps.deroule();
