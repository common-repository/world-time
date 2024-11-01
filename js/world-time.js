/**
 * Word Time main js
 */

jQuery(document).ready(function($){
	var time1=jQuery('.world-time-container .world-time-1 span').data('offset').split(':');
	var time2=jQuery('.world-time-container .world-time-2 span').data('offset').split(':');
	var time3=jQuery('.world-time-container .world-time-3 span').data('offset').split(':');
	var time4=jQuery('.world-time-container .world-time-4 span').data('offset').split(':');
	var parseTime=function(h,m,s,o){
		h=h+parseInt(o[0]);
		if(h<10){
			h='0'+h;
		}
		if(m<10){
			m='0'+m;
		}
		if(s<10){
			s='0'+s;
		}
		return h+':'+m+':'+s;
	};
	setInterval(function(){
		var now=new Date();
		$('.world-time-container .world-time-1 span').text(parseTime(now.getUTCHours(),now.getUTCMinutes(),now.getUTCSeconds(),time1));
		$('.world-time-container .world-time-2 span').text(parseTime(now.getUTCHours(),now.getUTCMinutes(),now.getUTCSeconds(),time2));
		$('.world-time-container .world-time-3 span').text(parseTime(now.getUTCHours(),now.getUTCMinutes(),now.getUTCSeconds(),time3));
		$('.world-time-container .world-time-4 span').text(parseTime(now.getUTCHours(),now.getUTCMinutes(),now.getUTCSeconds(),time4));
		console.log(time2[0]);
	},1000);
});