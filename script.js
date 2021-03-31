$(document).ready(function(){
	$('.login-btn').click(function(){
		$('.login').addClass('side-transform');
		$('.mark-overlay').addClass('show-mark');
	})
	$('.to-register').click(function(){
		$('.register').addClass('side-transform');
		$('.login').removeClass('side-transform');
	})
	$('.to-login').click(function(){
		$('.register').removeClass('side-transform');
		$('.login').addClass('side-transform');
	})
	$('.side .mini-header i, .mark-overlay').click(function(){
		$('.side-transform').removeClass('side-transform');
		$('.mark-overlay').removeClass('show-mark');
	})
})