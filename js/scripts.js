function showShop(shop) {
	$('.shop-items').hide();
	$('.shop-btns').removeClass('active');
	$('#btn-'+shop).addClass('active');
	$('#shop-'+shop).show();
}

$(document).ready(function(){
	setInterval(function(){
		$.ajax({
	      	type: 'GET',
	      	// url: document.location.origin + '/fortniteAPI/hour.php',
	      	url: document.location.origin + '/projects/fortnite/hour.php',
	      	success: function(resposta) {
	        	$('.timer').text(resposta);
	        }
	    });
	},1000)
})