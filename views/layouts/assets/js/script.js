$('#preloader').hide();
$(function() {
	var form = $('#form');
	var preloader = $('#preloader');
	var params = $('#params');
	var data = params.attr('data-attribute');
	
	var datainterval = setInterval(function(){
	  if(data == 2 || data == 3){
		form.hide();
		preloader.show();
		setTimeout(function(){		  
			window.location.href = '/index';
			return false;
		}, 3000);
		clear();
	  }
	}, 1000);
	
	function clear(){
		clearInterval(datainterval);
	}
});