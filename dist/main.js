$(function (){
	$('a.item').click(function(){
		$('.item').removeClass('active');
		$(this).addClass('active');
	});

	$('.accordion').accordion(); 

	$('.submit').click(function(){
		$('.modal').modal('show');
	})

	$( "#datepicker" ).datepicker();

	$( "#tabs" ).tabs();

	var availableTags = [
	"Anniversary (Tarp)",
	"Birthday (Tarp)",
	"Fiesta (Tarp)",
	"Corporate Function (Tarp)",
	"Campaign (Tarp)",
	"Business (Tarp)",
	"Reunions (Tarp)",
	"Other Events (Tarp)",
	"Corporate (Sticker)",
	"Function (Sticker)",
	"Give-Aways (Sticker)",
	"Campaign (Sticker)",
	"Business (Sticker)",
	"Others (Sticker)",
	"Office (Signage)",
	"Shops (Signage)",
	"Stores (Signage)",
	"Others (Signage)",
	"Calling Card (Digital)",
	"Mugs (Digital)",
	"Invitation (Digital)",
	"Baller Band (Digital)",
	"ID (Digital)",
	"Keychains (Digital)",
	"Trophies (Digital)",
	"Posters (Digital)",
	"Others (Digital)",
	"School Events (Tshirt)",
	"Uniform Shirts (Tshirt)",
	"Campaign Shirts (Tshirt)",
	"Event Shirts (Tshirt)",
	"Others (Tshirt)"

];
$( "#autocomplete" ).autocomplete({
	source: availableTags
});
	
});