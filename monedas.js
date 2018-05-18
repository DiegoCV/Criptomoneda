function mostrarMoneda(){	
	mon=document.getElementById("SelectMonedas").value;
	switch(mon){
		case 'ZIL':
			id="2469";
		break;
		case 'ADA':
			id="2010";
		break;
		case 'TRX':
			id="1958";
		break;
		case 'EVX':
			id="2034";
		break;
	}
	var script = document.createElement('script');
	script.onload = function() {
      //callback();
    };
    script.src = "https://files.coinmarketcap.com/static/widget/currency.js";

	div='<div class="coinmarketcap-currency-widget" data-currencyid="'
		+id
		+'" data-base="BTC" data-secondary="USD" data-ticker="true" data-rank="false" data-marketcap="true" data-volume="true" data-stats="USD" data-statsticker="false"></div>';
	
	document.getElementById("descrip").innerHTML = div;	
	document.getElementsByTagName('head')[0].appendChild(script);
}
