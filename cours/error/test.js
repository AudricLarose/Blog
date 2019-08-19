$(function(){
apps={};
	 apps.resize =function(X){
		var size_height=$(window).height();
		var size_left=$(window).width();
		$(X).css('top',(size_height-300) + 'px');
$(X).css('left',(size_left-200) + 'px');
	};
	apps.resize('.bar_footer');
	apps.time;
	apps.wait;
	apps.sizetcheck=function(){
apps.time=setInterval(function(){
		apps.resize('.bar_footer');
},100);
	}
	apps.waittcheck=function(){
apps.wait=setTimeOut(function(){
$('.bar_footer').slideDown();
},6000);
	}
apps.sizetcheck();

})

